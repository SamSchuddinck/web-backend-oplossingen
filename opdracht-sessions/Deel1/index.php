<?php


	session_start();

	if(isset($_SESSION['Registratie']['email']))
	{
		$email = $_SESSION['Registratie']['email'];
	}
	else
	{
		$email = '';
	}

	if(isset($_SESSION['Registratie']['nickname']))
	{
		$nickname = $_SESSION['Registratie']['nickname'];
	}
	else
	{
		$nickname = '';
	}
?>

<!doctype html>
<html>
    <head>
    	<title>Opdracht Sessions: Deel 1</title>
    </head>
    <body>
   		<h1>Opdracht Sessions Deel 1: Registratie</h1>

		<form action="../Deel2/index.php" method="POST">
			
			<ul>
				<li>
					<label for="email">email</label>
					<input type="text" id="email" name="email" value="<?= $email ?>" placeholder="youremail@example.com" <?= ( isset( $_GET['focus'] ) && $_GET['focus'] == "email" ) ? 'autofocus' : '' ?>>
				</li>
				<li>
					<label for="nickname">nickname</label>
					<input type="text" id="nickname" name="nickname" value="<?= $nickname ?>" placeholder="MyNickname" <?= ( isset( $_GET['focus'] ) && $_GET['focus'] == "nickname" ) ? 'autofocus' : '' ?>>
				</li>
			</ul>

			<input type="submit" name="submit">

		</form>

		
    </body>
</html>