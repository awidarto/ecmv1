@layout('noaside')

@section('content')

<div class="tableHeader">
<h3>{{$title}}</h3>


</div>
<div class="row">
		<div class="eight columns">
			<h5>{{ $project['title'] }}</h5>
			<table class="profile-info">
				<tr>
					<td class="detail-title">Managed By</td>
					<td class="detail-info">{{ $project['opportunityManager'] }}</td>
				</tr>
				<tr>
					<td class="detail-title">Initiated Date</td>
					<td class="detail-info">	
						<span>{{date('d-m-Y',$project['createdDate']->sec)}}</span>
					</td>
				</tr>
				<tr>
					<td class="detail-title">Gross Value</td>
					<td class="detail-info">{{ $project['opportunityCurrency'].' '.number_format($project['opportunityGrossValue'],2,',','.') }}</td>
				</tr>
				<tr>
					<td class="detail-title">Nett Value</td>
					<td class="detail-info">{{ $project['opportunityCurrency'].' '.number_format($project['opportunityNetValue'],2,',','.') }}</td>
				</tr>
				<tr>
					<td class="detail-title">Description</td>
					<td class="detail-info">{{ $project['body'] }}</td>
				</tr>

			</table>
		</div>
		<div class="four columns">
			<h5>Related Documents</h5>
		</div>
</div>

<h6>Planned Schedule</h6>
<div class="row">
	<a class="foundicon-add-doc button right newdoc action clearfix" href="{{URL::to($addurl)}}">&nbsp;&nbsp;<span>{{$newbutton}}</span></a>
</div>
<div class="row">
	<div class="gantt"></div>
</div>

<h6>Progress</h6>
<div class="row">
	<a class="foundicon-add-doc button right newdoc action clearfix" href="{{URL::to($addurl)}}">&nbsp;&nbsp;<span>{{$newprogressbutton}}</span></a>
</div>
<div class="row">
	<div class="gantt"></div>
</div>

<script type="text/javascript">
	var source_url = '{{ $ajaxsource }}';
</script>

@endsection