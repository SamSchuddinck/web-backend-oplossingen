<?php
	$fruit = 'kokosnoot';
	$fruitLengte = strlen($fruit);

	$findLetter = 'o';
	$fruitPosO = strpos($fruit,$findLetter);
?>

<!doctype html>
<html>
<head>
	<title>Opdracht String Extra Functions: Deel 1</title>
</head>
<body>
<p>Lengte:<?php echo $fruitLengte; ?></p>
<p>Pos van de <?php echo $findLetter; ?>: <?php echo $fruitPosO; ?> in <?php echo $fruit;?></p>
</body>
</html>