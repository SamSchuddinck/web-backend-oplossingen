<?php
	$getal = 2;
	$dag ='';
	switch ($getal) {
		case 1:
			$dag = 'maandag';
			break;
		case 2:
			$dag = 'dinsdag';
			break;
		case 3:
			$dag = 'woensdag';
			break;
		case 4:
			$dag = 'donderdag';
			break;
		case 5:
			$dag = 'vrijdag';
			break;
		case 6:
			$dag = 'zaterdag';
			break;
		case 7:
			$dag = 'zondag';
			break;
		default:
			$dag = 'ongeldige dag!';
			break;
	}
?>
<!doctype html>
<html>
<head>
	<title>Conditional Statements - Deel 1</title>
</head>
<body>
<p>Het getal is <?php echo $getal; ?> dit is dus <?php echo $dag; ?>.</p>
</body>
</html>