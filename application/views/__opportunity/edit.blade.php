@layout('master')


@section('content')
<div class="tableHeader">
<h3>{{$title}}</h3>
</div>

{{$form->open_for_files('opportunity/edit/'.$doc['_id'],'POST',array('class'=>'custom','id'=>'newdoc'))}}
<div class="row">
  <div class="six columns left">
    <h4>Opportunity Info</h4>
    {{ $form->hidden('id',$doc['_id'])}}

    {{ $form->text('title','Title.req','',array('class'=>'text')) }}

    {{ $form->textarea('description','Description.req','',array('class'=>'text')) }}

    {{ $form->textarea('body','Body','',array('class'=>'text')) }}

    {{ $form->text('opportunityApproval','Approved by','',array('class'=>'tag_email four', 'style'=>'width:100%')) }}

    {{ $form->text('opportunityShare','Shared to','',array('class'=>'tag_email four','style'=>'width:100%')) }}

    {{ $form->select('opportunityDepartment','Department of Origin',Config::get('parama.department'),array('class'=>'four'))}}

    {{ $form->text('opportunityTender','Related Tender','',array('class'=>'tag_tender four','rows'=>'1', 'style'=>'width:100%')) }}

    {{ $form->text('opportunityLead','Related Opportunity','',array('class'=>'tag_opportunity four','rows'=>'1', 'style'=>'width:100%')) }}

  </div>
  <div class="five columns right">
    <h4>Opportunity Details</h4>

    {{ $form->text('startDate','Start Date','',array('class'=>'five date')) }}

    {{ $form->text('estCompleteDate','Estimated Completion Date','',array('class'=>'five date')) }}

    {{ $form->text('opportunityNumber','Project Number','',array('class'=>'four','rows'=>'1', 'style'=>'width:100%')) }}


    {{ $form->text('opportunityManager','Project Manager','',array('id'=>'opportunity_manager','class'=>'auto_user four','rows'=>'1', 'style'=>'width:100%')) }}

    {{ $form->hidden('opportunityManagerId','',array('id'=>'user_id')) }}

    {{ $form->text('opportunityClient','Client','',array('class'=>'four','rows'=>'1', 'style'=>'width:100%')) }}

    {{ $form->select('opportunityCurrency','Currency',Config::get('parama.currencies'),array('class'=>'one'))}}
    
    {{ $form->text('opportunityGrossValue','Gross Value','',array('class'=>'four','rows'=>'1', 'style'=>'width:100%')) }}

    {{ $form->text('opportunityNetValue','Nett Value','',array('class'=>'four','rows'=>'1', 'style'=>'width:100%')) }}

    {{ $form->hidden('oldTag',$doc['oldTag'])}}

    {{ $form->text('opportunityTag','Tag','',array('class'=>'tag_keyword four','rows'=>'1', 'style'=>'width:100%')) }}

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