@layout('master')


@section('content')
<div class="tableHeader">
<h3>{{$title}}</h3>
</div>

{{$form->open('user/add','POST',array('class'=>'custom'))}}
<div class="row">
  <div class="six columns left">
    <h4>User Info</h4>
    {{ $form->text('email','Email.req','',array('class'=>'text')) }}
    {{ $form->text('fullname','Full Name.req','',array('class'=>'text')) }}
    {{ $form->text('username','User Name.req','',array('class'=>'text')) }}
    {{ $form->password('pass','Password','',array('class'=>'text')) }}
    {{ $form->password('repass','Repeat Password','',array('class'=>'text')) }}

    <h4>Employee Info</h4>
    {{ $form->text('employee_jobtitle','Job Title','',array('class'=>'text')) }}
    {{ Form::label('Department','department')}}
    {{$form->select('department','',Config::get('parama.department'),null,array('class'=>'four'))}}

  </div>
  <div class="five columns right">
    <h4>Contact Info</h4>
    {{ $form->text('mobile','Mobile Number','',array('class'=>'text')) }}
    {{ $form->text('home','Home Number','',array('class'=>'text')) }}
    {{ $form->textarea('street','Street','',array('class'=>'text')) }}
    {{ $form->text('city','City','',array('class'=>'text')) }}
    {{ $form->text('zip','ZIP','',array('class'=>'text')) }}

  </div>
</div>
  <div class="row">
    <h4>Access Control</h4>
    <div class="row">
      <div class="six columns">
        <h5>Role</h5>
        {{$form->select('role','',Config::get('parama.roles'),null,array('class'=>'four'))}}
      </div>
    </div>
  <div class="row">
    <div class="twelve columns">

      <h5>Permissions</h5>

      <ul>
        @foreach(Config::get('parama.department') as $obj=>$title)
            <li class="three columns">
              {{ Form::label($obj, $title)}}
                <ul>
                  @foreach(Config::get('acl.permissions') as $key=>$perm)
                      <li>
                        {{ $form->checkbox($obj.'_'.$perm, $key,null,false,array('id'=>$obj,'class'=>$perm))}}
                      </li>
                  @endforeach
                </ul>

                <?php
                /*
                {{ $form->checkbox($obj,$title,1)}} 
                <ul>
                  @foreach(Config::get('acl.permissions') as $key=>$perm)
                      <li>
                        {{ $form->checkbox($obj.'_'.$perm, $key,1)}}
                      </li>
                  @endforeach
                </ul>

                */
                ?>
            </li>
        @endforeach
      </ul>

    </div>
  </div>

</div>
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
</script>

@endsection