@layout('master')


@section('content')

<h4>User Profile</h4>
<div class="row">
	<div class="two columns">
		<img src="http://placehold.it/80x80&text=[img]" />
	</div>
	<div class="ten columns">
		<h5>{{ $profile['fullname'] }}</h5>
		<ul>
			<li><small class="foundicon-right-arrow bullet">&nbsp;</small> Email : {{ $profile['email'] }}</li>
			<li><small class="foundicon-right-arrow bullet">&nbsp;</small> Username : {{ $profile['username'] }}</li>
			<li><small class="foundicon-right-arrow bullet">&nbsp;</small> Roles :
				<ul>
					@foreach($profile['role'] as $role)
						<li>{{$role}}</li>
					@endforeach
				</ul>
			</li>
			<li><small class="foundicon-right-arrow bullet">&nbsp;</small> Access :
				<ul>
					@foreach($profile['access'] as $access)
						<li>{{$access}}</li>
					@endforeach
				</ul>
			</li>
		</ul>
	</div>
</div>
@endsection