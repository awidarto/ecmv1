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

    {{ $form->hidden('tenderManagerId','',array('id'=>'user_id')) }}

    <div class="row">
      <div class="two columns">
        {{ $form->select('bidCurrency','Currency',Config::get('parama.currencies'),array('style'=>'width:100%'))}}
      </div>
      <div class="nine columns">
        {{ $form->text('bidPrice','Bid Price','',array('class'=>'four','rows'=>'1', 'style'=>'width:100%')) }}
      </div>
    </div>

    <div class="row">
      <div class="two columns">
        {{ $form->select('equivalentBidCurrency','Currency',Config::get('parama.currencies'),'USD',array('style'=>'width:100%'))}}
      </div>
      <div class="nine columns">
        {{ $form->text('equivalentBidPrice','Equivalent Bid Price','',array('class'=>'four','rows'=>'1', 'style'=>'width:100%')) }}
      </div>
    </div>

    {{ $form->select('tenderStatus','Status',Config::get('parama.tenderstatus'))}}

    {{ $form->textarea('tenderRemark','Remarks','',array('class'=>'text')) }}


    {{ $form->text('tenderApproval','Approved by','',array('class'=>'tag_email four', 'style'=>'width:100%')) }}

    {{ $form->text('tenderShare','Shared to','',array('class'=>'tag_email four','style'=>'width:100%')) }}

    {{ $form->select('tenderDepartment','Department of Origin',Config::get('parama.department'),array('class'=>'four'))}}

    {{ $form->text('tenderLead','Related Opportunity','',array('class'=>'tag_opportunity four','rows'=>'1', 'style'=>'width:100%')) }}

    {{ $form->hidden('oldTag',$doc['oldTag'])}}

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