@extends('layout.master')
@section('content')
	<div class="row">
		<div class="col-md-12 offset2">
			<h1>Registreer</h1>
			<p>
				Vul onderstaand formulier correct in en druk op de knop registreer!
			</p>
			<div class="alert alert-info" role="alert">
				<p> Vul zeker een correct emailadres in, ons registratie proces gebeurt met email validatie!</p>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			{{ Form::open(array('action' =>'UserController@register','class' => 'form-horizontal'))}}
			@if($errors->any())
				<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					{{ implode('',$errors->all('<li class="error">:message</li>'))}}
				</div>
			@endif
			<div class="form-group">
    			{{ Form::label('username', 'Username',array('class' => 'col-md-2 control-label'))}}
    			<div class="col-md-10">
      				{{ Form::text('username','',array('placeholder' => 'Gebruikersnaam','class' => 'form-control'))}}
    			</div>
  			</div>

  			<div class="form-group">
    			{{ Form::label('fname', 'Voornaam',array('class' => 'col-md-2 control-label'))}} 
    			<div class="col-md-10">
      				{{ Form::text('fname','',array('placeholder' => 'Voornaam','class' => 'form-control'))}}
    			</div>
  			</div>

  			<div class="form-group">
    			{{ Form::label('lname', 'Achternaam',array('class' => 'col-md-2 control-label'))}} 
    			<div class="col-md-10">
      				{{ Form::text('lname','',array('placeholder' => 'Achternaam','class' => 'form-control'))}}
    			</div>
  			</div>

  			<div class="form-group">
    			{{ Form::label('email', 'Email',array('class' => 'col-md-2 control-label'))}} 
    			<div class="col-md-10">
      				{{ Form::email('email','',array('placeholder' => 'Email','class' => 'form-control'))}}
    			</div>
  			</div>

  			<div class="form-group">
    			{{ Form::label('password', 'Wachtwoord',array('class' => 'col-md-2 control-label'))}} 
    			<div class="col-md-10">
      				{{ Form::password('password','',array('placeholder' => 'Wachtwoord','class' => 'form-control'))}}
    			</div>
  			</div>

  			<div class="form-group">
    			{{ Form::label('password_confirmation', 'Herhaal Wachtwoord',array('class' => 'col-md-2 control-label'))}} 
    			<div class="col-md-10">
      				{{ Form::password('password_confirmation','',array('placeholder' => 'Herhaal Wachtwoord','class' => 'form-control'))}}
    			</div>
  			</div>
  			<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
  			<div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			     	{{ Form::submit('Registreer', array('class' => 'btn btn-primary '))}}
					{{ HTML::link('/Registreer','Annuleer',array('class'=>'btn btn-danger'))}}
			    </div>
			</div>
			{{ Form::close()}}			
		</div>
	</div>
 
	
@stop