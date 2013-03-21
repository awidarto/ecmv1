@layout('dialog')

@section('content')
		<div class="row">
		<div class="twelve columns">
	{{$form->open('','POST',array('class'=>'custom','id'=>'transferForm'))}}
			<fieldset>
				{{ $form->hidden('opportunityId',$id,array('id'=>$id))}}
				{{ $form->hidden('opportunityNumber',$num,array('id'=>$num))}}

				{{ $form->text('docTender','Tender Number','',array('id'=>'tender_number','class'=>'auto_tender_number four','rows'=>'1', 'style'=>'width:100%')) }}

				<div id="notifier"></div>

				{{ $form->hidden('docTenderId','',array('id'=>'tender_id')) }}

			</fieldset>
		</div>
		</div>
		<hr />
		<div class="row right">
		{{ Form::button('Add',array('class'=>'button','id'=>'savecontact'))}}&nbsp;&nbsp;
		{{ Form::button('Cancel',array('class'=>'button','id'=>'docancel'))}}
		</div>
	{{ $form->close()}}

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
	    $('#transferForm').submit(function() { 
	        // inside event callbacks 'this' is the DOM element so we first 
	        // wrap it in a jQuery object and then invoke ajaxSubmit 
	        $(this).ajaxSubmit(options); 
	 
	        // !!! Important !!! 
	        // always return false to prevent standard browser submit and page navigation 
	        return false; 
	    }); 
	}); 

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
			$('#notifier').html('Transfer Success');
			//parent.oTable.fnDraw();
			parent.jQuery.fancybox.close();

			//redraw table
			//alert("Item id : " + _id + " deleted");
		}else if(data.status == 'AUTHFAILED'){
			$('#notifier').html('Wrong Password');
			alert('Authentication failed, please check your Password');
		}

	} 

	$('#docancel').click(function(){
		parent.jQuery.fancybox.close();
		return false;
	});

</script>


@endsection