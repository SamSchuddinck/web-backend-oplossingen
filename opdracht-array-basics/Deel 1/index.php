<?php
	$arrayDieren = array('Vis','Hond','Kat','Nijlpaard','Zebra','Giraf','Leeuw','Kanarie','Specht','Slak');
	$arrayDieren2[] = 'Vis';
	$arrayDieren2[] = 'Hond';
	$arrayDieren2[] = 'Kat';
	$arrayDieren2[] = 'Nijlpaard';
	$arrayDieren2[] = 'Zebra';
	$arrayDieren2[] = 'Giraf';
	$arrayDieren2[] = 'Leeuw';
	$arrayDieren2[] = 'Kanarie';
	$arrayDieren2[] = 'Specht';
	$arrayDieren2[] = 'Slak';

	$arrayVoertuigen = array (
		'landvoertuigen' => array('Vespa','Fiets'),
		'watervoertuigen' => array('surfplank','vlot','schoener','diremaster'),
		'luchtvoertuigen' => array('luchtballon','helicopter','B52')
		);
?>
<!doctype html>
<html>
<head>
	<title>Opdracht Arrays Basics</title>
</head>
<body>
	<p>Array dieren:<?php var_dump($arrayDieren) ?></p>
	<p>Array dieren 2:<?php var_dump($arrayDieren2) ?></p>
	<p>Array voertuigen:<?php var_dump($arrayVoertuigen) ?></p>
</body>
</html>