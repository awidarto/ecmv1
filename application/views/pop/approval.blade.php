@layout('dialog')

@section('content')

{{$form->open('','GET',array('class'=>'custom','id'=>'approve'))}}
<div class="row">
  	<div class="twelve columns">
	    <h4>Document Approval</h4>

	    {{ $form->radio('approve','Approve','yes')}} 

	    {{ $form->radio('approve','Not Approve','no')}} 

	    {{ $form->textarea('note','Note','',array('class'=>'four','id'=>'pass', 'rows'=>'4')) }}

	    
	</div>   
</div>    
<div class="row">
	<div class="six columns">
		{{ $form->text('passkey','Passkey.req','',array('class'=>'text')) }}
	</div>
</div>
<hr />
<div class="row right">
{{ Form::button('OK',array('class'=>'button'))}}&nbsp;&nbsp;
{{ Form::reset('Reset',array('class'=>'button'))}}
</div>
{{$form->close()}}
@endsection

