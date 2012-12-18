@layout('master')


@section('content')
<div class="tableHeader">
<h3>{{$title}}</h3>
</div>

<div class="row">
  {{Form::open('user/add')}}
  <div class="six columns">
    <h4>User Info</h4>
    {{ Form::label('email','E-Mail') }}
    {{ Form::text('email','',array('class'=>'text')) }}

    {{ Form::label('fullname','Full Name') }}
    {{ Form::text('fullname','',array('class'=>'text')) }}

    {{ Form::label('username','Username') }}
    {{ Form::text('username','',array('class'=>'text')) }}

    {{ Form::label('pass','Password') }}
    {{ Form::password('pass',array('class'=>'text')) }}

    {{ Form::label('repass','Repeat Password') }}
    {{ Form::password('repass',array('class'=>'text')) }}

  </div>
  <div class="six columns">
    <h4>Access Info</h4>
    {{ Form::label('role','Roles') }}
    {{ Form::select('role[]', Config::get('parama.parama_roles'),'',array('id'=>'role','multiple'=>'multiple','class'=>'text'))}}
    <br /><br />
    {{ Form::label('access','Access') }}
    {{ Form::select('access', Config::get('parama.parama_access'),'',array('id'=>'access','multiple'=>'multiple','class'=>'text'))}}

  </div>
</div>
<div class="row">
  {{Form::open('user/add')}}
  <div class="six columns">
    <h4>Employee Info</h4>
    {{ Form::label('jobtitle','Job Title') }}
    {{ Form::text('jobtitle','',array('class'=>'text')) }}

    {{ Form::label('department','Department') }}
    {{ Form::text('department','',array('class'=>'text')) }}

  </div>
  <div class="six columns">
    <h4>Vendor / Client Info</h4>
    {{ Form::label('company','Company Name') }}
    {{ Form::text('company','',array('class'=>'text')) }}

    {{ Form::label('companyaddress','Address') }}
    {{ Form::text('companyaddress','',array('class'=>'text')) }}

  </div>
</div>


<div class="row right">
{{ Form::submit('Save',array('class'=>'button'))}}&nbsp;&nbsp;
{{ Form::reset('Reset',array('class'=>'button'))}}
</div>
{{ Form::close() }}

<script type="text/javascript">
   $("select").select2({
      placeholder: "Select a value"
   });
</script>

@endsection