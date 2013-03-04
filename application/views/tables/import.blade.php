@layout('master')

@section('content')
<!--<div class="tableHeader">
	@if($title != '')
		<h3>{{$title}}</h3>
	@endif
	@if(isset($addurl) && $addurl != '')
		<a class="foundicon-add-doc button right newdoc action clearfix" href="{{URL::to($addurl)}}">&nbsp;&nbsp;<span>{{$newbutton}}</span></a>
	@endif
</div>
-->
<div class="span12">

    <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>-->

    <div id="content-filters" class="row-fluid" style="display:none;">
       <div class="span12">
          <h5>Filter Data</h5>
          <ul class="nav nav-pills">
             <li class="dropdown">
                <a class="dropdown-toggle accent-color" data-toggle="dropdown" href="#">
                   All projects
                   <b class="caret" href="#"></b>
                </a>
                <ul id="projects-filter" class="dropdown-menu">
                   <li><a href="#">All projects</a></li>
                   <li><a href="#">ACME</a></li>
                   <li><a href="#">Surface</a></li>
                   <li><a href="#">OSX</a></li>
                   <li><a href="#">WinRT</a></li>
                </ul>
             </li>
             <li class="dropdown">
                <a class="dropdown-toggle accent-color" data-toggle="dropdown" href="#">
                   All budgets
                   <b class="caret" href="#"></b>
                </a>
                <ul id="budget-filter" class="dropdown-menu">
                   <li><a href="#">All budgets</a></li>
                   <li><a href="#">Budget &lt; 1.000</a></li>
                   <li><a href="#">Budget 1.000 - 10.000</a></li>
                   <li><a href="#">Budget 10.000 - 45.000</a></li>
                   <li><a href="#">Budget 45.000 - 100.000</a></li>
                   <li><a href="#">Budget &gt; 100.000</a></li>
                </ul>
             </li>
             <li class="">
                <a>&nbsp;|&nbsp;</a><span>Sort by&nbsp;</span>
             </li>
             <li class="dropdown">

                <a class="dropdown-toggle accent-color" data-toggle="dropdown" href="#">
                   Project name
                   <b class="caret" href="#"></b>
                </a>
                <ul id="sort-filter" class="dropdown-menu">
                   <li><a href="#">Project name</a></li>
                   <li><a href="#">Budget Cost</a></li>
                   <li><a href="#">Duration</a></li>
                </ul>
             </li>
          </ul>
       </div>
    </div>

    <div class="row">
       <div class="twelve columns">

{{$form->open('import/commit/'.$controller.'/'.$importid,'POST',array('class'=>'custom','id'=>'commit_form'))}}

			{{ $form->hidden('importid',$importid)}}
			{{ $form->hidden('head_count',$head_count)}}
			<div class="row">
				<div class="one columns"><strong>Legend :</strong></div>
				<div class="two columns"><span class="invalidhead">invalid heads</span></div>
				<div class="two columns"><span class="duplicateemail">email already exists</span></div>
				<div class="seven columns">
					{{ Form::submit('Commit',array('class'=>'button right'))}}
				</div>
			</div>
			<hr />

			<table class="table table-condensed dataTable attendeeTable">

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

		    	@if($searchinput)
				    <thead id="searchinput">
					    <tr>
				    	@foreach($searchinput as $in)
				    		@if($in)
				        		<td>{{ $in }}</td>
				    		@else
				        		<td>&nbsp;</td>
				    		@endif
				    	@endforeach
					    </tr>
				    </thead>
			    @endif

             <tbody>
             	<!-- will be replaced by ajax content -->
             </tbody>

             <!--
		    	@if($searchinput)
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
			    @endif
			-->
          </table>

{{$form->close()}}

       </div>
    </div>

 </div>

<script type="text/javascript">

	var oTable;

	var current_pay_id = 0;
	var current_del_id = 0;
	var current_print_id = 0;

	function toggle_visibility(id) {
		$('#' + id).toggle();
	}

	/* Formating function for row details */
	function fnFormatDetails ( nTr )
	{
	    var aData = oTable.fnGetData( nTr );

	    console.log(aData);

	    var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';

	    @yield('row')

	    sOut += '</table>';

	    return sOut;
	}

    $(document).ready(function(){

		$('.activity-list').tooltip();

		var asInitVals = new Array();

        oTable = $('.dataTable').DataTable(
			{
				"bProcessing": true,
		        "bServerSide": true,
		        "sAjaxSource": "{{$ajaxsource}}",
				"oLanguage": { "sSearch": "Search "},
				"sPaginationType": "full_numbers",
				"sDom": 'CT<"clear">lrtip',
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

		$('.dataTable tbody td .expander').live( 'click', function () {

		    var nTr = $(this).parents('tr')[0];
		    if ( oTable.fnIsOpen(nTr) )
		    {
		        /* This row is already open - close it */
		        //this.src = "../examples_support/details_open.png";
		        oTable.fnClose( nTr );
		    }
		    else
		    {
		        /* Open this row */
		        //this.src = "../examples_support/details_close.png";
		        oTable.fnOpen( nTr, fnFormatDetails(nTr), 'details-expand' );
		    }
		} );

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



		//header search

		$('thead input').keyup( function () {
			/* Filter on the column (the index) of this element */
			oTable.fnFilter( this.value, $('thead input').index(this) );
		} );

		/*
		 * Support functions to provide a little bit of 'user friendlyness' to the textboxes in
		 * the footer
		 */
		$('thead input').each( function (i) {
			asInitVals[i] = this.value;
		} );

		$('thead input').focus( function () {
			if ( this.className == 'search_init' )
			{
				this.className = '';
				this.value = '';
			}
		} );

		$('thead input').blur( function (i) {
			if ( this.value == '' )
			{
				this.className = 'search_init';
				this.value = asInitVals[$('thead input').index(this)];
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


		$('#select_all').click(function(){
			if($('#select_all').is(':checked')){
				$('.selector').attr('checked', true);
			}else{
				$('.selector').attr('checked', false);
			}
		});

		$('#override_all').click(function(){
			if($('#override_all').is(':checked')){
				$('.overselector').attr('checked', true);
			}else{
				$('.overselector').attr('checked', false);
			}
		});

		$('#savepaystatus').click(function(){
			var paystat = $('#paystatusselect').val();

			<?php

				$ajaxpay = (isset($ajaxpay))?$ajaxpay:'/';
			?>

			$.post('{{ URL::to($ajaxpay) }}',{'id':current_pay_id,'paystatus': paystat}, function(data) {
				if(data.status == 'OK'){
					//redraw table

					oTable.fnDraw();
					$('#paystatusindicator').html('Payment status updated');

					$('#paystatusselect').val('unpaid');

					$('#updatePayment').modal('toggle');

				}
			},'json');
		});


		$('table.dataTable').click(function(e){

			if ($(e.target).is('._del')) {
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

			if ($(e.target).is('.pbadge')) {
				var _id = e.target.id;

				current_print_id = _id;

				$('#print_id').val(_id);

				<?php

					$printsource = (isset($printsource))?$printsource.'/': '/';

				?>

				var src = '{{ $printsource }}' + _id;

				$('#print_frame').attr('src',src);

				$('#printBadge').modal();
		   	}

			if ($(e.target).is('.pay')) {
				var _id = e.target.id;

				current_pay_id = _id;

				$('#updatePayment').modal();

		   	}

			if ($(e.target).is('.del')) {
				var _id = e.target.id;

				current_del_id = _id;

				$('#deleteWarning').modal({
					keyboard:true
				});
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

		});

		//function to show add attendee to group
		/*$(".selector").live("click", function(){
			if ($('.selector').is(':checked')) {
			    $(".add_to_group").show();
			} else {
			    $(".add_to_group").hide();
			}
		});
		$("#select_all").live("click", function(){
			if ($('.selector').is(':checked')) {
			    $(".add_to_group").show();
			} else {
			    $(".add_to_group").hide();
			}
		});*/



    });
  </script>

@endsection