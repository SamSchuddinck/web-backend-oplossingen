<?php
	$voornaam = 'Sam';
	$naam = 'Schuddinck';
	$volNaam = $voornaam . ' '.$naam;
	$volNaamLengte = strlen($volNaam);
?>
<!doctype html>
<html>
<head>
	<title>Opdracht Concatenate</title>
</head>
<body>
<p><?php echo $volNaam ?></p>
<p><?php echo $volNaamLengte; ?></p>
</body>
</html>