@layout('dialog')

@section('content')

<div class="row fileviewer-container">
	<div class="twelve columns">
		<iframe class="fileviewer" src="{{$href}}" width="100%" height="100%"></iframe>
	</div>
</div>

{{$form->open('','POST',array('class'=>'custom','id'=>'newdoc'))}}
	<h4>Document Approval</h4>
	<div class="row-fluid approval-container">
	  	<div class="three columns">
		    {{ $form->radio('approve','Approve','yes',true)}} 
		    {{ $form->radio('approve','Not Approve','no')}} 
		    {{ $form->radio('approve','Transfer To','transfer')}} 
			{{ $form->text('transfer','','',array('class'=>'text auto_user','id'=>'fwdto')) }}
			<div id="notifier"></div>
		</div>   
		<div class="six columns">
	  		{{ $form->hidden('docid',$doc['_id']->__toString(),array('id'=>'docId'))}}
		    {{ $form->textarea('note','Note','',array('class'=>'eleven right','id'=>'note', 'rows'=>'4')) }}
		</div>	    
{{ $form->close()}}
		<div class="three columns">
			{{ $form->text('pass','Password.req','',array('class'=>'text','id'=>'pass')) }}
			{{ Form::button('OK',array('class'=>'button','id'=>'doaction'))}}&nbsp;&nbsp;
			{{ Form::button('Cancel',array('class'=>'button','id'=>'docancel'))}}
		</div>
	</div>    

<script type="text/javascript">

	$('#doaction').click(function(){
		var _id = $('#docId').val();
		var pass = $('#pass').val();
		var note = $('#note').val();
		var fwdto = $('#fwdto').val();
		var approve = $('input:radio[name=approve]:checked').val();

		$('#notifier').html('Processing...');

		$.post('{{ URL::to($ajaxpost) }}',{'docid':_id, 'pass': pass,'fwdto':fwdto, 'approval':approve,'note':note}, function(data) {
			if(data.status == 'OK'){
				$('#notifier').html('Approval Success');
				//parent.oTable.fnDraw();
				parent.jQuery.fancybox.close();

				//redraw table
				//alert("Item id : " + _id + " deleted");
			}else if(data.status == 'AUTHFAILED'){
				$('#notifier').html('Wrong Password');
				alert('Authentication failed, please check your Password');
			}
		},'json');

		return false;
	});

	$('#docancel').click(function(){
		parent.jQuery.fancybox.close();
		return false;
	});

</script>

@endsection

