@layout('noaside')

@section('content')

<div class="tableHeader">
<h3>{{$title}}</h3>


</div>
<div class="row">
		<div class="four columns">
			<table class="profile-info">
				<tr>
					<td class="detail-title">Project Number</td>
					<td class="detail-info">{{ $opportunity['opportunityNumber'] }}</td>
				</tr>
				<tr>
					<td class="detail-title">Project Name</td>
					<td class="detail-info">{{ $opportunity['title'] }}</td>
				</tr>
				<tr>
					<td class="detail-title">Managed By</td>
					<td class="detail-info">{{ $opportunity['opportunityManager'] }}</td>
				</tr>
				<tr>
					<td class="detail-title">Start Date</td>
					<td class="detail-info">	
						<span>{{date('d-m-Y',$opportunity['startDate']->sec)}}</span>
					</td>
				</tr>
				<tr>
					<td class="detail-title">Est. Completion</td>
					<td class="detail-info">	
						<span>{{date('d-m-Y',$opportunity['estCompleteDate']->sec)}}</span>
					</td>
				</tr>
				<tr>
					<td class="detail-title">Value</td>
					<td class="detail-info">{{ $opportunity['opportunityCurrency'].' '.number_format($opportunity['opportunityNetValue'],2,',','.') }}</td>
				</tr>
				<tr>
					<td class="detail-title">Description</td>
					<td class="detail-info">{{ $opportunity['body'] }}</td>
				</tr>

			</table>
		</div>
		<div class="eight columns">
			<h5>Related Documents</h5>
				<table class="dataTable">
				    <thead>
				        <tr>
				        	<?php
					        	if(!isset($colclass)){
					        		$colclass = array();
					        	}
				        		$hid = 0;
				        	?>
				        	@foreach($heads as $head)
				        		<th 
				        			@if(isset($colclass[$hid]))
				        				class="{{$colclass[$hid]}}"
				        			@endif
				        			<?php $hid++ ?>
				        		>
				        			{{ $head }}
				        		</th>
				        	@endforeach
				        </tr>
				    </thead>
				    <tbody>
				    </tbody>
				    <tfoot>
				    <tr>
				    	@foreach($searchinput as $in)
				    		@if($in)
				        		<td><input type="text" name="search_{{$in}}" id="search_{{$in}}" value="Search {{$in}}" class="search_init" /></td>
				    		@else
				        		<td>&nbsp;</td>
				    		@endif
				    	@endforeach        	
				    </tr>
				    </tfoot>
				</table>
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

  <script type="text/javascript">
    $(document).ready(function(){
		var asInitVals = new Array();
        var oTable = $('.dataTable').DataTable(
			{
				"bProcessing": true,
		        "bServerSide": true,
		        "sAjaxSource": "{{$ajaxsourcedoc}}",
				"oLanguage": { "sSearch": "Search "},
				"sPaginationType": "full_numbers",
				"sDom": 'T<"clear">lfrtip',
				"oTableTools": {
					"sSwfPath": "assets/swf/copy_csv_xls_pdf.swf"
				},
				"aoColumnDefs": [ 
				    { "bSortable": false, "aTargets": [ {{ $disablesort }} ] }
				 ],
			    "fnServerData": function ( sSource, aoData, fnCallback ) {
		            $.ajax( {
		                "dataType": 'json', 
		                "type": "POST", 
		                "url": sSource, 
		                "data": aoData, 
		                "success": fnCallback
		            } );
		        }
			}
        );

		$('tfoot input').keyup( function () {
			/* Filter on the column (the index) of this element */
			oTable.fnFilter( this.value, $('tfoot input').index(this) );
		} );

		/*
		 * Support functions to provide a little bit of 'user friendlyness' to the textboxes in 
		 * the footer
		 */
		$('tfoot input').each( function (i) {
			asInitVals[i] = this.value;
		} );

		$('tfoot input').focus( function () {
			if ( this.className == 'search_init' )
			{
				this.className = '';
				this.value = '';
			}
		} );

		$('tfoot input').blur( function (i) {
			if ( this.value == '' )
			{
				this.className = 'search_init';
				this.value = asInitVals[$('tfoot input').index(this)];
			}
		} );




		$('.filter input').keyup( function () {
			/* Filter on the column (the index) of this element */
			oTable.fnFilter( this.value, $('.filter input').index(this) );
		} );

		/*
		 * Support functions to provide a little bit of 'user friendlyness' to the textboxes in 
		 * the footer
		 */
		$('.filter input').each( function (i) {
			asInitVals[i] = this.value;
		} );

		$('.filter input').focus( function () {
			if ( this.className == 'search_init' )
			{
				this.className = '';
				this.value = '';
			}
		} );

		$('.filter input').blur( function (i) {
			if ( this.value == '' )
			{
				this.className = 'search_init';
				this.value = asInitVals[$('.filter input').index(this)];
			}
		} );

		$('table.dataTable').click(function(e){

			if ($(e.target).is('.del')) {
				var _id = e.target.id;
				var answer = confirm("Are you sure you want to delete this item ?");
				if (answer){
					$.post('{{ URL::to($ajaxdel) }}',{'id':_id}, function(data) {
						if(data.status == 'OK'){
							//redraw table
							oTable.fnDraw();
							alert("Item id : " + _id + " deleted");
						}
					},'json');
				}else{
					alert("Deletion cancelled");
				}
		   	}

			if ($(e.target).is('.pop')) {
				var _id = e.target.id;
				var _rel = $(e.target).attr('rel');

				$.fancybox({
					type:'iframe',
					href: '{{ URL::base() }}' + '/' + _rel + '/' + _id,
					autosize: true
				});

		   	}	

			if ($(e.target).is('.fileview')) {
				var _id = e.target.id;

				console.log(e);

				$.fancybox({
					type:'iframe',
					href: '{{ URL::base().'/storage/' }}' + _id + '/' + e.target.innerHTML,
					autosize: true
				});

		   	}		   			   	

			if ($(e.target).is('.metaview')) {
				var doc_id = e.target.id;

				$.fancybox({
					type:'iframe',
					href: '{{ URL::to("document/view/") }}' + doc_id,
					autosize: true
				});
			}

			if ($(e.target).is('.approvalview')) {
				var doc_id = e.target.id;

				$.fancybox({
					type:'iframe',
					width:'1000',
					href: '{{ URL::to("document/approve/") }}' + doc_id,
					autosize: false
				});
			}

			if ($(e.target).is('.forwardview')) {
				var doc_id = e.target.id;

				$.fancybox({
					type:'iframe',
					width:'1000',
					href: '{{ URL::to("document/forward/") }}' + doc_id,
					autosize: false
				});

				
			}

		});

    });
  </script>
@endsection