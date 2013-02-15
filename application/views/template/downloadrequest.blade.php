@layout('master')

@section('content')

{{$form->open_for_files('template/download/'.$profile['_id'],'POST',array('class'=>'custom','id'=>'newdoc'))}}

<h4>Document Detail : {{ $profile['title'] }}</h4>
<div class="row">
	<div class="profileContent">
		<div class="eleven columns">
			<h5>{{ $profile['title'] }}</h5>
			<table class="profile-info">
				<tr>
					<td class="detail-title">Created</td>
					<td class="detail-info">{{ date('d-m-Y h:i:s',$profile['createdDate']->sec) }}</td>
				</tr>
				<tr>
					<td class="detail-title">Format</td>
					<td class="detail-info">	
						<span>{{$profile['docFormat']}}</span>
					</td>
				</tr>
				<tr>
					<td class="detail-title">Creator</td>
					<td class="detail-info">{{ $profile['creatorName'] }}</td>
				</tr>
				<tr>
					<td class="detail-title">Attachment</td>
					<td class="detail-info">{{ (isset($profile['docFiledata']['uploadTime']))?date('d-m-Y h:i:s',$profile['docFiledata']['uploadTime']->sec):'' }} <strong>{{$profile['docFiledata']['name']}}</strong></td>
				</tr>
				<tr>
					<td>Document Sequence</td>
					<td>
						{{ $docnumber }}

					</td>
				</tr>
			</table>
		</div>
	</div>
</div>
<div class="row">
	<div class="twelve columns">

		{{ $form->hidden('docId',$profile['_id']) }}

		{{ Form::submit('Download',array('class'=>'button'))}}

	</div>
</div>

{{$form->close()}}

@endsection

