@layout('master')


@section('content')
<div class="tableHeader">
<h3>{{$title}}</h3>
</div>

{{$form->open_for_files('tender/add','POST',array('class'=>'custom','id'=>'newdoc'))}}
<div class="row">
  <div class="six columns left">
    <h4>Tender Info</h4>

<!--
      TENDER REGISTER
      YEAR :  2013
      Form No :
NO
*DATE
*TENDER NO.
*CLIENT'S TENDER NO.
*CLIENT'S NAME
*BRIEF SCOPE DESCRIPTION
*DELIVERY TERMS
*CLOSING DATE
*TENDER SYSTEM
*BID PRICE     (US $)  (EURO)  (IDR X 1,000)
*EQUIVALENT BID PRICE  (US $)
PROPOSED VENDOR
*PERSON IN CHARGE
STATUS  
*REMARKS

-->
    {{ $form->text('tenderDate','Date','',array('class'=>'five date')) }}

    {{ $form->text('tenderNumber','Tender Number','',array('class'=>'four','rows'=>'1', 'style'=>'width:100%')) }}

    {{ $form->text('clientTenderNumber','Client\'s Tender No.req','',array('class'=>'text')) }}

    {{ $form->text('clientName','Client\'s Name.req','',array('class'=>'text')) }}

    {{ $form->textarea('briefScopeDescription','Brief Scope Description.req','',array('class'=>'text')) }}

    {{ $form->textarea('deliveryTerm','Delivery Terms','',array('class'=>'text')) }}

    {{ $form->textarea('tenderSystem','Tender System','',array('class'=>'text')) }}

    {{ $form->text('proposedVendor','Proposed Vendor','',array('class'=>'auto_user text')) }}

  </div>
  <div class="five columns right">
    <h4>Tender Details</h4>

    {{ $form->text('closingDate','Closing Date','',array('class'=>'five date')) }}

    {{ $form->text('tenderPIC','Persons In Charge','',array('id'=>'tender_manager','class'=>'tag_initial_inline four','rows'=>'1', 'style'=>'width:100%')) }}

    <div class="row">
      <div class="two columns">
        {{Form::label('bidPriceUSD','Bid Price')}}
      </div>
      <div class="nine columns">
        {{ $form->text('bidPriceUSD','USD','',array('class'=>'four','rows'=>'1', 'style'=>'width:100%')) }}
        {{ $form->text('bidPriceEURO','EURO','',array('class'=>'four','rows'=>'1', 'style'=>'width:100%')) }}
        {{ $form->text('bidPriceIDR','IDR','',array('class'=>'four','rows'=>'1', 'style'=>'width:100%')) }}
      </div>
    </div>

    <div class="row">
      <div class="two columns">
        {{Form::label('equivalentBidPriceUSD','Equivalent Bid Price')}}
      </div>
      <div class="nine columns">
        {{ $form->text('equivalentBidPriceUSD','USD','',array('class'=>'four','rows'=>'1', 'style'=>'width:100%')) }}
      </div>
    </div>

    {{ $form->select('tenderStatus','Status',Config::get('parama.tenderstatus'))}}

    {{ $form->textarea('tenderRemark','Remarks','',array('class'=>'text')) }}


    {{ $form->text('tenderApproval','Approved by','',array('class'=>'tag_email four', 'style'=>'width:100%')) }}

    {{ $form->text('tenderShare','Shared to','',array('class'=>'tag_email four','style'=>'width:100%')) }}

    {{ $form->select('tenderDepartment','Department of Origin',Config::get('parama.department'),array('class'=>'four'))}}

    {{ $form->text('tenderLead','Related Opportunity','',array('class'=>'tag_opportunity four','rows'=>'1', 'style'=>'width:100%')) }}

    {{ $form->text('tenderTag','Tag','',array('class'=>'tag_keyword four','rows'=>'1', 'style'=>'width:100%')) }}

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