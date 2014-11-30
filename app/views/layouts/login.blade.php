<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        
        {{ HTML::style('css/bootstrap-combined.min.css') }}
{{ HTML::style('packages/bootstrap/css/bootstrap.min.css') }}
        {{ HTML::style('css/main.css') }}
        <style>
            table form { margin-bottom: 0; }
            form ul { margin-left: 0; list-style: none; }
            .error { color: red; font-style: italic; }
            body { padding-top: 30px; }
        </style>
        <title>Indonesia Business Centre</title>
    </head>

    <body>
<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
         <div class="container">
            <ul class="nav"></ul>  
         </div>

      </div>

   </div> 
        <div class="container">
            @if (Session::has('message'))
                <div class="flash alert">
                    <p>{{ Session::get('message') }}</p>
                </div>
            @endif

            @yield('main')
        </div>

    </body>

</html>