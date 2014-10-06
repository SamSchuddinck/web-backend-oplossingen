<?php 
	$getallen = array(8, 7, 8, 7, 3, 2, 1, 2, 4);
	$getallen = array_unique($getallen);
	asort($getallen)
 ?>
<html>
<head>
	<title>Deel 3</title>
</head>
<body>
	<p>
	 	<?php var_dump($getallen)?>
	</p>
</body>
</html>