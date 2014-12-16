<?php 
	session_start();
	$redirect = "index.php";
	
	function __autoload( $classname )
	{
		require_once( './classes/'.$classname . '.php' );
	}
	if(!isset($_POST['generatePassword']) || !isset($_POST['register']))
	{
		header( 'location: login.php');
	}
	if(isset($_POST['generatePassword']))
	{
		$_SESSION['register']['email'] = $_POST['email'];
		$_SESSION['register']['password'] = generatePassword(15,true,true,true,true);
		
		header( 'location: ' . $redirect);
	}
	elseif(isset($_POST['register']))
	{
		$email		=	$_POST[ 'email' ];
		$password	=	$_POST[ 'password' ];

		$_SESSION[ 'register' ][ 'email' ]		=	$email;
		$_SESSION[ 'register' ][ 'password' ]	=	$password;

		# Emailvalidatie
		$isEmail	=	filter_var( $email, FILTER_VALIDATE_EMAIL );

		if ( !$isEmail )
		{
			$emailError = new Notification( "error", "Dit is geen geldig e-mailadres. Vul een geldig e-mailadres in." ); 
			
			header('location: ' . $redirect );
		}

		# Paswoordvalidatie
		elseif ( $password == '' )
		{
			new Message( "error", "Dit is geen geldig paswoord. Vul een geldig paswoord in." ); 
			
			header('location: ' . $redirect );
		}
		else
		{

			$connection	=	new PDO( 'mysql:host=localhost;dbname=opdracht-security-login', 'root', 'root' );

			$db = new Database( $connection );

			$userData	=	$db->query( 'SELECT * 
										FROM users 
										WHERE email = :email', 
									array(':email' => $email ) );

			if ( isset( $userData['data'][ 0 ] ) )
			{
				$userExistsError = new Notification( "error", "De gebruiker met het e-mailadres " . $email . "komt reeds voor in onze database." ); 

				header('location: ' . $redirect );
			}
			else
			{

				$newUser	=	User::createNewUser( $connection, $email, $password );
				
				if ( $newUser )
				{
					$registrationSuccess = new Notification("success", "Welkom, u bent vanaf nu geregistreerd in onze app.");
					header('location: dashboard.php');
				}
			}
		}
	}

	function generatePassword($length,$Upper = true,$Lower = true,$Number = false,$Special = false)
	{
		$UpperChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$LowerChars = strtolower($UpperChars);
		$NumberChars = "0123456789";
		$SpecialChars = "+-*/$%@#_";

		$passwordChars = array();

		$generatedPass ='';

		if($Upper)
		{
			$passwordChars['Upper'] = $UpperChars;
		}
		if($Lower)
		{
			$passwordChars['Lower'] = $LowerChars;
		}
		if($Number)
		{
			$passwordChars['Numbers'] = $NumberChars;
		}
		if($Special)
		{
			$passwordChars['Specials'] = $SpecialChars;
		}

		$passLength = 0;

		while($passLength < $length)
		{
			$stringCount = 0;
			foreach ($passwordChars as $value)
			{
				if ($passLength < $length)
				{
				
					$randomChar = rand(0,(strlen($value)-1)); 
					$generatedPass .= $value[$randomChar]; 
					$passLength++; 
				}
				
				$stringCount++; //Tel eentje op zodat de volgende array met karakters geselecteerd kan worden.
			}
		}

		$generatedPass = str_shuffle($generatedPass);

		return $generatedPass;
	}
 ?>