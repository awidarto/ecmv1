@layout('master')


@section('content')
<div class="tableHeader">
<h3>{{$title}}</h3>
</div>

{{$form->open_for_files('project/add','POST',array('class'=>'custom','id'=>'newdoc'))}}
<div class="row">
  <div class="six columns left">
    <h4>Project Info</h4>

<!--
      JOB REGISTER
      YEAR :  2013
      Form No :
NO
JOB NO.
CLIENT'S PO / CONTRACT NO.
CLIENT'S NAME
BRIEF CONTRACT SCOPE DESCRIPTION
DELIVERY TERMS
EFFECTIVE DATE
DUE DATE
CONTRACT PRICE  (US $)  (EURO)  (IDR X 1,000) (US $)
EQUIVALENT CONTRACT PRICE   (US $)
PERSON IN CHARGE
STATUS
REMARKS


-->

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
        {{ $form->select('contractCurrency','Currency',Config::get('parama.currencies'),array('style'=>'width:100%'))}}
      </div>
      <div class="nine columns">
        {{ $form->text('contractPrice','Contract Price','',array('class'=>'four','rows'=>'1', 'style'=>'width:100%')) }}
      </div>
    </div>

    <div class="row">
      <div class="two columns">
        {{ $form->select('equivalentContractCurrency','Currency',Config::get('parama.currencies'),'USD',array('style'=>'width:100%'))}}
      </div>
      <div class="nine columns">
        {{ $form->text('equivalentContractPrice','Equivalent Contract Price','',array('class'=>'four','rows'=>'1', 'style'=>'width:100%')) }}
      </div>
    </div>

    {{ $form->select('projectStatus','Status',Config::get('parama.projectstatus'))}}

    {{ $form->textarea('projectRemark','Remarks','',array('class'=>'text')) }}


    {{ $form->text('projectApproval','Approved by','',array('class'=>'tag_email four', 'style'=>'width:100%')) }}

    {{ $form->text('projectShare','Shared to','',array('class'=>'tag_email four','style'=>'width:100%')) }}

    {{ $form->select('projectDepartment','Department of Origin',Config::get('parama.department'),array('class'=>'four'))}}

    {{ $form->text('projectLead','Related Opportunity','',array('class'=>'tag_opportunity four','rows'=>'1', 'style'=>'width:100%')) }}

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
{{ Form::reset('Reset',array('class'=>'button'))}}
</div>
{{$form->close()}}

<script type="text/javascript">
  $('select').select2({
    width : 'resolve'
  });

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