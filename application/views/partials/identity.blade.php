@section('identity')
<ul class="profilenav">

  <li>{{ HTML::link(URL::base(),'',array('class'=>'home has-tip tip-bottom noradius','title'=>'Home'))}}</li>
  <li>{{ HTML::link('user/profile','',array('class'=>'profile has-tip tip-bottom noradius','title'=>'Profile'))}}</li>
  <li>{{ HTML::link('search','',array('class'=>'search has-tip tip-bottom noradius','title'=>'Search'))}}</li>
  <li>{{ HTML::link('content/view/help','',array('class'=>'help has-tip tip-bottom noradius','title'=>'Help'))}}</li>

  
</ul>
<ul class="nav-bar identitiymenu">
	<li class="has-flyout">
		<a class="identitiynamedropdown"  href="#">{{ Auth::user()->fullname }}</a>
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