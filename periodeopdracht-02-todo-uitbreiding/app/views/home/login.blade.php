@extends('layout.master')

@section('content')
	<div class="page-header">
  			<h1>Login</h1>
  			<p>Vul je gegevens in en druk op login om in te loggen</p>
	</div>
	<div class="row">
		
		<div class="col-md-8">	
			{{ Form::open(array('action' =>'UserController@login','class' => 'form-horizontal'))}}
			@if($errors->any())
				<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					{{ implode('',$errors->all('<li class="error">:message</li>'))}}
				</div>
			@endif
			<div class="form-group">
    			{{ Form::label('username', 'Username',array('class' => 'col-md-2 control-label'))}}
    			<div class="col-md-10">
      				{{ Form::text('username','',array('placeholder' => 'Gebruikersnaam','class' => 'form-control '))}}
    			</div>
  			</div>
  			<div class="form-group">
    			{{ Form::label('password', 'Wachtwoord',array('class' => 'col-md-2 control-label'))}}
    			<div class="col-md-10">
      				{{ Form::password('password','',array('placeholder' => 'Wachtwoord','class' => 'form-control'))}}
    			</div>
  			</div>
  			<div class="form-group">
	  			{{ Form::label('remember', 'Herinner Mij',array('class' => 'col-md-2 control-label'))}}
	  			<div class="checkbox">
				    <label>
				      {{ Form::checkbox('remember','Herinner Mij',true,array('class' => 'col-md-1'))}}
				    </label>
				 </div>
			</div>
			 
			 <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			     	{{ Form::submit('Log In', array('class' => 'btn btn-primary '))}}
			    </div>
			</div>
			<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
			{{ Form::close()}}	
		</div>
		<div class="col-md-4">
			<h2>Nog geen account?</h2>
			<p>
				Heb je nog geen acount maar wil je er wel graag &eacute;&eacute;n aanmaken?
				Klik dan op onderstaande knop registreren en ga naar de registratie pagina!
			</p>
			<a href="/Registreer" class="btn btn-primary">Registreren</a>
		</div>
		
	</div>
	
@stop