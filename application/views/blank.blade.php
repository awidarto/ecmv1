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
  {{ HTML::style('css/foundation.tables.css') }}
  
  {{ HTML::style('css/app.css') }}
  

  <!--[if lt IE 8]>
    {{ HTML::style('css/general_enclosed_foundicons_ie7.css') }}
  <![endif]-->
</head>
<body>
    <div class="row container-content dialog clearfix" id="dialog-container">
        {{ HTML::image('images/logo.png','ipalogo',array('class'=>'logo-header')) }}
        <div id="maincontent" class="twelve columns dialog">
            @yield('content')
        </div>
    </div>

</body>
</html>
