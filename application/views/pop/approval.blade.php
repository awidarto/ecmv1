@layout('dialog')

@section('content')

<div class="row fileviewer-container">
	<div class="twelve columns">
		<iframe class="fileviewer" src="{{$href}}" width="100%" height="100%"></iframe>
	</div>
</div>

{{$form->open('','POST',array('class'=>'custom','id'=>'approveForm'))}}
	<h4>Document Approval</h4>
	<div class="row-fluid approval-container">
	  	<div class="three columns">
		    {{ $form->radio('approval','Approve','yes',true)}}
		    {{ $form->radio('approval','Not Approve','no')}}
		    {{ $form->radio('approval','Transfer To','transfer')}}
			{{ $form->text('fwdto','','',array('class'=>'text auto_user','id'=>'fwdto')) }}
		</div>
		<div class="six columns">
	  		{{ $form->hidden('docid',$doc['_id']->__toString(),array('id'=>'docId'))}}
		    {{ $form->textarea('note','Note','',array('class'=>'eleven right','id'=>'note', 'rows'=>'4')) }}
			<div id="notifier"></div>
		</div>
{{ $form->close()}}
		<div class="three columns">
			{{ $form->password('pass','Password.req','',array('class'=>'text','id'=>'pass')) }}
			{{ Form::submit('OK',array('class'=>'button','id'=>'doaction'))}}&nbsp;&nbsp;
			{{ Form::button('Cancel',array('class'=>'button','id'=>'docancel'))}}
		</div>
	</div>

{{ HTML::script('js/jquery.form.js') }}


<script type="text/javascript">
	$(document).ready(function() {
	    var options = {
	        target:        '#notifier',   // target element(s) to be updated with server response
	        beforeSubmit:  preSubmission,  // pre-submit callback
	        success:       postSubmission,  // post-submit callback
	        url: '{{ URL::to($ajaxpost) }}',
	        dataType:  'json'

	        // other available options:
	        //url:       url         // override for form's 'action' attribute
	        //type:      type        // 'get' or 'post', override for form's 'method' attribute
	        //dataType:  'json',        // 'xml', 'script', or 'json' (expected server response type)
	        //clearForm: true        // clear all form fields after successful submit
	        //resetForm: true        // reset the form after successful submit

	        // $.ajax options can be used here too, for example:
	        //timeout:   3000
	    };

	    // bind to the form's submit event
	    $('#approveForm').submit(function() {
	        // inside event callbacks 'this' is the DOM element so we first
	        // wrap it in a jQuery object and then invoke ajaxSubmit
	        $(this).ajaxSubmit(options);

	        // !!! Important !!!
	        // always return false to prevent standard browser submit and page navigation
	        return false;
	    });
	});

/*
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

	$('#passboxs').keyup(function(){

		passval = $('#passbox').val();


		var passboxreplace = '';

		for(var i = 0;i < passval.length;i++){
			passboxreplace += '*';
		}

		$('#passbox').val(passboxreplace);

		$('#pass').val(passval);

	});
*/
	function preSubmission(formData, jqForm, options){
	    var queryString = $.param(formData);

	    // jqForm is a jQuery object encapsulating the form element.  To access the
	    // DOM element for the form do this:
	    // var formElement = jqForm[0];

		$('#notifier').html('Processing...');

	    // here we could return false to prevent the form from being submitted;
	    // returning anything other than false will allow the form submit to continue
	    return true;

	}

	// post-submit callback
	function postSubmission(responseObj, statusText, xhr, $form)  {
	    // for normal html responses, the first argument to the success callback
	    // is the XMLHttpRequest object's responseText property

	    // if the ajaxSubmit method was passed an Options Object with the dataType
	    // property set to 'xml' then the first argument to the success callback
	    // is the XMLHttpRequest object's responseXML property

	    // if the ajaxSubmit method was passed an Options Object with the dataType
	    // property set to 'json' then the first argument to the success callback
	    // is the json data object returned by the server
	    var data = responseObj;

		if(data.status == 'OK'){
			$('#notifier').html('Approval Success');
			//parent.oTable.fnDraw();
			parent.jQuery.fancybox.close();

			//redraw table
			//alert("Item id : " + _id + " deleted");
		}else if(data.status == 'AUTHFAILED'){
			$('#notifier').html('Wrong Password');
			alert('Authentication failed, please check your Password');
		}else if(data.status == 'ALREADY'){
			$('#notifier').html('You have already responded to this request');
		}

	}

	$('#docancel').click(function(){
		parent.jQuery.fancybox.close();
		return false;
	});

</script>

@endsection

