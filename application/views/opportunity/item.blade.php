<h5 class="_pop" rel="{{$popsrc}}" id="{{$doc['_id']}}">{{HTML::link('opportunity/view/'.$doc['_id'],$doc['title']) }}</h5>
Created : {{date('Y-m-d H:i:s', $doc['createdDate']->sec)}} Last Update : 
{{isset($doc['lastUpdate'])?date('Y-m-d H:i:s', $doc['lastUpdate']->sec):''}}
<br />
Created by : {{$doc['creatorName']}}<br />
Managed by : {{$doc['opportunityManager']}}<br />
<p>
{{$doc['body']}}
</p>
