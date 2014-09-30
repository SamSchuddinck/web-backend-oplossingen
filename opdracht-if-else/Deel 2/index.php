<?php
	$seconden = 221108521;

	$minuut = 60;
	$uur = $minuut*60;
	$dag = $uur * 24;
	$maand = $dag *31;
	$jaar = $dag * 365;

	$minuten = floor($seconden / $minuut) ;
	$uren = floor($seconden / $uur);
	$dagen = floor($seconden / $dag);
	$maanden = floor($seconden / $maand);
	$jaren = floor($seconden / $jaar)
?>
<!doctype html>
<html>
<head>
	<title>Opdracht If/Else - Deel 2</title>
</head>
<body>
<p>Aantal seconden: <?php echo $seconden ?> bevat:</p>
<ul>
	<li>Minuten: <?php echo $minuten ?></li>
	<li>Uren: <?php echo $uren ?></li>
	<li>Dagen: <?php echo $dagen ?></li>
	<li>Maanden: <?php echo $maanden ?></li>
	<li>Jaren: <?php echo $jaren ?></li>
</ul>
</body>
</html>