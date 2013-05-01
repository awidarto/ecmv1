@layout('noaside')


@section('content')
<div class="tableHeader">
<h3>{{$title}}</h3>
</div>

{{$form->open_for_files('tender/add','POST',array('class'=>'custom','id'=>'newdoc'))}}
<div class="row">
  <div class="six columns left">
    <fieldset>
      <legend>Tender Info</legend>

        {{ $form->text('clientTenderNumber','Client\'s Tender No.req','',array('class'=>'text')) }}

        {{ $form->text('clientName','Client\'s Name.req','',array('class'=>'text')) }}

        {{ $form->textarea('briefScopeDescription','Brief Scope Description.req','',array('class'=>'text')) }}

        {{ $form->textarea('deliveryTerm','Delivery Terms','',array('class'=>'text')) }}

        {{ $form->textarea('tenderSystem','Tender System','',array('class'=>'text')) }}

        {{ $form->text('proposedVendor','Proposed Vendor','',array('class'=>'auto_user text')) }}

    </fieldset>

  </div>
  <div class="six columns right">

    <fieldset>
      <legend>Tender Details</legend>

        <div class="row">
          <div class="five columns">
            {{ $form->select('tenderDepartment','Department of Origin',Config::get('parama.department'),array('class'=>'four'))}}
          </div>
          <div class="six columns">
            {{ $form->text('tenderNumber','Tender Number','') }}
          </div>
        </div>

        <div class="row">
          <div class="six columns">
            {{ $form->text('tenderDate','Date','',array('class'=>'date')) }}
          </div>
          <div class="six columns">
            {{ $form->text('closingDate','Closing Date','',array('class'=>'date')) }}
          </div>
        </div>

        <div class="row">
          <div class="five columns">
            {{ $form->select('tenderStatus','Status',Config::get('parama.tenderstatus'),array('class'=>'four'))}}
          </div>
          <div class="six columns">
            {{ $form->text('tenderLead','Related Opportunity','',array('class'=>'tag_opportunity')) }}
          </div>
        </div>


        {{ $form->text('tenderPIC','Persons In Charge & Assignments','',array('id'=>'tender_manager','class'=>'tag_email four','rows'=>'1')) }}

        {{ $form->textarea('tenderRemark','Remarks','',array('class'=>'text')) }}

        {{ $form->text('tenderTag','Tag','',array('class'=>'tag_keyword four','rows'=>'1', 'style'=>'width:100%')) }}

    </fieldset>

    <fieldset>
      <legend>Tender Values</legend>

        <div class="row">
          <div class="three columns">
            {{Form::label('bidPriceUSD','Bid Price')}}
          </div>
          <div class="eight columns">
            {{ $form->text('bidPriceUSD','USD','') }}
            {{ $form->text('bidPriceEURO','EURO','') }}
            {{ $form->text('bidPriceIDR','IDR','') }}
          </div>
        </div>

        <div class="row">
          <div class="three columns">
            {{Form::label('equivalentBidPriceUSD','Equivalent Bid Price')}}
          </div>
          <div class="eight columns">
            {{ $form->text('equivalentBidPriceUSD','USD','',array('class'=>'four','rows'=>'1', 'style'=>'width:100%')) }}
          </div>
        </div>

    </fieldset>

    <fieldset>
      <legend>Shares</legend>
        {{ $form->text('tenderShare','Shared to','',array('class'=>'tag_email four','style'=>'width:100%')) }}
    </fieldset>

  </div>
</div>

    <?php
      /*
      {{ $form->text('tenderApproval','Approved by','',array('class'=>'tag_email four', 'style'=>'width:100%')) }}
      */
    ?>


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