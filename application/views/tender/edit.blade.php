@layout('master')


@section('content')
<div class="tableHeader">
<h3>{{$title}}</h3>
</div>

{{$form->open_for_files('tender/edit/'.$doc['_id'],'POST',array('class'=>'custom','id'=>'newdoc'))}}
<div class="row">
  <div class="six columns left">
    <h4>Tender Info</h4>
    {{ $form->hidden('id',$doc['_id'])}}

    {{ $form->text('title','Title.req','',array('class'=>'text')) }}

    {{ $form->textarea('description','Description.req','',array('class'=>'text')) }}

    {{ $form->textarea('body','Body','',array('class'=>'text')) }}

    {{ $form->text('tenderApproval','Approved by','',array('class'=>'tag_email four', 'style'=>'width:100%')) }}

    {{ $form->text('tenderShare','Shared to','',array('class'=>'tag_email four','style'=>'width:100%')) }}

    {{ $form->select('tenderDepartment','Department of Origin',Config::get('parama.department'),array('class'=>'four'))}}

    {{ $form->text('tenderTender','Related Tender','',array('class'=>'tag_tender four','rows'=>'1', 'style'=>'width:100%')) }}

    {{ $form->text('tenderLead','Related Opportunity','',array('class'=>'tag_opportunity four','rows'=>'1', 'style'=>'width:100%')) }}

  </div>
  <div class="five columns right">
    <h4>Tender Details</h4>

    {{ $form->text('submitDate','Document Submission Date','',array('class'=>'five date')) }}

    {{ $form->text('prepStartDate','Preparation Start Date','',array('class'=>'five date')) }}

    {{ $form->text('estCompleteDate','Estimated Completion Date','',array('class'=>'five date')) }}

    {{ $form->text('tenderNumber','Tender Number','',array('class'=>'four','rows'=>'1', 'style'=>'width:100%')) }}


    {{ $form->text('tenderManager','Project Manager','',array('id'=>'tender_manager','class'=>'auto_user four','rows'=>'1', 'style'=>'width:100%')) }}

    {{ $form->hidden('tenderManagerId','',array('id'=>'user_id')) }}

    {{ $form->text('tenderClient','Client','',array('class'=>'four','rows'=>'1', 'style'=>'width:100%')) }}

    {{ $form->select('tenderCurrency','Currency',Config::get('parama.currencies'),array('class'=>'one'))}}
    
    {{ $form->text('tenderGrossValue','Gross Value','',array('class'=>'four','rows'=>'1', 'style'=>'width:100%')) }}

    {{ $form->text('tenderNetValue','Nett Value','',array('class'=>'four','rows'=>'1', 'style'=>'width:100%')) }}

    {{ $form->hidden('oldTag',$doc['oldTag'])}}

    {{ $form->text('tenderTag','Tag','',array('class'=>'tag_keyword four','rows'=>'1', 'style'=>'width:100%')) }}

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