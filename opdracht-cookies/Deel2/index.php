<?php 
	$file = file_get_contents('../files/user.txt');
	$fileArray = explode(',', $file);
	var_dump($fileArray);

	$logged_in = false;
	if(isset($_GET['logout']))
	{
		setcookie('logged_in','',time() - 3600);
		$logged_in = false;
		header('location: index.php');
	}

	if(isset($_COOKIE['logged_in']))
	{
		$message = 'U bent ingelogd';
		$logged_in = true;
	}
	else
	{
		if(isset($_POST['submit']))
		{
			if($fileArray[0] == $_POST['username'] && $fileArray[1] == $_POST['password'])
			{
				if(isset($_POST['remember']))
				{
					setcookie('logged_in',true,time() + 60*60*24*30); // 30 dagen
					header( 'location: index.php' );
				}
				else
				{
					setcookie('logged_in',true);
					header( 'location: index.php' ); 
				}
			}
		}
	}
	
?>
<html>
<head>
	<title>Opdracht Cookies: Deel 2</title>
</head>
<body>
	<h1>Opdracht Cookies: Deel 2</h1>
	<?php if(!$logged_in) :?>
	<h2>Inloggen</h2>
	<form action="index.php" method="POST">
		<ul>
			<li>
				<label for="username">Gebruikersnaam: </label>
				<input id="username" name="username" type="text"><br>
			</li>
			<li>
				<label for="password">Passwoord:</label>
				<input id="password" name="password" type="password">
			</li>
			<li>
				<label for="remember">Onthoud mij:</label>
				<input type="checkbox" name="remember" id="remember">
			</li>
			<input type="submit" name="submit" value="Log In">
		</ul>
	</form>
	<?php else : ?>
	<h2>Dashboard</h2>
	<p><?php echo $message; ?></p>
	<a href="index.php?logout=true">Uitloggen</a>
	<?php endif; ?>
</body>
</html>