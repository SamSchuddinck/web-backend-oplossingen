<?php
	$fruit = 'ananas';
	$fruitLengte = strlen($fruit);

	$findLetter = 'a';
	$fruitPosO = strrpos($fruit,$findLetter);
	$fruit = strtoupper($fruit);
?>

<!doctype html>
<html>
<head>
	<title>Opdracht String Extra Functions: Deel 2</title>
</head>
<body>
<p>Lengte:<?php echo $fruitLengte; ?></p>
<p>Pos van de laatste <?php echo $findLetter; ?>: <?php echo $fruitPosO; ?> in <?php echo $fruit;?></p>
</body>
</html>