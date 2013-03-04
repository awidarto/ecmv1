@layout('master')

@section('content')

<?php
	$fromid = (isset($doc['fromId']))?$doc['fromId']:0;
	$main_photo = getavatar($fromid,$doc['from'],'twelve');
?>
<div class="row">
	<div class="one columns">{{ $main_photo }}</div>
	<div class="eleven columns">
	  <p>
	  	<span class="timestamp">{{date('Y-m-d H:i:s',$doc['createdDate']->sec)}}</span><br />
	  	<span class="from">From : <strong>{{$doc['from']}}</strong></span><br />
	  	<span class="to">To : <strong>{{$doc['to']}}</strong></span><br />

	  	<span class="subject">Subject : <strong>{{$doc['subject']}}</strong></span>
		  <ul class="inline-list">
		    <li>{{ HTML::link('message/reply/'.$doc['_id'],'Reply')}}</li>
		    <li>{{ HTML::link('message/replyall/'.$doc['_id'],'Reply All')}}</li>
		    <li>{{ HTML::link('message/forward/'.$doc['_id'],'Forward')}}</li>
		  </ul>
	  	<hr />

	  </p>
	  	<div id="message-body">
		  	{{ $doc['body'] }}
	  	</div>
	</div>
</div>


@endsection
