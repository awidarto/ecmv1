<?php
	$main_photo = getavatar($doc['fromId'],$doc['from'],'twelve');

	$doc_photo = $main_photo;
?>
<div class="row">
	<div class="one columns">{{ $main_photo }}</div>
	<div class="eleven columns">
	  <p>
	  	<span class="timestamp">{{date('Y-m-d H:i:s',$doc['createdDate']->sec)}}</span><br />
	  	<span class="from">From : <strong>{{$doc['from']}}</strong></span><br />
	  	<span class="to">To : <strong>{{$doc['to']}}</strong></span><br />
	  	<span class="subject">Subject : <strong>{{$doc['subject']}}</strong></span><hr />
	  	<!--
		  <div class="row">
		    <div class="two columns">{{ $doc_photo }}</div>
		    <div class="ten columns">
		    	<p>
					<span class="metaview" id="{{$doc['_id']}}">{{$doc['subject']}}</span>
		    	</p>
		    </div>
		  </div>
		-->
	  </p>
	  <ul class="inline-list">
	    <li>{{ HTML::link('message/reply/'.$doc['_id'],'Reply')}}</li>
	    <li>{{ HTML::link('message/replyall/'.$doc['_id'],'Reply All')}}</li>
	    <li>{{ HTML::link('message/forward/'.$doc['_id'],'Forward')}}</li>
	  </ul>

	<!--
	  <h6>2 Comments</h6>
	  <div class="row">
	    <div class="two columns"><img src="http://placehold.it/50x50&text=[img]" /></div>
	    <div class="ten columns"><p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit</p></div>
	  </div>
	  <div class="row">
	    <div class="two columns"><img src="http://placehold.it/50x50&text=[img]" /></div>
	    <div class="ten columns"><p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit</p></div>
	  </div>

	-->
	</div>
</div>