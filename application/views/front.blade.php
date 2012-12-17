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
<body class="front">

  <!-- Header and Nav -->
  <header class="row mainheader">
    
      <h1 id="paramanusaLogo">ParamaNusa</h1>
    
  </header>
  <div class="row container-content">
      
      <div id="maincontent" class="three columns clearfix">
          @if (Session::has('notify_success'))
              <div class="row">
                  <span class="success">{{Session::get('notify_success')}}</span>
              </div>
          @endif

          @yield('content')
      </div>
      
  </div>

  <footer class="row">
    
      <hr />
        <p>&copy; Copyright no one at all. Go to town.</p>
    
  </footer>
</body>
</html>
