@layout('dialog')

@section('content')

{{$form->open('','POST',array('class'=>'custom','id'=>'moveForm'))}}

<div class="row">
    <div class="four columns" id="categoryBox">
    {{ $form->text('docCategoryLabel','Folders','',array('class'=>'four','id'=>'docCategoryLabel','rows'=>'1', 'style'=>'width:100%')) }}
    {{ $form->hidden('docCategoryParents','',array('id'=>'docCategoryParents')) }}
    {{ $form->hidden('docCategory','',array('id'=>'docCategory')) }}

        <div id="categoryTree">

        </div>
    </div>
    <div class="eight columns" style="min-height:600px;">

        <fieldset>
          <legend>Reference & Relationships</legend>

          <!-- related project -->
          {{ $form->text('docProject','Related Project Number','',array('id'=>'project_number','class'=>'auto_project_number four','rows'=>'1', 'style'=>'width:100%')) }}

          {{ $form->hidden('docProjectId','',array('id'=>'project_id')) }}

          {{ $form->text('docProjectTitle','Project Name','',array('id'=>'project_title','class'=>'auto_project_name four','rows'=>'1', 'style'=>'width:100%')) }}

          <hr />
          <!-- related tender -->
          {{ $form->text('docTender','Related Tender Number','',array('id'=>'tender_number','class'=>'auto_tender_number four','rows'=>'1', 'style'=>'width:100%')) }}

          {{ $form->hidden('docTenderId','',array('id'=>'tender_id')) }}

          {{ $form->text('docTenderClient','Tender Client','',array('id'=>'tender_client','class'=>'auto_tender_client four','rows'=>'1', 'style'=>'width:100%')) }}

          <hr />
          <!-- related opportunity -->
          {{ $form->text('docOpportunity','Related Opportunity Number','',array('id'=>'opportunity_number','class'=>'auto_opportunity_number four','rows'=>'1', 'style'=>'width:100%')) }}

          {{ $form->hidden('docOpportunityId','',array('id'=>'opportunity_id')) }}

          {{ $form->text('docOpportunityTitle','Opportunity Name','',array('id'=>'opportunity_title','class'=>'auto_opportunity_name four','rows'=>'1', 'style'=>'width:100%')) }}


        </fieldset>
    </div>
    <div class="row">
        <div class="twelve columns" style="text-align:right;">
            <div id="notifier"></div>
            {{ Form::submit('OK',array('class'=>'button','id'=>'doaction'))}}&nbsp;&nbsp;
            {{ Form::button('Cancel',array('class'=>'button','id'=>'docancel'))}}
        </div>
    </div>
    {{ $form->close()}}
</div>

{{ HTML::script('js/jquery.form.js') }}

<script type="text/javascript">
    $(document).ready(function() {

        var options = {
            target:        '#notifier',   // target element(s) to be updated with server response
            beforeSubmit:  preSubmission,  // pre-submit callback
            success:       postSubmission,  // post-submit callback
            url: '{{ URL::to($ajaxpost) }}',
            dataType:  'json'

            // other available options:
            //url:       url         // override for form's 'action' attribute
            //type:      type        // 'get' or 'post', override for form's 'method' attribute
            //dataType:  'json',        // 'xml', 'script', or 'json' (expected server response type)
            //clearForm: true        // clear all form fields after successful submit
            //resetForm: true        // reset the form after successful submit

            // $.ajax options can be used here too, for example:
            //timeout:   3000
        };

        // bind to the form's submit event
        $('#moveForm').submit(function() {
            // inside event callbacks 'this' is the DOM element so we first
            // wrap it in a jQuery object and then invoke ajaxSubmit
            $(this).ajaxSubmit(options);

            // !!! Important !!!
            // always return false to prevent standard browser submit and page navigation
            return false;
        });

        var currentCategory = 'all';

        @if(isset($category))
            var catdata = {{ $category }};
        @else
            var catdata = [
                {"label":"All","id":"all"},
                {"label":"General",
                    "id":"parent",
                    "children":[
                        {"label":"References","id":"references"},
                        {"label":"Correspondences","id":"correspondences"},
                        {"label":"Minutes of Meeting","id":"minutesofmeeting"},
                        {"label":"Progress Report","id":"progressreport"}
                    ]
                },
                {
                    "label":"Indoor Sales",
                    "id":"parent",
                    "children":[
                        {"label":"References","id":"references"},
                        {"label":"Communication",
                            "id":"communication",
                            "children":[
                                {"label":"Letter","id":"letter"},
                                {"label":"Email","id":"email"}
                            ]
                        },
                        {"label":"Minutes of Meeting","id":"minutesofmeeting"},
                        {"label":"Progress Report","id":"progressreport"}
                    ]
                }
            ];

        @endif

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

        var activenode = $('#categoryTree').tree('getNodeById','{{$profile["docCategory"]}}');
        $('#categoryTree').tree('selectNode',activenode);


    });

    function preSubmission(formData, jqForm, options){
        var queryString = $.param(formData);

        // jqForm is a jQuery object encapsulating the form element.  To access the
        // DOM element for the form do this:
        // var formElement = jqForm[0];

        $('#notifier').html('Processing...');

        // here we could return false to prevent the form from being submitted;
        // returning anything other than false will allow the form submit to continue
        return true;

    }

    // post-submit callback
    function postSubmission(responseObj, statusText, xhr, $form)  {
        // for normal html responses, the first argument to the success callback
        // is the XMLHttpRequest object's responseText property

        // if the ajaxSubmit method was passed an Options Object with the dataType
        // property set to 'xml' then the first argument to the success callback
        // is the XMLHttpRequest object's responseXML property

        // if the ajaxSubmit method was passed an Options Object with the dataType
        // property set to 'json' then the first argument to the success callback
        // is the json data object returned by the server
        var data = responseObj;

        if(data.status == 'OK'){
            $('#notifier').html('Moving Document Success');
            //parent.oTable.fnDraw();
            parent.jQuery.fancybox.close();

            //redraw table
            //alert("Item id : " + _id + " deleted");
        }else if(data.status == 'AUTHFAILED'){
            $('#notifier').html('Wrong Password');
            alert('Authentication failed, please check your Password');
        }else if(data.status == 'ALREADY'){
            $('#notifier').html('You have already responded to this request');
        }

    }

    $('#docancel').click(function(){
        parent.jQuery.fancybox.close();
        return false;
    });

</script>

@endsection
