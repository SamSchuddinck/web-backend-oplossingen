<?php

	session_start();

	function __autoload( $classname )
	{
		require_once( './classes/'.$classname . '.php' );
	}

	$loginFormName	=	"login.php";
	if(!isset($_POST['submit']))
	{
		header( 'location:' .$loginFormName);
	}
	if ( isset( $_POST[ 'submit' ] ) )
	{

		$email		=	$_POST[ 'email' ];
		$password	=	$_POST[ 'password' ];

		$_SESSION[ 'login' ][ 'email' ]		=	$email;
		$_SESSION[ 'login' ][ 'password' ]	=	$password;

		# Emailvalidatie
		$isEmail	=	filter_var( $email, FILTER_VALIDATE_EMAIL );

		if ( !$isEmail )
		{
			$emailError = new Notification( "error", "Dit is geen geldig e-mailadres. Vul een geldig e-mailadres in." ); 
			
			header('location: ' . $loginFormName );
		}

		# Paswoordvalidatie
		elseif ( $password == '' )
		{
			new Notification( "error", "Dit is geen geldig paswoord. Vul een geldig paswoord in." ); 
			
			header('location: ' . $loginFormName );
		}

		else
		{
			$connection	=	new PDO( 'mysql:host=localhost;dbname=opdracht-security-login', 'root', 'root' );

			$db = new Database( $connection );

			$userData	=	$db->query( 'SELECT * 
										FROM users 
										WHERE email = :email', 
									array(':email' => $email ) );

			if( isset( $userData['data'][0] ) )
			{
				var_dump( $_POST );
				var_dump( $userData['data'][0] );
				# Controle of het paswoord correct is of niet
				$salt 		= 	$userData['data'][0]['salt'];
				$passwordDb = 	$userData['data'][0]['hashed_password'];

				$newlyHashedPassword = hash( 'sha512', $salt . $password);

				var_dump( $newlyHashedPassword );

				if ($newlyHashedPassword == $passwordDb)
				{
					$loginUser	=	User::createCookie( $salt, $email );

					if ( $loginUser )
					{
						$registrationSuccess = new Notification("success", "Welkom, u bent ingelogd.");
						header('location: dashboard.php');
					}
				}
				else
				{
					$userExistsMessage	=	new Notification('error', 'U kon niet ingelogd worden. Probeer opnieuw.');
					header('location: ' . $loginFormName );
				}
			}
			else
			{
				$userExistsMessage	=	new Notification('error', 'Deze gebruiker komt niet voor in de database. Klopt het e-mailadres wel?');
				header('location: ' . $loginFormName );
			}
		}
	}
?>