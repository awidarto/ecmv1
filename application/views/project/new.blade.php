@layout('master')


@section('content')
<div class="tableHeader">
<h3>{{$title}}</h3>
</div>

{{$form->open_for_files('project/add','POST',array('class'=>'custom','id'=>'newdoc'))}}
<div class="row">
  <div class="six columns left">
    <h4>Project Info</h4>

    {{ $form->text('title','Title.req','',array('class'=>'text')) }}

    {{ $form->textarea('description','Description.req','',array('class'=>'text')) }}

    {{ $form->textarea('body','Body','',array('class'=>'text')) }}

    {{ $form->text('projectApproval','Approved by','',array('class'=>'tag_email four', 'style'=>'width:100%')) }}

    {{ $form->text('projectShare','Shared to','',array('class'=>'tag_email four','style'=>'width:100%')) }}

    {{ $form->select('projectDepartment','Department of Origin',Config::get('parama.department'),array('class'=>'four'))}}

    {{ $form->text('projectTender','Related Tender','',array('class'=>'tag_tender four','rows'=>'1', 'style'=>'width:100%')) }}

    {{ $form->text('projectLead','Related Opportunity','',array('class'=>'tag_opportunity four','rows'=>'1', 'style'=>'width:100%')) }}

  </div>
  <div class="five columns right">
    <h4>Project Details</h4>

    {{ $form->text('startDate','Start Date','',array('class'=>'five date')) }}

    {{ $form->text('estCompleteDate','Estimated Completion Date','',array('class'=>'five date')) }}

    {{ $form->text('projectNumber','Project Number','',array('class'=>'four','rows'=>'1', 'style'=>'width:100%')) }}


    {{ $form->text('projectManager','Project Manager','',array('id'=>'project_manager','class'=>'auto_user four','rows'=>'1', 'style'=>'width:100%')) }}

    {{ $form->hidden('projectManagerId','',array('id'=>'user_id')) }}

    {{ $form->text('projectClient','Client','',array('class'=>'four','rows'=>'1', 'style'=>'width:100%')) }}

    {{ $form->select('projectCurrency','Currency',Config::get('parama.currencies'),array('class'=>'one'))}}
    
    {{ $form->text('projectGrossValue','Gross Value','',array('class'=>'four','rows'=>'1', 'style'=>'width:100%')) }}

    {{ $form->text('projectNetValue','Nett Value','',array('class'=>'four','rows'=>'1', 'style'=>'width:100%')) }}

    {{ $form->text('projectTag','Tag','',array('class'=>'tag_keyword four','rows'=>'1', 'style'=>'width:100%')) }}

  </div>
</div>

<div class="row">
  <div class="twelve columns">

  </div>
</div>

<div class="row right">
{{ Form::submit('Save',array('class'=>'button'))}}&nbsp;&nbsp;
{{ Form::reset('Reset',array('class'=>'button'))}}
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