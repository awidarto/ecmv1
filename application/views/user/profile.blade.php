@layout('master')


@section('content')

<h3>User Profile</h3>

<ul>
	<li><strong>{{ $profile['fullname'] }}</strong></li>
	<li>Email : {{ $profile['email'] }}</li>
	<li>Username : {{ $profile['username'] }}</li>
	<li>Roles :
		<ul>
			@foreach($profile['role'] as $role)
				<li>{{$role}}</li>
			@endforeach
		</ul>
	</li>
	<li>Access :
		<ul>
			@foreach($profile['access'] as $access)
				<li>{{$access}}</li>
			@endforeach
		</ul>
	</li>
</ul>


@endsection