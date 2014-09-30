<?php
	$getal = 65;
	$msgTientallen ='';
	if($getal / 90 >= 1)
	{
		$msgTientallen = 'tussen 90 en 100';
	}
	elseif($getal / 80 >= 1 && $getal / 90 < 1)
	{
		$msgTientallen = 'tussen 80 en 90';
	}
	elseif ($getal / 70 >= 1 && $getal / 80 < 1) {
		$msgTientallen = 'tussen 70 en 80';
	}
	elseif ($getal / 60 >= 1 && $getal / 70 < 1) {
		$msgTientallen = 'tussen 60 en 70';
	}
	elseif ($getal / 50 >= 1 && $getal / 60 < 1) {
		$msgTientallen = 'tussen 50 en 60';
	}
	elseif ($getal / 40 >= 1 && $getal / 50 < 1) {
		$msgTientallen = 'tussen 40 en 50';
	}
	elseif ($getal / 30 >= 1 && $getal / 40 < 1) {
		$msgTientallen = 'tussen 30 en 40';
	}
	elseif ($getal / 20 >= 1 && $getal / 30 < 1) {
		$msgTientallen = 'tussen 20 en 30';
	}
	elseif ($getal / 10 >= 1 && $getal / 20 < 1) {
		$msgTientallen = 'tussen 10 en 20';
	}
	elseif ($getal / 10 <= 1) {
		$msgTientallen = 'tussen 0 en 10';
	}
	$antwoord = 'Het getal ligt ' . $msgTientallen;
	$omgekeerdAntwoord = '';
	// Antwoord omdraaien
	/*for($i = strlen($antwoord);$i >= 0;$i --)
	{
		$omgekeerdAntwoord .= substr($antwoord, $i, 1);
	}*/
	$omgekeerdAntwoord = strrev($antwoord);
?>
<!doctype html>
<html>
<head>
	<title>Opdracht If/Else-if - Deel 1</title>
</head>
<body>
<p>Het getal is: <?php echo $getal ?>. <?php echo $antwoord ?>-> omgekeerd: <?php echo $omgekeerdAntwoord ?></p>
</body>
</html>