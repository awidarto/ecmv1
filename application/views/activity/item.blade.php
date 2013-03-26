<?php

$doc_photo = '';
$avatar_name = '';
$system_photo = HTML::image('images/no-avatar.jpg', 'no-avatar', array('class' => 'ten'));

if(isset($doc['creator_id'])){
	$doc_photo = getavatar($doc['creator_id'],$doc['creator_name'],'ten');
}else{
	$doc_photo = '';
}

$main_photo = getavatar($doc['creator_id'],$doc['creator_name'],'ten');

if($doc['event'] == 'document.create'){
	$main_photo = getavatar($doc['creator_id'],$doc['creator_name'],'twelve');
	$body = $doc['creator_name'].' has created '.$doc['doc_title'];
	$avatar_name = $doc['creator_name'];

}
elseif($doc['event'] == 'document.upload'){
	$main_photo = getavatar($doc['creator_id'],$doc['creator_name'],'twelve');
	$body = $doc['creator_name'].' has created '.$doc['doc_title'];
	$avatar_name = $doc['creator_name'];
}
elseif($doc['event'] == 'document.share'){
	$main_photo = getavatar($doc['sharer_id'],$doc['sharer_name'],'twelve');
	$body = $doc['sharer_name'].' has shared '.$doc['doc_title'];
	$avatar_name = $doc['sharer_name'];
}
elseif($doc['event'] == 'document.update'){
	$main_photo = getavatar($doc['updater_id'],$doc['updater_name'],'twelve');	
	$body = $doc['updater_name'].' has updated '.$doc['doc_title'];
	$avatar_name = $doc['updater_name'];
}

elseif($doc['event'] == 'document.download'){
	$main_photo = getavatar($doc['downloader_id'],$doc['downloader_name'],'twelve');	
	$body = $doc['downloader_name'].' has downloaded '.$doc['doc_title'];
	$avatar_name = $doc['downloader_name'];

}

elseif($doc['event'] == 'project.create'){
	$main_photo = getavatar($doc['creator_id'],$doc['creator_name'],'twelve');
	$body = $doc['creator_name'].' have created '.$doc['doc_title'];
	$avatar_name = $doc['creator_name'];

}
elseif($doc['event'] == 'project.upload'){
	$main_photo = getavatar($doc['creator_id'],$doc['creator_name'],'twelve');
	$body = $doc['creator_name'].' have created '.$doc['doc_title'];
	$avatar_name = $doc['creator_name'];

}
elseif($doc['event'] == 'project.share'){
	$main_photo = getavatar($doc['sharer_id'],$doc['sharer_name'],'twelve');
	$body = $doc['sharer_name'].' have shared '.$doc['doc_title'];
	$avatar_name = $doc['sharer_name'];

}
elseif($doc['event'] == 'project.update'){
	$main_photo = getavatar($doc['updater_id'],$doc['updater_name'],'twelve');	
	$body = $doc['updater_name'].' have updated '.$doc['doc_number'].' - '.$doc['doc_title'];
	$avatar_name = $doc['updater_name'];

}
elseif($doc['event'] == 'request.approval'){
	
	$main_photo = getavatar($doc['requester_id'],$doc['requester_name'],'twelve');

	if($doc['approvalby'] == Auth::user()->email){
		$body = $doc['requester_name'].' have requested document approval from you, please review : <span class="approvalview" id="'.$doc['doc_id'].'">'.$doc['doc_title'].'</span>';
	}else{
		$body = 'You have requested document approval to '.$doc['approvalby'].' for document : <span class="fileview" id="'.$doc['doc_id'].'">'.$doc['doc_filename'].'</span>';
	}

	$avatar_name = $doc['requester_name'];

}elseif($doc['event'] == 'document.expire'){
	
	$main_photo = '';
	$doc_photo = $system_photo;
	//http://localhost/pnu/public/index.php/document/edit/513df31c0b9b34a401000000/general

	if($doc['creator_id'] == Auth::user()->id){
		$edit = HTML::link('document/edit/'.$doc['doc_id']->__toString().'/'.$doc['department'],'Edit Document');
	}else{
		$edit = '';
	}

	$body = $doc['title'].'  is expiring';
	$avatar_name = 'System';

}else{
	$main_photo = getavatar($doc['creator_id'],$doc['creator_name'],'twelve');
	$body = $doc['creator_name'].' have done '.eventtitle($doc['event']);
	$avatar_name = $doc['creator_name'];

}

?>


<div class="event-item twelve">

	<div class="row">
			@if(isset($doc_photo))
				<div class="one columns">
					{{ $doc_photo }}
					<span class="avatarname">{{ $avatar_name }}</span>
				</div>
				<div class="eleven columns">
			@else
				<div class="twelve columns">
			@endif
			
		    	<p>
					<strong style="margin-bottom:4px;display:block;">Document <span class="metaview" id="{{ $doc['doc_id'] }}">{{ $doc['doc_title'] }}</span> {{ $doc['title'] }}</strong>
					Attachment : <span class="fileview" id="{{ $doc['doc_id'] }}">{{ $doc['doc_filename'] }}</span><br/>
					<span class="timestamp colorGray">{{ date('Y-m-d H:i:s',$doc['timestamp']->sec) }}</span><br />
		  			{{-- $body --}}
		  			{{ (isset($edit))?$edit:''}}
		    	</p>
		    </div>
		  	
		  	
		
	</div>
</div>

