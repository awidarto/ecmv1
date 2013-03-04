@layout('master')

@section('content')
<div class="tableHeader">
	@if($title != '')
		<h3>{{$title}}</h3>
	@endif
	@if(isset($importurl) && $importurl != '')
		<a class="foundicon-add-doc button newdoc action" href="{{URL::to($importurl)}}">&nbsp;&nbsp;<span>{{$importbutton}}</span></a>
	@endif
	@if(isset($addurl) && $addurl != '')
		<a class="foundicon-add-doc button right newdoc action clearfix" href="{{URL::to($addurl)}}">&nbsp;&nbsp;<span>{{$newbutton}}</span></a>
	@endif
</div>
{{ $form->open('searchForm')}}
<div class="row">
	<div class="six columns">
		{{$form->text('title','Title Contains','',array('id'=>'searchTitle'))}}

		<div class="row">
			<div class="six columns">
				{{$form->text('createdFrom','Created Between','',array('id'=>'createdFrom','class'=>'date'))}}
			</div>
			<div class="six columns">
				{{$form->text('createdTo','To','',array('id'=>'createdTo','class'=>'date'))}}
			</div>
		</div>

		<div class="row">
			<div class="six columns">
				{{$form->text('expiredFrom','Expired Between','',array('id'=>'expiredFrom','class'=>'date'))}}
			</div>
			<div class="six columns">
				{{$form->text('expiredTo','To','',array('id'=>'expiredTo','class'=>'date'))}}
			</div>
		</div>

	</div>
	<div class="six columns">
		{{$form->text('tags','Have Tagged Keywords','',array('id'=>'searchTags','class'=>'tag_keyword'))}}
	</div>
</div>
<div class="row">
	<div class="twelve colums">
		{{ Form::reset('Clear',array('id'=>'doClear','class'=>'button right searchbtn')) }}&nbsp;&nbsp;&nbsp;
		{{ Form::button('Search',array('id'=>'doSearch','class'=>'button right searchbtn')) }}
		
	</div>
</div>
{{ $form->close()}}
<div class="row">
	<table class="dataTable">
	    <thead>
	        <tr>
	        	@foreach($heads as $head)
	        		@if(is_array($head))
	        			<th 
	        				@foreach($head[1] as $key=>$val)
	        					{{ $key }}="{{ $val }}"

	        				@endforeach
	        			>
	        			{{ $head[0] }}
	        			</th>
	        		@else
	        		<th>
	        			{{ $head }}
	        		</th>
	        		@endif
	        	@endforeach
	        </tr>
	        @if(isset($secondheads) && !is_null($secondheads))
	        	<tr>
	        	@foreach($secondheads as $head)
	        		@if(is_array($head))
	        			<th 
	        				@foreach($head[1] as $key=>$val)
	        					{{ $key }}="{{ $val }}"

	        				@endforeach
	        			>
	        			{{ $head[0] }}
	        			</th>
	        		@else
	        		<th>
	        			{{ $head }}
	        		</th>
	        		@endif
	        	@endforeach
	        	</tr>
	        @endif
	    </thead>
	    <tbody>
	    </tbody>
	    <tfoot>
	    <tr>

	    </tr>
	    </tfoot>
	</table>
</div>

  <script type="text/javascript">
    $(document).ready(function(){
		var asInitVals = new Array();
        var oTable = $('.dataTable').DataTable(
			{
				"bProcessing": true,
		        "bServerSide": true,
		        "sAjaxSource": "{{$ajaxsource}}",
				"oLanguage": { "sSearch": "Search "},
				"sPaginationType": "full_numbers",
				"sDom": 'CT<"clear">lrtip',
				@if(isset($excludecol) && $excludecol != '')
				"oColVis": {
					"aiExclude": [ {{ $excludecol }} ]
				},
				@endif
				"oTableTools": {
					"sSwfPath": "{{ URL::base() }}/swf/copy_csv_xls_pdf.swf"
				},
				"aoColumnDefs": [ 
				    { "bSortable": false, "aTargets": [ {{ $disablesort }} ] }
				 ],
			    "fnServerData": function ( sSource, aoData, fnCallback ) {

			    	var searchTitle = $('#searchTitle').val();
			    	var searchTags = $('#searchTags').val();
			    	var searchcreatedFrom = $('#createdFrom').val();
			    	var searchcreatedTo = $('#createdTo').val();
			    	var searchexpiredFrom = $('#expiredFrom').val();
			    	var searchexpiredTo = $('#expiredTo').val();

			    	aoData.push({
			    		'name': 'searchTitle',
			    		'value': searchTitle
			    	});

			    	aoData.push({
			    		'name': 'searchTags',
			    		'value': searchTags
			    	});

			    	aoData.push({
			    		'name': 'createdTo',
			    		'value': searchcreatedTo
			    	});

			    	aoData.push({
			    		'name': 'createdFrom',
			    		'value': searchcreatedFrom
			    	});

			    	aoData.push({
			    		'name': 'expiredTo',
			    		'value': searchexpiredTo
			    	});

			    	aoData.push({
			    		'name': 'expiredFrom',
			    		'value': searchexpiredFrom
			    	});

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

		$('#doSearch').click(function(){
			oTable.fnDraw();
			return false;
		});



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
					autosize: false,
					afterClose:function(){
						oTable.fnDraw();
					}					
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