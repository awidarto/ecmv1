@layout('master')


@section('content')
<div class="tableHeader">
<h3>{{$title}}</h3>
</div>

{{$form->open_for_files('project/edit/'.$doc['_id'],'POST',array('class'=>'custom','id'=>'newdoc'))}}
<div class="row">
  <div class="six columns left">

    {{ $form->hidden('id',$doc['_id'])}}

    <fieldset>
      <legend>Client Info</legend>

        {{ $form->text('clientName','Client\'s Name.req','',array('class'=>'text')) }}

        {{ $form->text('clientPONumber','Client\'s PO / Contract No.req','',array('class'=>'text')) }}

        {{ $form->textarea('briefScopeDescription','Brief Scope Description.req','',array('class'=>'text')) }}

        {{ $form->textarea('deliveryTerm','Delivery Terms','',array('class'=>'text')) }}

        {{ $form->text('projectVendor','Project Vendor','',array('class'=>'auto_user text')) }}

    </fieldset>

  </div>
  <div class="six columns right">
    <fieldset>
      <legend>Project Details</legend>

        <div class="row">
          <div class="five columns">
            {{ $form->select('projectDepartment','Department of Origin',Config::get('parama.department'))}}
          </div>
          <div class="six columns">
            {{ $form->text('projectNumber','Project Number','') }}
          </div>
        </div>

        <div class="row">
          <div class="six columns">
            {{ $form->text('effectiveDate','Effective Date','',array('class'=>'five date')) }}
          </div>
          <div class="six columns">
            {{ $form->text('dueDate','Due Date','',array('class'=>'five date')) }}
          </div>
        </div>

        <div class="row">
          <div class="five columns">
            {{ $form->select('projectStatus','Status',Config::get('parama.projectstatus'))}}
          </div>
          <div class="six columns">
            {{ $form->text('projectLead','Related Opportunity','',array('class'=>'tag_opportunity four','rows'=>'1', 'style'=>'width:100%')) }}
          </div>
        </div>


        {{ $form->text('projectPIC','Persons In Charge & Assignments','',array('id'=>'project_manager','class'=>'tag_email four','rows'=>'1', 'style'=>'width:100%')) }}


        {{ $form->textarea('projectRemark','Remarks','',array('class'=>'text')) }}

        {{ $form->hidden('oldTag',$doc['oldTag'])}}

        {{ $form->text('projectTag','Tag','',array('class'=>'tag_keyword four','rows'=>'1', 'style'=>'width:100%')) }}

    </fieldset>

    <fieldset>
      <legend>Project Values</legend>

        <div class="row">
          <div class="three columns">
            {{Form::label('contractPriceUSD','Contract Price')}}
          </div>
          <div class="eight columns">
            {{ $form->text('contractPriceUSD','USD','') }}
            {{ $form->text('contractPriceEURO','EURO','') }}
            {{ $form->text('contractPriceIDR','IDR','') }}
          </div>
        </div>

        <div class="row">
          <div class="three columns">
            {{Form::label('equivalentContractPriceUSD','Equivalent Contract Price')}}
          </div>
          <div class="eight columns">
            {{ $form->text('equivalentContractPriceUSD','USD','') }}
          </div>
        </div>

    </fieldset>

    <fieldset>
      <legend>Shares</legend>
        {{ $form->text('projectShare','Shared to','',array('class'=>'tag_email four')) }}
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