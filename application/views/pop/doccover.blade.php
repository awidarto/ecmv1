@layout('dialog')

@section('content')

<h4>Document Approval : {{ $profile['title'] }}</h4>
<table style="width:100%">
<thead>
	<tr>
		<th>Status</th><th>By</th><th>Detail</th>
	</tr>
</thead>
@foreach($profile['approvalResponds'] as $c)
	<?php
		if($c['approval'] == 'transfer'){
			$appstatus = 'Transferred';
		}else if($c['approval'] == 'yes'){
			$appstatus = 'Approved';
		}else if($c['approval'] == 'no'){
			$appstatus = 'Not Approved';
		}
		$timestamp = date('d-m-Y H:i:s',$c['approvalDate']->sec);
	?>
	<tr>
		<td>
			<span class"approval {{ $c['approval'] }} ">{{ $appstatus }}</span>
		</td>
		<td>
			{{ $c['approverName'] }}
		</td>
		<td>
			<span class="commentTime">{{ $timestamp }}</span><br />
			<p>{{ $c['approvalNote'] }}</p>
		</td>
	</tr>
@endforeach
</table>
<a class="button" id="printBtn" href="{{ URL::to('document/printcover/'.$profile['_id']->__toString().'') }}" target="_blank">Print</a>

@endsection

