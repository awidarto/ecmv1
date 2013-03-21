@layout('noaside')

@section('content')

<?php
	//print_r(Auth::user());
?>
<div class="tableHeader">
<h3>{{$title}}</h3>


</div>
<div class="row">
		<div class="four columns">
			<table class="profile-info">
				<tr>
					<td class="detail-title">Opportunity Number</td>
					<td class="detail-info">{{ $opportunity['opportunityNumber'] }}</td>
				</tr>
				<tr>
					<td class="detail-title">Prospective Client</td>
					<td class="detail-info">{{ $opportunity['clientCompany'] }}</td>
				</tr>
				<tr>
					<td class="detail-title">Managed By</td>
					<td class="detail-info">{{ $opportunity['opportunityPIC'] }}</td>
				</tr>
				<tr>
					<td class="detail-title">Closing Date</td>
					<td class="detail-info">	
						<span>{{date('d-m-Y',$opportunity['closingDate']->sec)}}</span>
					</td>
				</tr>
				<tr>
					<td class="detail-title">Opportunity Date</td>
					<td class="detail-info">	
						<span>{{date('d-m-Y',$opportunity['opportunityDate']->sec)}}</span>
					</td>
				</tr>
		<?php
/*
				<tr>
					<td class="detail-title">Estimated Value</td>
					<td class="detail-info">{{ $opportunity['estimatedCurrency'].' '.number_format($opportunity['estimatedValue'],2,',','.') }}</td>
				</tr>
				<tr>
					<td class="detail-title">Estimated Value in USD</td>
					<td class="detail-info">{{ $opportunity['equivalentEstimatedCurrency'].' '.number_format($opportunity['equivalentEstimatedValue'],2,',','.') }}</td>
				</tr>
*/

		?>
				<tr>
					<td class="detail-title">Description</td>
					<td class="detail-info">{{ $opportunity['targetScopeDescription'] }}</td>
				</tr>

			</table>
		</div>
		<div class="eight columns">
			<h5>Related Documents</h5>
				<div class="foundicon-add-doc button right transfer action" id="{{ $opportunity['opportunityNumber'] }}" >&nbsp;&nbsp;<span>Transfer To Tender</span></div>
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
				<div class="clear"></div>
			<hr />	
			<h5>Contact Persons</h5>
				<span class="foundicon-add-doc button right newdoc action clearfix" id="addcontact">&nbsp;&nbsp;<span>Add Contact</span></span>
				<table class="contactTable">
				    <thead>
				        <tr>
				        	<?php
					        	if(!isset($colclass)){
					        		$colclass = array();
					        	}
				        		$hid = 0;
				        	?>
				        	@foreach($contactheads as $head)
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
				</table>

		</div>
</div>
<hr />
<div class="row">
	<div class="twelve columns">
		<h5>Progress</h5>
		{{ View::make('partials.progresstable')->with('controller','opportunity')->render() }}

	</div>
</div>

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
				"sDom": 'T<"clear">lrtip',
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

        var cTable = $('.contactTable').DataTable(
			{
				"bRetrieve": true,
				"bProcessing": true,
		        "bServerSide": true,
		        "sAjaxSource": "{{$ajaxsourcecontact}}",
				"oLanguage": { "sSearch": "Search "},
				"sPaginationType": "full_numbers",
				"sDom": 'T<"clear">lrtip',
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

        var pTable = $('#progressTable').DataTable(
			{
				"bRetrieve": true,
				"bProcessing": true,
		        "bServerSide": true,
		        "sAjaxSource": "{{$ajaxsourceprogress}}",
				"oLanguage": { "sSearch": "Search "},
				"sPaginationType": "full_numbers",
				"sDom": 'T<"clear">lrtip',
				"oTableTools": {
					"sSwfPath": "assets/swf/copy_csv_xls_pdf.swf"
				},
				"aoColumnDefs": [ 
				    { "bSortable": false, "aTargets": [ 0,2,3 ] }
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

		$('table#progressTable').click(function(e){

			if ($(e.target).is('.addcomment')) {
				var _id = e.target.id;
				var comment = $('#comment_' + _id).val();
				
				$.post('{{ URL::to("opportunity/addcomment/".$opportunity["_id"]) }}',{'progressid':_id,'comment':comment}, function(data) {
					if(data.status == 'OK'){
						//redraw table
						pTable.fnDraw();
						//alert('Comment added');
					}
				},'json');

				/*
				var answer = confirm("Are you sure you want to delete this item ?");
				if (answer){
				}else{
					alert("Deletion cancelled");
				}
				*/
		   	}


		});

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

		$('#addcontact').click(function(){
			$.fancybox({
				type:'iframe',
				width:'800',
				href: '{{ URL::to("contact/contactperson/".$opportunity["_id"]) }}',
				autosize: false,
				afterClose:function(){
					cTable.fnDraw();
				}
			});
		});

		$('.transfer').click(function(){
			$.fancybox({
				type:'iframe',
				width:'800',
				href: '{{ URL::to("opportunity/transfer/".$opportunity["_id"].'/'.$opportunity["opportunityNumber"]) }}',
				autosize: false,
				afterClose:function(){
					cTable.fnDraw();
				}
			});
		});

		$('#progressAdd').click(function(){

			var progress = {};
			progress.progressInput = $('#progressInput').val();
			progress.userId = '{{ Auth::user()->id }}';
			progress.userInitial = '{{ Auth::user()->initial }}';

			$.post("{{ URL::to('opportunity/addprogress/'.$opportunity['_id']) }}",progress, function(data) {
				if(data.status == 'OK'){
					//redraw table
					pTable.fnDraw();
				}
			},'json');

		});

    });
  </script>
@endsection