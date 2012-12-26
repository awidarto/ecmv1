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
						<span>{{$profile['role']}}</span>
					</td>
				</tr>
				<tr>
					<td class="detail-title">Job Title</td>
					<td class="detail-info">{{ $profile['employee_jobtitle'] }}</td>
				</tr>
				<tr>
					<td class="detail-title">Department</td>
					<td class="detail-info">{{ $profile['employee_department'] }}</td>
				</tr>

			</table>
		</div>
	</div>
</div>
@endsection