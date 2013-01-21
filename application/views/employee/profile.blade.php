@layout('master')


@section('content')

<h4>User Profile</h4>
<div class="row">
	<div class="profileContent">
		<div class="two columns">
			{{ getavatar($profile['_id'])}}<br />
			{{ HTML::link('user/picture','Change Photo')}}<br />
			{{ HTML::link('user/pass','Change Password')}}<br />
		</div>
		<div class="ten columns">
			<h5>{{ $profile['fullname'] }}</h5>
			<table class="profile-info">
				<tr>
					<td class="detail-title">Email</td>
					<td class="detail-info">{{ $profile['email'] }}</td>
				</tr>
				<tr>
					<td class="detail-title">Roles</td>
					<td class="detail-info">	
						<span>{{roletitle($profile['role'])}}</span>
					</td>
				</tr>
				<tr>
					<td class="detail-title">Job Title</td>
					<td class="detail-info">{{ $profile['employee_jobtitle'] }}</td>
				</tr>
				<tr>
					<td class="detail-title">Department</td>
					<td class="detail-info">{{ depttitle($profile['department']) }}</td>
				</tr>

			</table>
		</div>
	</div>
</div>
@endsection