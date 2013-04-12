@layout('master')

@section('content')
<div class="tableHeader">
	@if($title != '')
		<h3>{{$title}}</h3>
	@endif
	@if(isset($importurl) && $importurl != '')
		<a class="foundicon-add-doc button right newdoc action" href="{{URL::to($importurl)}}">&nbsp;&nbsp;<span>{{$importbutton}}</span></a>
	@endif
	@if(isset($addurl) && $addurl != '')
		<a class="foundicon-add-doc button right newdoc action clearfix" href="{{URL::to($addurl)}}">&nbsp;&nbsp;<span>{{$newbutton}}</span></a>
	@endif
</div>
<div class="row">
	<div class="two columns" id="categoryBox">
		<div id="categoryTree">

		</div>
	</div>
	<div class="ten columns">
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

  <script type="text/javascript">
    $(document).ready(function(){
		var asInitVals = new Array();

		var currentCategory = 'all';

		@if(isset($category))
			var catdata = {{$category}};
		@else
			var catdata = [
				{"label":"All","id":"all"},
				{"label":"General",
					"id":"parent",
					"children":[
						{"label":"References","id":"references"},
						{"label":"Correspondences","id":"correspondences"},
						{"label":"Minutes of Meeting","id":"minutesofmeeting"},
						{"label":"Progress Report","id":"progressreport"}
					]
				},
				{	
					"label":"Indoor Sales",
					"id":"parent",
					"children":[
						{"label":"References","id":"references"},
						{"label":"Communication",
							"id":"communication",
							"children":[
								{"label":"Letter","id":"letter"},
								{"label":"Email","id":"email"}
							]
						},
						{"label":"Minutes of Meeting","id":"minutesofmeeting"},
						{"label":"Progress Report","id":"progressreport"}
					]
				}
			];

		@endif

		$('#categoryTree').tree(
			{
				data:catdata,
				autoOpen:true

				/*,
				selectable: true,				
			    onCanSelectNode: function(node) {
			        if (node.children.length == 0) {
			            // Nodes without children can be selected
			            return true;
			        }
			        else {
			            // Nodes with children cannot be selected
			            return false;
		        	}
				}
				*/
				
			}
		);

        oTable = $('.dataTable').DataTable(
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
			    	aoData.push({
			    		'name': 'searchCategory',
			    		'value': currentCategory
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

		$('#categoryTree').bind(
		    'tree.click',
		    function(event) {
		        // The clicked node is 'event.node'
		        var node = event.node;
		        currentCategory = node.id;
		        console.log(node.id);
		        if( node.id != 'parent'){
					oTable.fnDraw();
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

			if ($(e.target).is('.purge')) {
				var _id = e.target.id;
				var answer = confirm("Are you sure you want to purge this item ?");
				if (answer){
					$.post('{{ URL::to($ajaxdel) }}',{'id':_id}, function(data) {
						if(data.status == 'OK'){
							//redraw table
							oTable.fnDraw();
							alert("Item id : " + _id + " purged");
						}
					},'json');
				}else{
					alert("Purge cancelled");
				}
		   	}

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
					alert("Delete cancelled");
				}
		   	}

		   	@if(isset($ajaxrestore))

				if ($(e.target).is('.restore')) {
					var _id = e.target.id;
					var answer = confirm("Are you sure you want to restore this item ?");
					if (answer){
						$.post('{{ URL::to($ajaxrestore) }}',{'id':_id}, function(data) {
							if(data.status == 'OK'){
								//redraw table
								oTable.fnDraw();
								alert("Item id : " + _id + " restored");
							}
						},'json');
					}else{
						alert("Restore cancelled");
					}
			   	}

		   	@endif
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

				var fileurl = '{{ URL::base().'/storage/' }}' + _id + '/' + e.target.innerHTML;

				$.fancybox({
					type:'iframe',
					href: '{{ URL::to("document/fileview/") }}' + _id,
					width:'1000',
					height: '800',
					autosize: false
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

			if ($(e.target).is('.printcover')) {
				var doc_id = e.target.id;

				$.fancybox({
					type:'iframe',
					href: '{{ URL::to("document/cover/") }}' + doc_id,
					width:'1000',
					autosize: false
				});
			}

			if ($(e.target).is('.noapproval')) {
				alert('You have taken an action on this request, no further action needed. Thank you.')
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