@extends('layout.master')

@section('content')
	<div class="page-header">
  			<h1>ToDo App <small>Door Sam Schuddinck</small></h1>
  			<p>
  				Hier heb je jou lijstje met todo's. Vul het tekstveld todo in en druk op toevoegen om een todo toe te voegen.
  				Bij de reeds aangemaakte todo's kan je dan op het vinkje klikken om deze aan te duiden als done of op het kruisje om deze te verwijderen.
  				Bij de todo's die al gedaan zijn kan je op het pijltje drukken om deze terug in het lijstje van todo's te plaatsen of ook op het kruisje klikken om deze te verwijderen.
  			</p>

	</div>
	<div class="row">
		<div class="col-md-8">
			@if($todos['all']->count() != 0)
				<h2>Todo's <span class="badge">{{ $todos['todo']->count() }}</span></h2>
				@if($todos['todo']->count() != 0)
						@foreach($todos['todo'] as $todo)
							<div class="row">
								<div class="col-md-1">
									<i class ="glyphicon glyphicon-chevron-right"></i>
								</div>
								<div class="col-md-9">
									<p>		
										{{$todo->beschrijving}}
									</p>
								</div>
								<div class="col-md-2">
									<div class="col-md-1">
										<a href="/Todos/Done/{{$todo->id}}" class="green">
											<i class="glyphicon glyphicon-ok"></i>
										</a>
									</div>
									<div class="col-md-1" >
										<a href="/Todos/Delete/{{$todo->id}}" class="red">
											<i class="glyphicon glyphicon-remove"></i>
										</a>
									</div>
								</div>
							</div>
						@endforeach
				@else
					<h3><span class="label label-success">Allright, All Done!</span></h3>
				@endif

				<h2>Done <span class="badge">{{ $todos['done']->count() }}</span></h2>
				@if($todos['done']->count() != 0)
					<ul class="list-group">
						@foreach($todos['done'] as $todo)
							<div class="row">
								<div class="col-md-1">
									<i class ="glyphicon glyphicon-chevron-right"></i>
								</div>
								<div class="col-md-9">
									<p>		
										{{$todo->beschrijving}}
									</p>
								</div>
								<div class="col-md-2">
									<div class="col-md-1">
										<a href="/Todos/Todo/{{$todo->id}}" class="orange">
											<i class="glyphicon glyphicon-repeat"></i>
										</a>
									</div>	
									<div class="col-md-1">
										<a href="/Todos/Delete/{{$todo->id}}" class="red">
											<i class="glyphicon glyphicon-remove"></i>
										</a>
									</div>	
								</div>
							</div>
						@endforeach
					</ul>
				@else
					<h3><span class="label label-danger">Damn, werk aan de winkel!</span></h3>
				@endif

			@else
				<div class="alert alert-info" role="alert">
					<p>
						<strong>Je hebt nog geen todo's toegevoegd!</strong> <br/> 
						Voeg een todo toe door rechts het kleine formuliertje in te vullen en op Toevoegen te klikken.
					</p>
				</div>

			@endif
		</div>
		<div class="col-md-4">
			{{ Form::open(array('action' =>'ToDoController@addToDo'))}}
			@if($errors->any())
				<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					{{ implode('',$errors->all('<li class="error">:message</li>'))}}
				</div>
			@endif
			<div class="form-group">
    			{{ Form::label('beschrijving', 'Beschrijving',array('class' => 'control-label'))}}
    			
      				{{ Form::text('beschrijving','',array('placeholder' => 'ToDo','class' => 'form-control'))}}
    			
  			</div>		 
			 <div class="form-group">
			    
			     	{{ Form::submit('Toevoegen', array('class' => 'btn btn-primary '))}}
			    
			</div>
			<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
			{{ Form::close()}}	
		</div>
	</div>
@stop