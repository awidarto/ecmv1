@layout('master')


@section('content')
<div class="tableHeader">
<h3>{{$title}}</h3>
</div>

{{$form->open_for_files('project/edit/'.$doc['_id'],'POST',array('class'=>'custom','id'=>'newdoc'))}}
<div class="row">
  <div class="six columns left">
    <h4>Project Info</h4>
    {{ $form->hidden('id',$doc['_id'])}}

    {{ $form->text('projectNumber','Project Number','',array('class'=>'four','rows'=>'1', 'style'=>'width:100%')) }}

    {{ $form->text('clientPONumber','Client\'s PO / Contract No.req','',array('class'=>'text')) }}

    {{ $form->text('clientName','Client\'s Name.req','',array('class'=>'text')) }}

    {{ $form->textarea('briefScopeDescription','Brief Scope Description.req','',array('class'=>'text')) }}

    {{ $form->textarea('deliveryTerm','Delivery Terms','',array('class'=>'text')) }}

    {{ $form->text('effectiveDate','Effective Date','',array('class'=>'five date')) }}

    {{ $form->text('dueDate','Due Date','',array('class'=>'five date')) }}

    {{ $form->text('projectVendor','Project Vendor','',array('class'=>'auto_user text')) }}

  </div>
  <div class="five columns right">
    <h4>Project Details</h4>


    {{ $form->text('projectPIC','Persons In Charge','',array('id'=>'project_manager','class'=>'tag_initial_inline four','rows'=>'1', 'style'=>'width:100%')) }}

    <div class="row">
      <div class="two columns">
        {{Form::label('contractPriceUSD','Contract Price')}}
      </div>
      <div class="nine columns">
        {{ $form->text('contractPriceUSD','USD','',array('class'=>'four','rows'=>'1', 'style'=>'width:100%')) }}
        {{ $form->text('contractPriceEURO','EURO','',array('class'=>'four','rows'=>'1', 'style'=>'width:100%')) }}
        {{ $form->text('contractPriceIDR','IDR','',array('class'=>'four','rows'=>'1', 'style'=>'width:100%')) }}
      </div>
    </div>

    <div class="row">
      <div class="two columns">
        {{Form::label('equivalentContractPriceUSD','Equivalent Contract Price')}}
      </div>
      <div class="nine columns">
        {{ $form->text('equivalentContractPriceUSD','USD','',array('class'=>'four','rows'=>'1', 'style'=>'width:100%')) }}
      </div>
    </div>

    {{ $form->select('projectStatus','Status',Config::get('parama.projectstatus'))}}

    {{ $form->textarea('projectRemark','Remarks','',array('class'=>'text')) }}


    {{ $form->text('projectApproval','Approved by','',array('class'=>'tag_email four', 'style'=>'width:100%')) }}

    {{ $form->text('projectShare','Shared to','',array('class'=>'tag_email four','style'=>'width:100%')) }}

    {{ $form->select('projectDepartment','Department of Origin',Config::get('parama.department'),array('class'=>'four'))}}

    {{ $form->text('projectLead','Related Opportunity','',array('class'=>'tag_opportunity four','rows'=>'1', 'style'=>'width:100%')) }}

    {{ $form->hidden('oldTag',$doc['oldTag'])}}

    {{ $form->text('projectTag','Tag','',array('class'=>'tag_keyword four','rows'=>'1', 'style'=>'width:100%')) }}

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
  $('select').select2({
    width : 'resolve'
  }
  );

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