<?php 
	session_start();

	function __autoload( $classname )
	{
		require_once( './classes/'.$classname . '.php' );
	}

	$notification	=	Notification::getNotification();
	$email		=	'';
	$password	=	'';

	if(isset($_SESSION['register']))
	{
		$email = $_SESSION['register']['email'];
		$password = $_SESSION['register']['password'];
	}

	if(isset($_COOKIE['authenticated']))
	{
		header('location: dashboard.php');
	}

	
 ?>
<!doctype html>
<html>
<head>
	<title>Opdracht Security Login</title>
	<style>
			.modal
			{
				margin:5px 0px;
				padding:5px;
				border-radius:5px;
			}
			
			.success
			{
				color:#468847;
				background-color:#dff0d8;
				border:1px solid #d6e9c6;
			}
			
			.error
			{
				color:#b94a48;
				background-color:#f2dede;
				border:1px solid #eed3d7;
			}
			
			.error p
			{
				font-style:italic;
			}
			
			.warning
			{
				color:#3a87ad;
				background-color:#d9edf7;
				border:1px solid #bce8f1;
			}

		</style>
</head>
<body>
	<h1>Registreren</h1>
	<?php if ( $notification ): ?>
		<div class="modal <?php echo $notification['type'] ?>">
			<?= $notification['text'] ?>
		</div>
	<?php endif ?>
	<form action="registratie-process.php" method="POST">
		<ul>
			<li>
				<label>email</label>
				<input name="email" type="email" value="<?= $email ?>"/>
			</li>
			<li>
				<label>Passwoord</label>
				<input name="password" type="<?= ( $password != '' ) ? 'text' : 'password' ?>" value="<?= $password ?>"/>
				<input type="submit" name="generatePassword" value="Genereer Passwoord"/>
			</li>
			<li> 
				<input type="submit" name="register" value="Registreer"/>
			</li>
		</ul>
	</form>
</body>
</html>