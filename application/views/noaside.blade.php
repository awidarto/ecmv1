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
  {{ HTML::style('css/jquery-datatables/demo_table.css') }}
  {{ HTML::style('css/flick/jquery-ui-1.9.2.custom.min.css') }}
  {{ HTML::style('css/app.css') }}
  {{ HTML::style('css/general_enclosed_foundicons.css') }}
  {{ HTML::style('css/general_foundicons.css') }}
  {{ HTML::style('css/select2.css') }}
  {{ HTML::style('css/jquery.fancybox.css') }}
  {{ HTML::style('css/gantt.style.css') }}

  {{ HTML::script('js/jquery-1.8.3.min.js') }}
  {{ HTML::script('js/jquery-ui-1.9.2.custom.min.js') }}
  {{ HTML::script('js/jquery.dataTables.min.js') }}
  {{ HTML::script('js/select2.min.js') }}
  {{ HTML::script('js/jquery.tagsinput.min.js') }}
  {{ HTML::script('js/jquery.fancybox.js') }}
  {{ HTML::script('js/gantt/jquery.fn.gantt.js') }}

  <!--[if lt IE 8]>
    {{ HTML::style('css/general_enclosed_foundicons_ie7.css') }}
  <![endif]-->
</head>
<body>

  <!-- Header and Nav -->
  <header class="row mainheader">
    
      <h1 id="paramanusaLogo">ParamaNusa</h1>
    
  </header>

  <!-- End Header and Nav -->
  <!-- Main Grid Section -->


    <!-- Nav Sidebar -->
    <!-- This is source ordered to be pulled to the left on larger screens -->
@if(Auth::check())
    <nav class="top-bar main-bar">
        <ul class="">
          <!--<li class="divider"></li>-->
          <li>{{ HTML::link('/', 'Doc Type' ) }}</li>
          <li class="divider"></li>
          <li>{{ HTML::link('document/type/opportunity', 'Opportunity' ) }}</li>
          <li>{{ HTML::link('document/type/tender', 'Tender' ) }}</li>
          <li>{{ HTML::link('document/type/proposal', 'Tech Proposal' ) }}</li>
          <li>{{ HTML::link('document/type/techbid', 'Tech Bid' ) }}</li>
          <li>{{ HTML::link('document/type/commbid', 'Commercial Bid' ) }}</li>
          <li>{{ HTML::link('document/type/contract', 'Contracts' ) }}</li>
          <li>{{ HTML::link('document/type/legal', 'Legal Docs' ) }}</li>
          <li>{{ HTML::link('document/type/warehouse', 'Warehouse' ) }}</li>
          <li>{{ HTML::link('document/type/qc', 'QA / QC' ) }}</li>
          <li class="has-dropdown">
            <a href="#">Administration</a>
            <ul class="dropdown">
              <li>{{ HTML::link('document', 'Document Library' ) }}</li>
              <li>{{ HTML::link('users', 'Users Management' ) }}</li>
            </ul>
          </li>
          <li>{{ HTML::link('logout', 'Logout') }}</li>
        </ul>
      
    </nav>
    
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
      
    <div class="row container-content clearfix">
        <div class="one columns mobile">     
          <dl class="vertical tabs">
            <dd><a href="{{ URL::base() }}"><i class="foundicon-home sidemenu"></i> <br/>Home</a></dd>
            <dd><a href="{{ URL::to('message') }}"><i class="foundicon-mail sidemenu"></i> <br/>Messages</a></dd>
            <dd><a href="{{ URL::to('tender') }}"><i class="foundicon-idea sidemenu"></i> <br/>Tender</a></dd>
            <dd><a href="{{ URL::to('project') }}"><i class="foundicon-star sidemenu"></i> <br/>Projects</a></dd>
            <dd><a href="{{ URL::to('qc') }}"><i class="foundicon-checkmark sidemenu"></i> <br/>Quality</a></dd>
            <dd><a href="{{ URL::to('warehouse') }}"><i class="foundicon-cart sidemenu"></i> <br/>Warehouse</a></dd>
            <dd><a href="{{ URL::to('finance') }}"><i class="foundicon-graph sidemenu"></i> <br/>Finance</a></dd>
            <dd><a href="{{ URL::to('hr') }}"><i class="foundicon-people sidemenu"></i> <br/>HRD</a></dd>
            <dd><a href="{{ URL::to('activity/download') }}"><i class="foundicon-down-arrow sidemenu"></i> <br/>Download</a></dd>
            <dd><a href="{{ URL::to('activity/upload') }}"><i class="foundicon-up-arrow sidemenu"></i> <br/>Upload</a></dd>
            <dd><a href="{{ URL::to('user/people') }}"><i class="foundicon-address-book sidemenu"></i> <br/>People</a></dd>
            <dd><a href="{{ URL::to('search') }}"><i class="foundicon-search sidemenu"></i> <br/>Search</a></dd>
            <dd><a href="{{ URL::to('help') }}"><i class="foundicon-smiley sidemenu"></i> <br/>Help</a></dd>
          </dl>
          
        </div>
        <div id="maincontent" class="eleven columns">

            @if (Session::has('notify_success'))
                <div class="row">
                    <span class="success">{{Session::get('notify_success')}}</span>
                </div>
            @endif

            @yield('content')
        </div>
    </div>
  <!-- End Grid Section -->
@else

  <nav class="top-bar twelve columns">
    <section>
      <!-- Right Nav Section -->
        <ul class="left">
          <li>
              <!--<li>{{ HTML::link('login', 'Login') }}</li>-->
              <li><h3 class="loginHeader">Login</h3></li>
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
    
      <hr />
        <p>&copy; Copyright 2012. ParamaNusa.</p>
    
  </footer>
    {{ HTML::script('js/jquery.foundation.forms.js') }}
    <script type="text/javascript">
      base = '{{ URL::base() }}/';
    </script>
    {{ HTML::script('js/pnu.js') }}
    {{ HTML::script('js/pnu_gantt.js') }}

</body>
</html>
