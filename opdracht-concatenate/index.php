<?php
	$voornaam = 'Sam';
	$naam = 'Schuddinck';
	$volNaam = $voornaam . ' '.$naam;
?>
<!doctype html>
<html>
<head>
	<title></title>
</head>
<body>
<p><?php echo $volNaam ?></p>
<p><?php echo strlen($volNaam); ?></p>
</body>
</html>