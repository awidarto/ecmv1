@layout('front')

@section('content')
<div id="login-form">
        {{ Form::open('login') }}
            <!-- check for login errors flash var -->
            @if (Session::has('login_errors'))
                <span class="error">Email or password incorrect.</span>
            @endif
            <!-- username field -->
            <p>{{ Form::label('username', 'Email') }}</p>
            <p>{{ Form::text('username') }}</p>
            <!-- password field -->
            <p>{{ Form::label('password', 'Password') }}</p>
            <p>{{ Form::password('password') }}</p>
            <!-- submit button -->
            <p>{{ Form::submit('Login',array('class' => 'button')) }}</p>
        {{ Form::close() }}
    
</div>

@endsection