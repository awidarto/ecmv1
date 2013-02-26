@section('identity')
<ul class="nav-bar identitiymenu">
	<li class="has-flyout">
		<a href="#">{{ Auth::user()->fullname }}</a>
    	<a href="#" class="flyout-toggle"><span> </span></a>
		<div class="flyout large right">
			<div class=" row">
			  <div class="two columns">
			    <a href="#">{{getavatar(Auth::user()->id,Auth::user()->fullname,'twelve')}}</a>
			  </div>
			  <div class="ten columns left">
			    <p>Logged in as, <strong>{{ Auth::user()->fullname }}</strong>
			      	<br/>{{ (isset(Auth::user()->employee_jobtitle))?Auth::user()->employee_jobtitle:'no title' }} , {{Auth::user()->email}}
			      	<?php
			      		$roles = Config::get('parama.roles');
			      		$role = $roles[Auth::user()->role];
			      	?>
			      	<br/>Role : {{ $role }}
			      	<br/>Last Login: Tuesday, Nov 20 2012
			      	<br/><a href="{{URL::to('user/profile')}}">Profile</a> 
			      	| {{ HTML::link('logout', 'Logout') }}
			    </p>
			  </div>
			</div>
		</div>
	</li>
</ul>
@endsection