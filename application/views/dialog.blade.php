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
  {{ HTML::style('css/jqtree.css') }}

  {{ HTML::style('css/jquery.tagsinput.css') }}
  {{ HTML::style('css/select2.css') }}


  {{ HTML::script('js/jquery-1.8.3.min.js') }}
  {{ HTML::script('js/jquery-ui-1.9.2.custom.min.js') }}

  {{ HTML::script('js/jquery.dataTables.min.js') }}

  {{ HTML::script('js/jquery.tagsinput.min.js') }}
  {{ HTML::script('js/jquery.fancybox.js') }}
  {{ HTML::script('js/select2.min.js') }}

  {{ HTML::script('js/jquery.gdocsviewer.js') }}
  {{ HTML::script('js/tree.jquery.js') }}

  <!--[if lt IE 8]>
    {{ HTML::style('css/general_enclosed_foundicons_ie7.css') }}
  <![endif]-->

  <style type="text/css">
        #categoryTree{
            overflow:hidden;
        }

        .jqtree-title{
            font-size: 9pt;
        }

        ul.jqtree_common {
            overflow:visible;
        }

        ul.jqtree-tree .jqtree-toggler {
            left:0;
        }

        ul.jqtree-tree li.jqtree-folder .jqtree-title {
            margin-left: 15px;
            padding:5px;
        }

        ul.jqtree-tree li.jqtree-selected > .jqtree-element,
        ul.jqtree-tree li.jqtree-selected > .jqtree-element:hover{
            background: transparent;
        }

        ul.jqtree-tree li.jqtree-selected > .jqtree-element .jqtree-title,
        ul.jqtree-tree li.jqtree-selected > .jqtree-element .jqtree-title:hover{
            background-color: #97BDD6;
            padding:5px;
        }

        ul.jqtree-tree{
            margin-left: 5px;
        }

  </style>


</head>
<body>
    <div class="row container-content dialog clearfix" id="dialog-container">
        <div id="maincontent" class="twelve columns dialog">
            @yield('content')
        </div>
    </div>

    {{ HTML::script('js/jquery.foundation.forms.js') }}

    <script type="text/javascript">
      base = '{{ URL::base() }}/';
    </script>

    {{ HTML::script('js/pnu.js') }}

</body>

</html>
