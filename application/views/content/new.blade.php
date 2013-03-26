@layout('master')


@section('content')
<div class="tableHeader">
<h3>{{$title}}</h3>
</div>

{{ Asset::container('ckeditor')->scripts(); }}

{{$form->open_for_files('content/add','POST',array('class'=>'custom','id'=>'newdoc'))}}
<div class="row">
  <div class="seven columns left">

    {{ $form->text('title','Title.req','',array('class'=>'text')) }}

    {{ $form->textarea('description','Description.req','',array('class'=>'text')) }}

    {{ $editor->editor('body')}}    

  </div>
  <div class="four columns right">

    {{ $form->text('slug','Permalink','',array('class'=>'twelve')) }}

    {{ $form->select('section','Section',Config::get('parama.contentsection'),array('class'=>'one'))}}

    {{ $form->select('category','Category',Config::get('parama.contentcategory'),array('class'=>'one'))}}

    {{ $form->checkbox('published','Published',1)}}

    {{ $form->checkbox('always','Unlimited Date',1)}} 

    {{ $form->text('startDate','Start Publishing','',array('class'=>'five date')) }}

    {{ $form->text('endDate','End Publishing','',array('class'=>'five date')) }}

    {{ $form->text('tag','Tag','',array('class'=>'tag_keyword','rows'=>'1')) }}

  </div>
</div>

<div class="row">
  <div class="twelve columns">

  </div>
</div>
<hr />
<div class="row right">
{{ Form::submit('Save',array('class'=>'button'))}}&nbsp;&nbsp;
<a class="button" href="javascript:window.history.back();">Cancel</a>
</div>
{{$form->close()}}

<script type="text/javascript">
  $('select').select2();

  $('#field_role').change(function(){
      //alert($('#field_role').val());
      // load default permission here
  });

  $('#newdoc').submit(function() {
    $('#upload-indicator').toggle();
    $('#newdoc').submit();
  });

</script>

@endsection