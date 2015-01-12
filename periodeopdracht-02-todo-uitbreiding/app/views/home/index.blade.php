@extends('layout.master')

@section('content')
	<div class="row">
		<div class="col-md-4">
			<h1>ToDo App</h1>
			<p>
				Dit is de todo app door Sam Schuddinck. Dit is een opdracht voor het vak Web Backend aan Karel De Grote Hogeschool.
				Het principe is simpel het is een applcatie waarmee je dingen die je nog moet doen kan toevoegen aan een lijstje.
				Waaneer je deze zaken gedaan hebt kan je ze afvinken. Deze applicatie werkt met een log-in systeem zodat je lijstje opgeslagen blijft.
				Hiervoor moet je dus eerst registreren pas dan kan je aan de slag nadat je je hebt ingelogd.
			</p>
		</div>
		<div class="col-md-4">
		  <h2>Inloggen</h2>
		  <p>
		  	Als je al een account hebt log je dan in op de login pagina:
		  </p>
		  <p><a class="btn btn-primary btn-lg" href="/Login" role="button">Inloggen</a></p>
		</div>
		<div class="col-md-4">
		  <h2>Ben je nieuw ?</h2>
		  <p>
		  	Ben je nieuw op deze applicatie en heb je je nog niet geregistreerd?
		  	Registreer je dan snel door op onderstaande knop te drukken!
		  </p>
		  <p><a class="btn btn-primary btn-lg" href="/Registreer" role="button">Registreer</a></p>
		</div>
	</div>
	@if(Auth::user())
		<div class="row">
			<div class="col-md-12">
				<h2>Ga aan de slag!</h2>
				<p>
					Nu dat je bent ingelogd kan je jou eigen todo lijstje aanmaken en beheren. <br/>Ga naar de pagina Todo's om aan de slag te gaan!
				</p>
				<a href="/Todos" class="btn btn-primary">Todo's</a>
			</div>
		</div>
	@endif
@stop