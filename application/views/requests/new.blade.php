@layout('master')


@section('content')
<div class="tableHeader">
<h3>{{$title}}</h3>
</div>

{{$form->open_for_files('requests/submit/','POST',array('class'=>'custom','id'=>'newdoc'))}}
<div class="row">
  <div class="six columns left">
    <fieldset>
      <legend>Document Info & Attachment</legend>
      {{ $form->text('title','Title.req','',array('class'=>'text')) }}

      {{$form->select('docFormat','Original Document Format',Config::get('parama.doc_format'),array('class'=>'four'))}}

      <hr />

      {{ Form::label('access','Access ( Who can see this document )')}}
      <div class="row">
        <div class="four columns left">
          {{ $form->radio('access','Confidential','confidential',true)}} 
        </div>   
        <div class="eight columns right">
          <p>
            <strong>Confidential</strong> document ( default ) can only be seen by its creator and people it was shared with.<br />
          </p>
        </div>   
      </div>

      <div class="row">
        <div class="four columns left">
          {{ $form->radio('access','Departmental','departmental')}} 
        </div>   
        <div class="eight columns right">
          <p>
            <strong>Departmental</strong> document will be able to be seen by creator's peers at the same department. 
          </p>
        </div>   
      </div>

      <div class="row">
        <div class="four columns left">
          {{ $form->radio('access','General','general')}} 
        </div>   
        <div class="eight columns right">
          <p>
            <strong>General</strong> document will be able to be seen by all employees in the company, and listed in General document section. 
          </p>
        </div>   
      </div>

      {{ Form::label('interaction','Interaction ( What can other users do with this document )')}}
      <div class="row">
        <div class="four columns left">
          {{ $form->radio('interaction','Read Only','ro',true)}} 
        </div>   
        <div class="eight columns right">
          <p>
            <strong>Read Only</strong> access ( default ) will make other users can only be able to read / view this document, regardless of their permission set.<br />
          </p>
        </div>   
      </div>

      <div class="row">
        <div class="four columns left">
          {{ $form->radio('interaction','Read & Write','rw')}} 
        </div>   
        <div class="eight columns right">
          <p>
            <strong>Read & Write</strong> access will enable other users to see and interact further ( ie: edit and/or delete ) according to their permission set. 
          </p>
        </div>   
      </div>

      <hr />

      {{ $form->file('docupload','Document File')}}
      <div id="upload-indicator" style="display:none" >Uploading file, please wait.</div>

      <hr />

      {{ $form->text('docTag','Search Keyword','',array('class'=>'tag_keyword four','rows'=>'1', 'style'=>'width:100%')) }}

    </fieldset>

    <fieldset>
      <legend>Effective Dates & Expiration</legend>
      <div class="row">
        <div class="five columns left">
          {{ $form->text('effectiveDate','Effective Date','',array('class'=>'twelve date')) }}
        </div>
        <div class="five columns right">
          {{ $form->text('expiryDate','Expiry Date','',array('class'=>'twelve date')) }}
        </div>
      </div>

      {{ Form::label('alert','Expiration alert')}}
      <div class="row">
        <div class="four columns left">
          {{ $form->radio('alert','Yes','Yes',true)}} 
        </div>   
        <div class="eight columns right">
          {{ $form->radio('alert','No','No')}} 
        </div>   
      </div>
      <div class="row">
        <div class="left">
          {{ Form::label('alertStart','Start alert in')}}
        </div>   
        <div class="one columns left">
          {{ $form->text('alertStart','',Config::get('parama.expiration_alert_days'))}}        
        </div>   
        <div class="alertsuffix">
          {{ Form::label('alertStartSuffix',' days before Expiry Date')}}
        </div>   
      </div>

    </fieldset>

    </fieldset>

    <fieldset>
      <legend>Document Sharing</legend>
      {{ $form->text('docShare','Share This Document to','',array('class'=>'tag_shared four','style'=>'width:100%')) }}
    </fieldset>

    <fieldset>
      <legend>Approval Request</legend>
      {{ $form->checkbox('doRequestApproval','Request for Approval','Yes',false,array('class'=>'check', 'id'=>'doApproval'))}}

      <div id='doApprovalContainer' >
        {{ $form->text('docApprovalRequest','Request Approval From','',array('class'=>'tag_email four','style'=>'width:100%')) }}
      </div>
    </fieldset>

  </div>
  <div class="five columns right">
    <fieldset>
      <legend>Metadata</legend>

      {{ Form::label('docDepartment','Department of Origin : '.depttitle(Auth::user()->department))}}
      {{ $form->hidden('docDepartment',Auth::user()->department)}}

      {{ $form->textarea('docRemarks','Remarks','',array('class'=>'text','placeholder'=>'Put note / remarks here'))}}

    </fieldset>

    <fieldset>
      <legend>Request Submission</legend>

      {{$form->select('docRequestToDepartment','Submit Request to Department',Config::get('parama.department'),array('class'=>'four'))}}

      {{ $form->select('docCategory','Category',Config::get('parama.doc_type'),array('class'=>'four'))}}

      {{ $form->select('docOriginalTemplate','Original Template',$templates,array('class'=>'four'))}}

    </fieldset>

    <fieldset>
      <legend>Reference & Relationships</legend>

      {{ $form->text('docRevisionOf','This Document is Related to / Revision of ( other Document )','',array('class'=>'tag_revision four','rows'=>'1', 'style'=>'width:100%')) }}

      <hr />
    
      <!-- related project -->
      {{ $form->text('docProject','Related Project Number','',array('id'=>'project_number','class'=>'auto_project_number four','rows'=>'1', 'style'=>'width:100%')) }}

      {{ $form->hidden('docProjectId','',array('id'=>'project_id')) }}

      {{ $form->text('docProjectTitle','Project Name','',array('id'=>'project_title','class'=>'auto_project_name four','rows'=>'1', 'style'=>'width:100%')) }}

      <hr />
      <!-- related tender -->
      {{ $form->text('docTender','Related Tender Number','',array('id'=>'tender_number','class'=>'auto_tender_number four','rows'=>'1', 'style'=>'width:100%')) }}

      {{ $form->hidden('docTenderId','',array('id'=>'tender_id')) }}

      {{ $form->text('docTenderTitle','Tender Name','',array('id'=>'tender_title','class'=>'auto_tender_name four','rows'=>'1', 'style'=>'width:100%')) }}

      <hr />
      <!-- related opportunity -->
      {{ $form->text('docOpportunity','Related Opportunity Number','',array('id'=>'opportunity_number','class'=>'auto_opportunity_number four','rows'=>'1', 'style'=>'width:100%')) }}

      {{ $form->hidden('docOpportunityId','',array('id'=>'opportunity_id')) }}

      {{ $form->text('docOpportunityTitle','Opportunity Name','',array('id'=>'opportunity_title','class'=>'auto_opportunity_name four','rows'=>'1', 'style'=>'width:100%')) }}

    </fieldset>

  </div>
</div>
<hr />
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