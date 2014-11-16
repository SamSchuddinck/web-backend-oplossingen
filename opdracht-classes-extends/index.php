<?php 
	function __autoload( $className )
	{
		require_once( 'classes/'.$className . '.php' );
	}
	//Animals
	$kermit = new Animal('Kermit','Male',100);
	$dikkie = new Animal('Dikkie','Male',90);
	$flipper = new Animal('Flipper','Female',80);

	$dikkie->changeHealth(-20);

	//Lions
	$simba = new Lion('Simba','Male',100,'Congo Lion');
	$scar = new Lion('Scar','Male',100,'Kenia Lion');

	//Zebra's
	$zeke = new Zebra('Zeke','Male',90,'Quagga');
	$zana = new Zebra('Zana','Female',90,'Selous');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Oplossing Classes Extends</title>
</head>
	<body>
	

		<h1>Instanties van Animal Class</h1>
		
		
		<p><?php echo $kermit->getName() ?> is van het geslacht <?php echo $kermit->getGender() ?> en heeft momenteel <?php echo $kermit->getHealth() ?> levenspunten</p>

		<p><?php echo $dikkie->getName() ?> is van het geslacht <?php echo $dikkie->getgender() ?> en heeft momenteel <?php echo $dikkie->getHealth() ?> levenspunten</p>

		<p><?php echo $flipper->getName() ?> is van het geslacht <?php echo $flipper->getGender() ?> en heeft momenteel <?php echo $flipper->getHealth() ?> levenspunten</p>


	<h1>Specifieke dierenklassen die gebaseerd zijn op de Animal klasse</h1>

	<h2>Leeuwen</h2>

		<p>De speciale move van <?php echo $simba->getName(); ?> (soort: <?php echo $simba->getSpecies() ?>): <?php echo $simba->doSpecialMove(); ?></p>
		<p>De speciale move van <?php echo $scar->getName(); ?> (soort: <?php echo $scar->getSpecies() ?>): <?php echo $scar->doSpecialMove(); ?></p>


	<h2>Zebras</h2>

		<p>De speciale move van <?php echo $zeke->getName(); ?> (soort: <?php echo $zeke->getSpecies() ?>): <?php echo $zeke->doSpecialMove(); ?></p>
		<p>De speciale move van <?php echo $zana->getName(); ?> (soort: <?php echo $zana->getSpecies() ?>): <?php echo $zana->doSpecialMove(); ?></p>


	</body>
</html>