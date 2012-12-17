@layout('master')


@section('content')

<h4>User Profile</h4>
<div class="row">
	<div class="profileContent">
		<div class="two columns">
			<img src="http://placehold.it/80x80&text=[img]" />
		</div>
		<div class="ten columns">
			<h5>{{ $profile['fullname'] }}</h5>
			<table class="profile-info">
				<tr>
					<td class="detail-title">Email</td>
					<td class="detail-info">{{ $profile['email'] }}</td>
				</tr>
				<tr>
					<td class="detail-title">Username</td>
					<td class="detail-info">{{ $profile['username'] }}</td>
				</tr>
				<tr>
					<td class="detail-title">Roles</td>
					<td class="detail-info">
						
							@foreach($profile['role'] as $role)
							{{$role}}
							@endforeach
						</tr>
					</td>
				</tr>
				<tr>
					<td class="detail-title">Access</td>
					<td class="detail-info">
						
							@foreach($profile['access'] as $access)
							{{$access}}
							@endforeach
						
					</td>
				</tr>

			</table>
			<!--<ul>
				<li><small class="foundicon-right-arrow bullet">&nbsp;</small> Email : </li>
				<li><small class="foundicon-right-arrow bullet">&nbsp;</small> Username : </li>
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
			</ul>-->
		</div>
	</div>
</div>
@endsection