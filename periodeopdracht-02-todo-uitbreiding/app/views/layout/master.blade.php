<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <title>ToDo App
    	@if(isset($title))
    	  - {{ $title}} 
    	@endif
    </title>
    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/style.css')}}
</head>
<body>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="/">ToDo App</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="<?php echo (isset($title))? ($title == 'Home')? 'active': '' : ''; ?>"><a href="/">Home</a></li>
	        <li class="<?php echo (isset($title))? ($title == 'Registreer')? 'active': '' : '';?>"><a href="/Registreer">Registreer</a></li>
	        @if(Auth::user())
	        	<li class="<?php echo (isset($title))? ($title == 'Todo\'s')? 'active': '' : ''; ?>"><a href="/Todos">ToDo's <span class="badge">{{Auth::user()->todos()->where('done','=',false)->count()}}</span></a></li>
	        @endif
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        @if(!Auth::user())
	        	<li><a href="/Login"><i class="glyphicon glyphicon-log-in"></i> Login</a></li>
	      	@else
	      		<li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
		          	<i class="glyphicon glyphicon-user"></i> {{Auth::user()->username}} <span class="caret"></span>
		          </a>
		          <ul class="dropdown-menu" role="menu">
		             <li><a href="/Todos"><i class="glyphicon glyphicon glyphicon-th-list"></i> Todo's <span class="badge">{{Auth::user()->todos()->where('done',false)->count()}}</span> </a></li>
		            <li><a href="/Logout"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
		          </ul>
		        </li>
	      	@endif
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<div class="container">
		@if(Session::has('success'))
			<div class="row">
				<div class="col-md-12 text-center alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<p><strong>{{ Session::get('success')}}</strong></p>
				</div>
			</div>
		@elseif(Session::has('fail'))
			<div class="row">
				<div class="col-md12 text-center alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<p><strong>{{ Session::get('fail')}}</strong></p>
				</div>
			</div>
		@endif
		@yield('content')
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/base.js"></script>
</body>
</html>