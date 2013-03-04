<?
if(isset($doc['creator_id'])){
	$doc_photo = getavatar($doc['creator_id'],$doc['creator_name'],'ten');
}else{
	$doc_photo = '';
}
$main_photo = getavatar($doc['creator_id'],$doc['creator_name'],'ten');

$class = str_replace('.', '-', $doc['event']);

if($doc['event'] == 'document.create'){
	$main_photo = getavatar($doc['creator_id'],$doc['creator_name'],'twelve');
	$body = $doc['creator_name'].' has created '.$doc['doc_title'];

}
elseif($doc['event'] == 'document.upload'){
	$main_photo = getavatar($doc['creator_id'],$doc['creator_name'],'twelve');
	$body = $doc['creator_name'].' has created '.$doc['doc_title'];
}
elseif($doc['event'] == 'document.share'){
	$main_photo = getavatar($doc['sharer_id'],$doc['sharer_name'],'twelve');
	$body = $doc['sharer_name'].' has shared '.$doc['doc_title'];
}
elseif($doc['event'] == 'document.update'){
	$main_photo = getavatar($doc['updater_id'],$doc['updater_name'],'twelve');	
	$body = $doc['updater_name'].' has updated '.$doc['doc_title'];
}

elseif($doc['event'] == 'document.download'){
	$main_photo = getavatar($doc['downloader_id'],$doc['downloader_name'],'twelve');	
	$body = $doc['downloader_name'].' has downloaded '.$doc['doc_title'];
}

elseif($doc['event'] == 'project.create'){
	$main_photo = getavatar($doc['creator_id'],$doc['creator_name'],'twelve');
	$body = $doc['creator_name'].' have created '.$doc['doc_title'];

}
elseif($doc['event'] == 'project.upload'){
	$main_photo = getavatar($doc['creator_id'],$doc['creator_name'],'twelve');
	$body = $doc['creator_name'].' have created '.$doc['doc_title'];
}
elseif($doc['event'] == 'project.share'){
	$main_photo = getavatar($doc['sharer_id'],$doc['sharer_name'],'twelve');
	$body = $doc['sharer_name'].' have shared '.$doc['doc_title'];
}
elseif($doc['event'] == 'project.update'){
	$main_photo = getavatar($doc['updater_id'],$doc['updater_name'],'twelve');	
	$body = $doc['updater_name'].' have updated '.$doc['doc_number'].' - '.$doc['doc_title'];
}
elseif($doc['event'] == 'request.approval'){
	
	$main_photo = getavatar($doc['requester_id'],$doc['requester_name'],'twelve');

	if($doc['approvalby'] == Auth::user()->email){
		$body = $doc['requester_name'].' have requested document approval from you, please review : <span class="approvalview" id="'.$doc['doc_id'].'">'.$doc['doc_title'].'</span>';
	}else{
		$body = 'You have requested document approval to '.$doc['approvalby'].' for document : <span class="fileview" id="'.$doc['doc_id'].'">'.$doc['doc_filename'].'</span>';
	}
}elseif($doc['event'] == 'document.expire'){
	
	$main_photo = '';
	$body = $doc['title'].'  is expiring';
}else{
	$main_photo = getavatar($doc['creator_id'],$doc['creator_name'],'twelve');
	$body = $doc['creator_name'].' have done '.eventtitle($doc['event']);
}

?>


<div class="event-item {{ $class }} twelve">

	<div class="row">
		
			<div class="one columns">{{ $doc_photo }}</div>
			
			<div class="eleven columns">
		    	<p>
					<strong style="margin-bottom:4px;display:block;">Document <span class="metaview" id="{{ $doc['doc_id'] }}">{{ $doc['doc_title'] }}</span> {{ $doc['title'] }}</strong>
					Attachment : <span class="fileview" id="{{ $doc['doc_id'] }}">{{ $doc['doc_filename'] }}</span><br/>
					<span class="timestamp colorGray">{{ date('Y-m-d H:i:s',$doc['timestamp']->sec) }}</span><br />
		  			{{-- $body --}}
		    	</p>
		    </div>
		  	
		  	
		
	</div>
</div>

