<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		{{ HTML::style('css/bootstrap-combined.min.css') }}
		{{ HTML::style('packages/bootstrap/css/bootstrap.css') }}
		{{ HTML::style('css/main.css') }}

  {{HTML::script('js/jquery.js')}}
  {{HTML::style('css/bootstrap.css')}}
  {{HTML::script('js/bootstrap.js')}}



		<style>
			table form { margin-bottom: 0; }
			form ul { margin-left: 0; list-style: none; }
			.error { color: red; font-style: italic; }
			body { padding-top: 60px; }
		</style>
		<title>Indonesia Business Centre</title>


	</head>

	<body>
<div class="navbar navbar-fixed-top">


      <div class="navbar-inner">
      			@if(!Auth::check())
               {{ HTML::link('register', 'Register', array('class','menu')) }}
               {{ HTML::link('login', 'Login') }} 
               <a class="btn" href="{{ URL::to('login')}}">
 					<i class="icon-user"></i> Login
				</a>
            @else
            	Welcome, <strong>{{Auth::user()->username}}</strong> | {{ HTML::link('logout', 'Logout') }}
            @endif
         <div class="container-fluid">
                 <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a> 

          
         
 			<div class="btn-group pull-right">


            </div>
            <div class="nav-collapse">
	            <ul class="nav">
	            	<li> {{ HTML::link('status/dashboard', 'Home', array('class','menu')) }}</li>
					<li>{{ HTML::link('users', 'Members', array('class','menu')) }}</li>
					<li>{{ HTML::link('businesses', 'Businesses',array('class','menu')) }}</li>
            	</ul>
          	</div><!--/.nav-collapse -->
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
		<div class="container">
			<footer>Copyright IBC 2014 info@ibcm.org.au</footer>
		</div>
	</body>

</html>