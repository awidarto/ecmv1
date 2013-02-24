@layout('master')


@section('content')
<div class="tableHeader">
<h3>{{$title}}</h3>
</div>

{{$form->open_for_files('opportunity/add','POST',array('class'=>'custom','id'=>'newdoc'))}}
<div class="row">
  <div class="six columns left">
    <h4>Prospective Client</h4>

      {{ $form->hidden('contact_id','',array('id'=>'contact_id'))}}

<!--
Name  : PT. Gunanusa Utama Fabricators
Address :  Jl. Bendungan Hilir Raya No.60, Jakarta Pusat
Phone :  +62215703329
Fax :  +62215703334
E-Mail  : business_dev@gunanusa.co.id
Website : www.gunanusautama.com

Contact Persons
Name  Position  Direct Line Hand Phone  E-Mail

OPPORTUNITY
Project :  TOTAL - South Mahakam Development Phase - 3
Target Scope  :  Supply of All Misc. Manual Valves

-->
    <fieldset>
        <legend>Company</legend>
          {{ $form->text('clientCompany','Company Name.req','',array('class'=>'auto_client_contact text')) }}

          {{ $form->text('clientStreet','Street.req','',array('class'=>'text','id'=>'clientStreet')) }}

          {{ $form->text('clientCity','City.req','',array('class'=>'text','id'=>'clientCity')) }}

          {{ $form->text('clientZIP','ZIP.req','',array('class'=>'text','id'=>'clientZIP')) }}

          {{ $form->text('clientPhone','Phone.req','',array('class'=>'text','id'=>'clientPhone')) }}

          {{ $form->text('clientFax','Fax.req','',array('class'=>'text','id'=>'clientFax')) }}

          {{ $form->text('clientEmail','Business Email.req','',array('class'=>'text','id'=>'clientEmail')) }}

          {{ $form->text('clientWebsite','Website.req','',array('class'=>'text','id'=>'clientWebsite')) }}

          {{ $form->checkbox('saveToContact','Save to Client Database','Yes',false)}}

    </fieldset>

  </div>
  <div class="five columns right">
    <h4>Opportunity Details</h4>

    <div class="row">
      <div class="five columns">
        {{ $form->text('opportunityDate','Date','',array('class'=>'date')) }}
      </div>
      <div class="six columns">
        {{ $form->text('opportunityNumber','Opportunity Number','') }}
      </div>
    </div>



    {{ $form->text('projectName','Project Name','',array('class'=>'text')) }}

    {{ $form->textarea('targetScopeDescription','Target Scope Description.req','',array('class'=>'text')) }}

    {{ $form->text('closingDate','Closing Date','',array('class'=>'five date')) }}

    {{ $form->text('opportunityPIC','Persons In Charge','',array('id'=>'opportunity_manager','class'=>'tag_initial_inline four','rows'=>'1', 'style'=>'width:100%')) }}

    <div class="row">
      <div class="two columns">
        {{ $form->select('estimatedCurrency','Currency',Config::get('parama.currencies'),array('style'=>'width:100%'))}}
      </div>
      <div class="nine columns">
        {{ $form->text('estimatedValue','Estimated Value','',array('class'=>'four','rows'=>'1', 'style'=>'width:100%')) }}
      </div>
    </div>

    <div class="row">
      <div class="two columns">
        {{ $form->select('equivalentEstimatedCurrency','Currency',Config::get('parama.currencies'),'USD',array('style'=>'width:100%'))}}
      </div>
      <div class="nine columns">
        {{ $form->text('equivalentEstimatedValue','Equivalent Estimated Value','',array('class'=>'four','rows'=>'1', 'style'=>'width:100%')) }}
      </div>
    </div>

    {{ $form->select('opportunityStatus','Status',Config::get('parama.opportunitystatus'))}}

    {{ $form->textarea('opportunityRemark','Remarks','',array('class'=>'text')) }}


    {{ $form->text('opportunityApproval','Approved by','',array('class'=>'tag_email four', 'style'=>'width:100%')) }}

    {{ $form->text('opportunityShare','Shared to','',array('class'=>'tag_email four','style'=>'width:100%')) }}

    {{ $form->select('opportunityDepartment','Department of Origin',Config::get('parama.department'),array('class'=>'four'))}}

    {{ $form->text('opportunityTag','Tag','',array('class'=>'tag_keyword four','rows'=>'1', 'style'=>'width:100%')) }}

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