@layout('testmaster')

@section('content')
	
<div class="row">
	<div class="two columns" id="categoryTree">

	</div>
</div>	
  <script type="text/javascript">
    $(document).ready(function(){

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
							{"label":"Email","id":"email",
								"children":[
									{"label":"References","id":"references"},
									{"label":"Correspondences","id":"correspondences"},
									{"label":"Minutes of Meeting","id":"minutesofmeeting"},
									{"label":"Progress Report","id":"progressreport"}
								]
							}
						]
					},
					{"label":"Minutes of Meeting","id":"minutesofmeeting"},
					{"label":"Progress Report","id":"progressreport"}
				]
			}
		];

		$('#categoryTree').tree(
			{
				data:catdata
			}
		);

		$('#categoryTree').bind(
		    'tree.init',
		    function() {
		    	console.log('init');
				//$('ul.jqtree_common').css({'overflow':'visible'});
		    }
		);

		$('ul.jqtree_common').css({'overflow':'visible'});


    });

    </script>


@endsection