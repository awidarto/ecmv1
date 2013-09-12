#!/usr/bin/php
<?php

/* check the previous process if exists then dont start next process */
$check = shell_exec("ps ax | grep /opt/bin/agg.php");
print $check;
if(substr_count(trim($check),"/usr/bin/php /opt/bin/agg.php") > 1){
    die("Other process is still running, exit now.");
}

$mongo = new Mongo();

$suffix = date('mY',time());

$col = 'active_data_'.$suffix;

$aggcol = 'agg_data_'.$suffix;

$ipcol = 'ip_data_'.$suffix;

/*
TO DO : validate aggregation time check, 
logically only current month active_data collection gets aggregated into current aggregate collection ( same suffix )
*/


/* get the timestamp in a file */
if(file_exists('/root/last_ts.txt')){
	$last_ts = file_get_contents('/root/last_ts.txt');
	if($last_ts == 0 || $last_ts == ''){
		$last_ts = false;
	}
}else{
	$last_ts = false;
}

$collection = $mongo->selectDB("drs_db")->selectCollection($col);

$aggcollection = $mongo->selectDB("drs_db")->selectCollection($aggcol);

$ipcollection = $mongo->selectDB("drs_db")->selectCollection($ipcol);

/* if there's no timestamp then find active_collection */
$cursor = $collection->find()->sort(array('capture_date'=>1))->limit(1);

//var_dump(iterator_to_array($cursor));

/* get the bottom timestamp */
$t0 = iterator_to_array($cursor);

/* go to last record of active data */
$cursor->rewind();

$cursor = $collection->find()->sort(array('capture_date'=>-1))->limit(1);

$t1 = iterator_to_array($cursor);

$cursor->rewind();

$t0 = array_pop($t0);
$t0 = (int)$t0['capture_date'];

if($last_ts){
	$t0 = $last_ts;
}

print 't0 : '.$t0;

print "\r\n";

$t1 = array_pop($t1);
$t1 = (int)$t1['capture_date'];
print 't1 : '.$t1;

print "\r\n";
print 'delta t : '.(int)($t1-$t0);

print "\r\n";

$steps = (int)(($t1-$t0)/300);
print 'steps : '.$steps;

print "\r\n";

$tstart = $t0;

$collection->ensureIndex(array("capture_date" => 1));

for($i = 0;$i < $steps;$i++){
	print 'step # : '.$i;
	print "\r\n";
	print 'tstart : '.$tstart;
	$tend = $tstart+300;
	print "\r\n";
	print 'tend : '.$tend;
	print "\r\n";
	print "======================================";
	print "\r\n";

	
        $cursor = $collection->find(array('capture_date'=>array('$gte'=>$tstart,'$lt'=>$tend)))->sort(array('capture_date'=>1));

	$results = iterator_to_array($cursor);
	
	//print_r(iterator_to_array($cursor));
	// data summary
	$data = array();
	// app transport packet count
	$app = array();
	// unique IP count
	$ip = array();
	
	$dst_ip_array = array();
	$src_ip_array = array();
	
	$dst_ip_count = 0;
	$src_ip_count = 0;
	
	foreach($results as $r){
		//summarize packet data within time range
		$data["tot_elapsed"] += $r['elapsed_time'];
		$data["tot_thruput_udp"] += ($r['transport_protocol'] == 'UDP')?($r['src_truhput']+$r['dst_truhput']):0;
		$data["tot_truhput"] += ($r['src_truhput']+$r['dst_truhput']);
		$data["tot_pkt_tcp"] += ($r['transport_protocol'] == 'TCP')?($r['src_pkt_sent']+$r['dst_pkt_sent']):0;
		$data["tot_pkt_out"] += $r['src_pkt_sent'];
		$data["tot_pkt_udp"] += ($r['transport_protocol'] == 'UDP')?($r['src_pkt_sent']+$r['dst_pkt_sent']):0;
		$data["tot_rxmt_pkt"] += ($r['src_actl_rxmt_pkt']+$r['dst_actl_rxmt_pkt']);
		$data["tot_pkt_in"] += $r['dst_pkt_sent'];
		$data["tot_pkt"] += $r['tot_pkt'];
		$data["tot_byte_in"] += $r['dst_actl_byte_sent'];
		$data["tot_thruput_tcp"] += ($r['transport_protocol'] == 'TCP')?($r['src_truhput']+$r['dst_truhput']):0;
		$data["tot_rxmt_byte"] += $r['src_actl_byte_sent'] ;
		$data["tot_byte_out"] += $r['src_actl_byte_sent'] ;
		$data["tot_avg_rtt"] += $r['src_avg_rtt'];
		$data["tot_tcp_con"] += ($r['transport_protocol'] == 'TCP')?1:0;
		$data["tot_udp_con"] += ($r['transport_protocol'] == 'UDP')?1:0;
		
		//summarize app packet count within time range
		$data["tot_http"] += ($r['apps_protocol'] == 'HTTP')?1:0;
		$data["tot_proxy"] += ($r['apps_protocol'] == 'HTTP/PROXY')?1:0;
		$data["tot_ntp"] += ($r['apps_protocol'] == 'NTP')?1:0;
		$data["tot_ssh"] += ($r['apps_protocol'] == 'SSH')?1:0;
		$data["tot_dns"] += ($r['apps_protocol'] == 'DNS')?1:0;
		$data["tot_ssl"] += ($r['apps_protocol'] == 'SSL/TLS')?1:0;
		$data["tot_pop3"] += ($r['apps_protocol'] == 'POP')?1:0;
		$data["tot_ym"] += ($r['apps_protocol'] == 'YM')?1:0;
		$data["tot_imap"] += ($r['apps_protocol'] == 'IMAP')?1:0;
		$data["tot_telnet"] += ($r['apps_protocol'] == 'TELNET')?1:0;
		
		//summarize unique ip within time range
		if(!in_array($r['dst_ipaddr'],$dst_ip_array)){
			$dst_ip_array[] = $r['dst_ipaddr'];
			$dst_ip_count++;
		}

		if(!in_array($r['src_ipaddr'],$src_ip_array)){
			$src_ip_array[] = $r['src_ipaddr'];
			$src_ip_count++;
		}
		
		
	}
	
	/*
	if($data['tot_tcp_con'] <> 0){
		$data["avg_rtt"] = $data["tot_avg_rtt"]/$data["tot_tcp_con"];
	}
	*/

	if($src_ip_count > 0){
		$data['unique_dst_ip_count'] = $dst_ip_count;
		$data['unique_src_ip_count'] = $src_ip_count;
		$data["avg_elapsed_time"] = @$data["tot_elapsed"] / $data["tot_pkt"];
	}

	$data["timestamp"] = $tend;

	$check_ts = $aggcollection->find(array('timestamp'=>$tend));
	$check_ts = iterator_to_array($check_ts);
	print_r($check_ts);

	if(count($check_ts) < 1){
		$aggcollection->insert($data);
		print "duplicate data found, skip insert\r\n";
	}
	
	print_r($data);
	

	$ip["timestamp"] = $tend;
	$ip["dst_ip"] = (count($dst_ip_array) > 0)?$dst_ip_array:false;
	$ip["src_ip"] = (count($src_ip_array) > 0)?$src_ip_array:false;

	$ipcollection->insert($ip);
	
	$cursor->rewind();
	
	$tstart = $tend;
}

file_put_contents('/root/last_ts.txt',$tend);

?>
