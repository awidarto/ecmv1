<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />
  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>ParamaNusa</title>

  <!-- Included CSS Files -->
  {{ HTML::style('css/foundation.min.css') }}
  {{ HTML::style('css/app.css') }}
  {{ HTML::style('css/jquery-datatables/demo_table.css') }}
  {{ HTML::style('css/general_enclosed_foundicons.css') }}

  {{ HTML::script('js/jquery-1.8.3.min.js') }}
  {{ HTML::script('js/jquery.dataTables.min.js') }}

  <!--[if lt IE 8]>
    {{ HTML::style('css/general_enclosed_foundicons_ie7.css') }}
  <![endif]-->
</head>
<body>

  <!-- Header and Nav -->
  <header class="sixteen columns">
    <h1>ParamaNusa</h1>
  </header>

  <!-- End Header and Nav -->

  <!-- Main Grid Section -->


    <!-- Nav Sidebar -->
    <!-- This is source ordered to be pulled to the left on larger screens -->
@if(Auth::check())
    <nav class="top-bar twelve columns">
      <section>
        <!-- Left Nav Section -->
        <ul class="left">
          <li class="divider"></li>
          <li>{{ HTML::link('opportunity', 'Opportunity' ) }}</li>
          <li>{{ HTML::link('tender', 'Tender' ) }}</li>
          <li>{{ HTML::link('proposal', 'Tech Proposal' ) }}</li>
          <li>{{ HTML::link('techbid', 'Tech Bid' ) }}</li>
          <li>{{ HTML::link('commbid', 'Commercial Bid' ) }}</li>
          <li>{{ HTML::link('contract', 'Contracts' ) }}</li>
          <li>{{ HTML::link('legal', 'Legal Docs' ) }}</li>
          <li>{{ HTML::link('warehouse', 'Warehouse' ) }}</li>
          <li>{{ HTML::link('qc', 'QA / QC' ) }}</li>
          <li>{{ HTML::link('document', 'Document Library' ) }}</li>
          <li class="divider"></li>
          <li>{{ HTML::link('logout', 'Logout') }}</li>
        </ul>
<!--
        <ul class="right">
          <li class="divider"></li>
          <li class="has-dropdown">
            <a href="#">{{ Auth::user()->fullname }}</a>
            <ul class="dropdown">
              <li>{{ HTML::link('passwd', 'Change Password') }}li>
              <li><a href="#">Options</a></li>
            </ul>
          </li>
        </ul>
-->
      </section>
    </nav>
    <div class="row alignleft">
        <div class="two columns">
          <div class="panel">
            <dl class="vertical tabs">
              <dd><a href="#"><i class="foundicon-home sidemenu"></i></a></dd>
              <dd><a href="#"><i class="foundicon-mail sidemenu"></i></a></dd>
              <dd><a href="#"><i class="foundicon-idea sidemenu"></i></a></dd>
              <dd><a href="#"><i class="foundicon-down-arrow sidemenu"></i></a></dd>
              <dd><a href="#"><i class="foundicon-up-arrow sidemenu"></i></a></dd>
              <dd><a href="#"><i class="foundicon-people sidemenu"></i></a></dd>
              <dd><a href="#"><i class="foundicon-search sidemenu"></i></a></dd>
              <dd><a href="#"><i class="foundicon-smiley sidemenu"></i></a></dd>
            </dl>
          </div>
        </div>
        <div class="eleven columns">
            @if (Session::has('notify_success'))
                <div class="row">
                    <span class="success">{{Session::get('notify_success')}}</span>
                </div>
            @endif

            @yield('content')
        </div>
        <aside class="three columns">
            <div class="panel">
              <a href="#"><img src="http://placehold.it/75x100&text=[img]" /></a>
              <h5>Welcome back, {{ Auth::user()->fullname }}</h5>
                <ul class="dropdown">
                  <li>{{ HTML::link('profile', 'My Profile') }}</li>
                  <li>{{ HTML::link('passwd', 'Change Password') }}</li>
                  <li>{{ HTML::link('logout', 'Logout') }}</li>
                </ul>
            </div>
            <div class="panel">
              <h3>Messages</h3>
              <h5>Welcome back, {{ Auth::user()->fullname }}</h5>
            </div>
        </aside>
    </div>
  <!-- End Grid Section -->
@else

  <nav class="top-bar twelve columns">
    <section>
      <!-- Right Nav Section -->
        <ul class="left">
          <li >
              <li>{{ HTML::link('login', 'Login') }}</li>
          </li>
        </ul>
    </section>
  </nav>
    <div class="row center">
        <div class="eight columns">
            @yield('content')
        </div>
    </div>
@endif
  <!-- Footer -->



  <footer class="row">
    <div class="sixteen columns">
      <hr />
        <p>&copy; Copyright no one at all. Go to town.</p>
    </div>
  </footer>
</body>
</html>
