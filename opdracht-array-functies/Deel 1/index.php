<?php
	$arrayDieren = array('Vis','Hond','Kat','Nijlpaard','Zebra','Giraf','Leeuw','Kanarie','Specht','Slak');
	$countDieren = count($arrayDieren);
	$teZoekenDier = 'Vis';
	$zoekResult = in_array($teZoekenDier, $arrayDieren);
	if($zoekResult)
	{
		$zoekMessage = 'Het dier zit in de array!';
	}
	else
	{
		$zoekMessage = 'Het dier werdt niet gevonden in de array!';
	}
?>
<!doctype html>
<html>
<head>
	<title>Opdracht Arrays Basics</title>
</head>
<body>
	<p>Aantal dieren:<?php echo $countDieren ?></p>
	<p>Te zoeken dier: <?php echo $teZoekenDier ?></p>
	<p><?php echo $zoekMessage?></p>
</body>
</html>