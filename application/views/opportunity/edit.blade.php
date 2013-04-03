@layout('noaside')


@section('content')
<div class="tableHeader">
<h3>{{$title}}</h3>
</div>

{{$form->open_for_files('opportunity/edit/'.$doc['_id'],'POST',array('class'=>'custom','id'=>'newdoc'))}}
<div class="row">
  <div class="six columns left">
      {{ $form->hidden('id',$doc['_id'])}}
      {{ $form->hidden('contact_id',$doc['contact_id'])}}

    <fieldset>
        <legend>Prospective Client</legend>
          {{ $form->text('clientCompany','Company Name.req','',array('class'=>'auto_client_contact text')) }}

          {{ $form->text('clientStreet','Street.req','',array('class'=>'text','id'=>'clientStreet')) }}

          {{ $form->text('clientCity','City.req','',array('class'=>'text','id'=>'clientCity')) }}

          {{ $form->text('clientZIP','ZIP.req','',array('class'=>'text','id'=>'clientZIP')) }}

          {{ $form->text('clientPhone','Phone.req','',array('class'=>'text','id'=>'clientPhone')) }}

          {{ $form->text('clientFax','Fax.req','',array('class'=>'text','id'=>'clientFax')) }}

          {{ $form->text('clientEmail','Business Email.req','',array('class'=>'text','id'=>'clientEmail')) }}

          {{ $form->text('clientWebsite','Website.req','',array('class'=>'text','id'=>'clientWebsite')) }}

          {{ $form->checkbox('saveToContact','Update Contact in Client Database','Yes',false)}}

    </fieldset>
<?php
/*
    <fieldset>
      <legend>Contact Persons</legend>
      {{ View::make('partials.contacttable')->render() }}
    </fieldset>
*/
?>

  </div>
  <div class="six columns right">
    <fieldset>
        <legend>Opportunity Details</legend>

        <div class="row">
          <div class="five columns">
            {{ $form->select('opportunityDepartment','Department of Origin',Config::get('parama.department'),null)}}
          </div>
          <div class="six columns">
            {{ $form->text('opportunityNumber','Opportunity Number','') }}
          </div>
        </div>

        <div class="row">
          <div class="six columns">
            {{ $form->text('opportunityDate','Opportunity Date','',array('class'=>'date')) }}
          </div>
          <div class="six columns">
            {{ $form->text('closingDate','Closing Date','',array('class'=>'date')) }}
          </div>
        </div>

        <div class="row">
          <div class="five columns">
            {{ $form->select('opportunityStatus','Status',Config::get('parama.opportunitystatus'),null)}}
          </div>
          <div class="six columns">
          </div>
        </div>

        {{ $form->text('projectName','Project Name','',array('class'=>'text')) }}

        {{ $form->textarea('targetScopeDescription','Target Scope Description.req','',array('class'=>'text')) }}

        {{ $form->text('opportunityPIC','Persons In Charge & Assignment','',array('id'=>'opportunity_manager','class'=>'tag_email four','rows'=>'1', 'style'=>'width:100%')) }}

        {{ $form->textarea('opportunityRemark','Remarks','',array('class'=>'text')) }}

        {{ $form->hidden('oldTag',$doc['oldTag'])}}

        {{ $form->text('opportunityTag','Tag','',array('class'=>'tag_keyword four','rows'=>'1', 'style'=>'width:100%')) }}

    </fieldset>


<?php
    /*
    <div class="row">
      <div class="three columns">
        {{ $form->select('estimatedCurrency','Currency',Config::get('parama.currencies'),array('style'=>'width:100%'))}}
      </div>
      <div class="eight columns">
        {{ $form->text('estimatedValue','Estimated Value','',array('class'=>'four','rows'=>'1', 'style'=>'width:100%')) }}
      </div>
    </div>

    <div class="row">
      <div class="three columns">
        {{ $form->select('equivalentEstimatedCurrency','Currency',Config::get('parama.currencies'),'USD',array('style'=>'width:100%'))}}
      </div>
      <div class="eight columns">
        {{ $form->text('equivalentEstimatedValue','Equivalent Estimated Value','',array('class'=>'four','rows'=>'1', 'style'=>'width:100%')) }}
      </div>
    </div>
    {{ $form->text('opportunityApproval','Approved by','',array('class'=>'tag_email four', 'style'=>'width:100%')) }}

    */
?>
    <fieldset>
      <legend>Shares</legend>
        {{ $form->text('opportunityShare','Shared to','',array('class'=>'tag_email four','style'=>'width:100%')) }}
    </fieldset>
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