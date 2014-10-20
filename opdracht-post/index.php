<?php
	
	// Werk altijd met een var_dump van $_GET of $_POST om te debuggen/developen
	// Zo zie je altijd wat er in de $_GET of $_POST array zit en hoef je er niet naar te raden
	//var_dump( $_POST);

	$username	=	'sam.schuddinck@hotmail.be';
	$password 	=	'test123';
	$message	=	'Please Log in';

	if ( isset( $_POST ['submit'] ) )
	{
		if ( $_POST['username'] == $username && $_POST['password'] == $password )
		{
			$message	=	'Welcome';
		}
		else
		{
			$message	=	'Sometinhg went wrong. Please try again!';
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Opdracht post: deel1</title>
</head>
<body class="php-inleiding">

	<h1>Oplossing post: deel1</h1>

	<h2>Log in</h2>

	<p><?php echo $message ?></p>

	<form action="index.php" method="POST">
		
		<ul>
			<li>
				<label for="username">Username:</label>
				<input type="text" name="username" id="username" value="sam.schuddinck@hotmail.be">
			</li>
			<li>
				<label for="password">Pasword:</label>
				<input type="password" name="password" id="password" value="test123">
			</li>
		</ul>

		<input type="submit" name="submit" value="Log in">

	</form>
</body>
</html>