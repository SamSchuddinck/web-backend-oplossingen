<?php
	$arrayDieren = array('Vis','Hond','Kat','Nijlpaard','Zebra','Giraf','Leeuw','Kanarie','Specht','Slak');
	$countDieren = array_count_values($arrayDieren);
	$arrayZoogdieren = array('Dolfijn','Aap','Walvis');
	$arrayDierenLijst = array_merge($arrayDieren,$arrayZoogdieren);
	asort($arrayDierenLijst);
?>
<!doctype html>
<html>
<head>
	<title>Opdracht Arrays Basics</title>
</head>
<body>
	<p><?php var_dump($arrayDierenLijst) ?></p>
</body>