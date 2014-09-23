<?php
	$lettertje = 'e';
	$cijfertje = 3;
	$langsteWoord = 'zandzeepsodemineralenwatersteenstralen';
	$langsteWoord = str_replace($lettertje, $cijfertje, $langsteWoord)
?>

<!doctype html>
<html>
<head>
	<title>Opdracht String Extra Functions: Deel 2</title>
</head>
<body>
<p>Vervangen:<?php echo $langsteWoord; ?></p>
</body>
</html>