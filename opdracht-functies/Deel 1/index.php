<?php
	$getal1 = 4;
	$getal2 = 5;
	function berekenSom($getal1,$getal2)
	{
		$som = $getal1 + $getal2;
		return $som;
	}	

	function vermenigvuldig($getal1,$getal2)
	{
		$product = $getal1 * $getal2;
		return $product;
	}

	function isEven($getal)
	{
		if($getal % 2 == 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Functies Deel 1</title>
	</head>
	<body>
		<p>	Getallen: <br>
			We gebruiken getallen <?php echo $getal1.' en '.$getal2 ?><br>
			De som: <br>
			<?php echo berekenSom($getal1,$getal2); ?> <br>
			Het product: <br>
			<?php echo vermenigvuldig($getal1,$getal2); ?><br>
			Is het getal <?php echo $getal1 ?> even? <br>
			<?php echo isEven($getal1)? 'ja':'nee'; ?>
		</p>
	</body>
</html>