@layout('master')


@section('content')
<div class="tableHeader">
<h3>{{$title}}</h3>
</div>

{{$form->open_for_files('myhr/edit/'.$doc['_id'],'POST',array('class'=>'custom','id'=>'newdoc'))}}
<div class="row">
  <div class="six columns left">
    {{ $form->hidden('id',$doc['_id'])}}

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
        {{ $form->hidden('oldTag',$doc['oldTag'])}}

      {{ $form->text('docTag','Tag / Keyword','',array('class'=>'tag_keyword four','rows'=>'1', 'style'=>'width:100%')) }}

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
          {{ $form->radio('alert','Yes','Yes')}}
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

    <fieldset>
      <legend>Document Sharing</legend>
      {{ $form->hidden('oldShare','')}}
      {{ $form->textarea('docShare','Share This Document to','',array('class'=>'tag_shared four','style'=>'width:100%')) }}
    </fieldset>

    <fieldset>
      <legend>Approval Request</legend>
      {{ $form->checkbox('doRequestApproval','Request for Approval','Yes',false,array('class'=>'check', 'id'=>'doApproval'))}}

      <div id='doApprovalContainer' >
        {{ $form->textarea('docApprovalRequest','Request Approval From','',array('class'=>'tag_email four','style'=>'width:100%')) }}
      </div>
    </fieldset>


  </div>
  <div class="five columns right">
    <fieldset>
      <legend>Filing System</legend>
      @if(is_null($type) || Auth::user()->role == 'root' || Auth::user()->role == 'super' || Auth::user()->role == 'bod' || Auth::user()->role == 'president_director')
        {{$form->select('docDepartment','Department of Origin',Config::get('parama.department'),array('class'=>'four'))}}
      @else
        {{ Form::label('docDepartment','Department of Origin : '.depttitle($type))}}
        {{ $form->hidden('docDepartment',$type)}}
      @endif
      {{ $form->text('docCategoryLabel','Folders','',array('class'=>'four','id'=>'docCategoryLabel','rows'=>'1', 'style'=>'width:100%')) }}
      {{ $form->hidden('docCategoryParents','',array('id'=>'docCategoryParents')) }}
      {{ $form->hidden('docCategory','',array('id'=>'docCategory')) }}
      <div class="twelve columns" id="categoryBox">
        <div id="categoryTree">

        </div>
      </div>


      {{ $form->select('docOriginalTemplate','Original Template',$templates,array('class'=>'four'))}}

      {{ $form->textarea('docRemarks','Remarks','',array('class'=>'text','placeholder'=>'Put note / remarks here'))}}

    </fieldset>


    <fieldset>
      <legend>Reference & Relationships</legend>

      {{ $form->text('docRevisionOf','This Document is Related to / Revision of ( other Document )','',array('class'=>'tag_revision four','rows'=>'1', 'style'=>'width:100%')) }}

      <hr />

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

    <!-- related project -->
    @if(Auth::user()->permissions->template->create == 1)
    <fieldset>
      <legend>Downloadable Template</legend>
      {{ $form->checkbox('useAsTemplate','Use as Downloadable Template','Yes',false)}}

      {{ $form->text('templateName','Template Name','',array('id'=>'template_name','class'=>'four', 'style'=>'width:100%')) }}

      {{ $form->text('templateNumberStart','Numbering Start','1',array('class'=>'two')) }}
    </fieldset>
    @endif
  </div>
</div>
<hr />
<div class="row right">
{{ Form::submit('Save',array('class'=>'button'))}}&nbsp;&nbsp;
<a class="button" href="javascript:window.history.back();">Cancel</a>
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

  var currentCategory = 'all';
  var catdata = {{$category}};

  $('#categoryTree').tree(
    {
      data:catdata,
      autoOpen:false
    }
  );

  $('#categoryTree').bind(
      'tree.click',
      function(event) {
          // The clicked node is 'event.node'
          var node = event.node;
          currentCategory = node.id;
          console.log(node);
          if( node.id != 'parent'){
            $('#docCategory').val(currentCategory);
            $('#docCategoryLabel').val(node.name);
            $('#docCategoryParents').val(node.parents);
          }
      }
  );




</script>

@endsection