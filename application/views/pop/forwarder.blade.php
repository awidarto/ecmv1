@layout('dialog')

@section('content')

<div class="row fileviewer-container">
	<div class="twelve columns">
		<iframe class="fileviewer" src="{{$href}}" width="100%" height="100%"></iframe>
	</div>
</div>

	<h4>Document Approval Transfer</h4>
	<div class="row-fluid approval-container">
	  	<div class="three columns">
	  		{{ $form->hidden('docid',$doc['_id']->__toString(),array('id'=>'docId'))}}
			{{ $form->text('transfer','Transfer To.req','',array('class'=>'text auto_user','id'=>'fwdto')) }}
			<div id="notifier"></div>
		</div>   
		<div class="five columns">
		    {{ $form->textarea('note','Note','',array('class'=>'eleven right','id'=>'note', 'rows'=>'4')) }}
		</div>	    
		<div class="three columns">
			{{ $form->text('pass','Password.req','',array('class'=>'text','id'=>'pass')) }}
			{{ Form::button('OK',array('class'=>'button','id'=>'doaction'))}}&nbsp;&nbsp;
			{{ Form::button('Cancel',array('class'=>'button','id'=>'docancel'))}}
		</div>
	</div>    

<script type="text/javascript">

	$('#doaction').click(function(){
		var _id = $('#docId').val();
		var fwdto = $('#fwdto').val();
		var pass = $('#pass').val();
		var note = $('#note').val();

		$('#notifier').html('Processing...');

		$.post('{{ URL::to($ajaxpost) }}',{'docid':_id, 'pass': pass, 'fwdto':fwdto,'note':note}, function(data) {
			if(data.status == 'OK'){
				$('#notifier').html('Transfer Success');

				//redraw table
				//oTable.fnDraw();
				//alert("Item id : " + _id + " deleted");
			}
		},'json');		
	});

	$('#docancel').click(function(){

	});

</script>

@endsection

