<?php

	$startKapitaal = 10000;
	$rentevoet = 0.08;
	$aantalJaar= 10;

	function berekenKapitaal($startKapitaal,$rentevoet,$aantalJaar)
	{
		static $jaar = 1;
		static $message = array();

		$winst = $startKapitaal * $rentevoet;
		$nieuwKapitaal = $startKapitaal + $winst;

		$message[] = 'Na '.$jaar.' jaar bedraagt zijn kapitaal: '.floor($nieuwKapitaal).' met een winst van: '.floor($winst).' voor dat jaar';
		if($jaar < $aantalJaar)
		{
			$jaar ++;			
			return berekenKapitaal($nieuwKapitaal,$rentevoet,$aantalJaar);
		}
		else
		{
			return $message;
		}
	}

	$result = berekenKapitaal($startKapitaal,$rentevoet,$aantalJaar);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Opdracht Recursive</title>
	</head>
	<body>
		<ul>
			<?php foreach($result as $value): ?>
				<li><?php echo $value ?></li>
			<?php endforeach ?>
		</ul>
	</body>
</html>