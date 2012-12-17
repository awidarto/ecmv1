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
  {{ HTML::style('css/app.css') }}
  {{ HTML::style('css/general_enclosed_foundicons.css') }}
  {{ HTML::style('css/general_foundicons.css') }}

  {{ HTML::script('js/jquery-1.8.3.min.js') }}
  {{ HTML::script('js/jquery.dataTables.min.js') }}

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
        <div class="two columns mobile">     
          <dl class="vertical tabs">
            <dd><a href="#"><i class="foundicon-home sidemenu"></i> <br/>Home</a></dd>
            <dd><a href="#"><i class="foundicon-mail sidemenu"></i> <br/>Messages</a></dd>
            <dd><a href="#"><i class="foundicon-idea sidemenu"></i> <br/>Projects</a></dd>
            <dd><a href="#"><i class="foundicon-down-arrow sidemenu"></i> <br/>File Download</a></dd>
            <dd><a href="#"><i class="foundicon-up-arrow sidemenu"></i> <br/>File Upload</a></dd>
            <dd><a href="#"><i class="foundicon-people sidemenu"></i> <br/>People</a></dd>
            <dd><a href="#"><i class="foundicon-search sidemenu"></i> <br/>Search</a></dd>
            <dd><a href="#"><i class="foundicon-smiley sidemenu"></i> <br/>Help</a></dd>
          </dl>
          
        </div>
        <div id="maincontent" class="seven columns">
            @if (Session::has('notify_success'))
                <div class="row">
                    <span class="success">{{Session::get('notify_success')}}</span>
                </div>
            @endif

            @yield('content')
        </div>
        <aside class="three columns">

            <div class="panel sidepanel">

                <div class=" row">
                  <div class="eight columns">
                    <p>Logged in as, <strong>{{ Auth::user()->fullname }}</strong>
                      <br/><br/>VIP Information Technology
                      <br/><br/>Last Login: Tuesday, Nov 20 2012
                      <br/>from <i>Office</i>
                    </p>
                    <p>trudjino@paramanusa.co.id
                      <br/><a href="#">Preferences</a> | {{ HTML::link('logout', 'Logout') }}
                    </p>
                  </div>
                  <div class="four columns">
                    <a href="#"><img src="http://placehold.it/80x80&text=[img]" /></a>
                  </div>
                </div>
              
                <!--<ul class="dropdown">
                  <li>{{ HTML::link('profile', 'My Profile') }}</li>
                  <li>{{ HTML::link('passwd', 'Change Password') }}</li>
                  <li>{{ HTML::link('logout', 'Logout') }}</li>
                </ul>-->
            </div>

            <div class="panel sidepanel">
              <h4><span class="foundicon-mail"></span>&nbsp;&nbsp;Messages</h4>
              <!--<p>Welcome back, {{ Auth::user()->fullname }}</p>-->
              <div class="message-list-side">
                <div class="message-list-item">
                  <span class="category-info">e-mail</span><br/>
                  <span class="author-info">from:</span> vendor@vendor.co.id<br/>
                  <span class="author-info">date:</span> Nov 19, 2012 15.30 WIB<br/>
                  <span class="author-info">subject:</span> Quotation 1<br/>
                  <span class="content-info">Dear, Bpk Taufiq ini adalah .... <a href="#">(read more)</a></span>
                </div>

                <div class="message-list-item">
                  <span class="category-info">comments</span><br/>
                  <span class="author-info">from:</span> vendor@vendor.co.id<br/>
                  <span class="author-info">date:</span> Nov 19, 2012 15.30 WIB<br/>
                  <span class="author-info">subject:</span> Quotation 1<br/>
                  <span class="content-info">Dear, Bpk Taufiq ini adalah .... <a href="#">(read more)</a></span>
                </div>

                <div class="message-list-item">
                  <span class="category-info">e-mail</span><br/>
                  <span class="author-info">from:</span> vendor@vendor.co.id<br/>
                  <span class="author-info">date:</span> Nov 19, 2012 15.30 WIB<br/>
                  <span class="author-info">subject:</span> Quotation 1<br/>
                  <span class="content-info">Dear, Bpk Taufiq ini adalah .... <a href="#">(read more)</a></span>
                </div>

              </div>
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
    
      <hr />
        <p>&copy; Copyright no one at all. Go to town.</p>
    
  </footer>
</body>
</html>
