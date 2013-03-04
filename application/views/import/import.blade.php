@layout('master')


@section('content')
<div class="tableHeader">
<h3 class="formHead">{{$title}}</h3>
</div>

{{$form->open_for_files('import/preview/'.$controller,'POST',array('class'=>'custom'))}}

<div class="row">
    <div class="six columns">

        <fieldset>
            <legend>Excel File to Upload</legend>

            {{ $form->file('docupload','Excel File')}}

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
  $('select').select2({
    width : 'resolve'
  });

</script>

@endsection