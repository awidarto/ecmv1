@layout('master')

@section('content')
<div class="tableHeader">
<h3>{{$title}}</h3>
</div>

{{ Asset::container('ckeditor')->scripts(); }}

{{$form->open_for_files('message/forward/'.$id,'POST',array('class'=>'custom','id'=>'newmsg'))}}
<div class="row">
  <div class="twelve columns">

    {{ $form->hidden('from',Auth::user()->email )}}

    {{ $form->hidden('fromId',Auth::user()->id )}}

    {{ $form->hidden('forwardfrom','')}}
    <div class="row">
        <span style="margin-left:0px"><strong>From</strong></span><span style="padding-left:20px;">{{Auth::user()->fullname}} ( {{ Auth::user()->email }} )</span>
    </div>
    {{ $form->text('to','To','',array('class'=>'tag_email_inline four','style'=>'width:100%')) }}
    {{ $form->text('cc','Cc','',array('class'=>'tag_email_inline four','style'=>'width:100%')) }}
    {{ $form->text('bcc','Bcc','',array('class'=>'tag_email_inline four','style'=>'width:100%')) }}

    {{ $form->text('subject','Subject','',array('class'=>'tag_project four','rows'=>'1', 'style'=>'width:100%')) }}

    {{ $editor->editor('body',$message['body'])}}


  </div>
</div>

<div class="row right">
{{ Form::submit('Send',array('class'=>'button'))}}
</div>
{{$form->close()}}


@endsection