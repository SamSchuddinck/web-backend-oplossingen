<?php
	$md5HashKey = 'd1fa402db91a7a93c4f414b8278ce073';
	$char = '8';

	function countChar1($haystack, $char)
	{
		$haystackLength = strlen($haystack);
		$countChar = substr_count ($haystack, $char);
		$charProcent = ( $countChar / $haystackLength ) * 100;
		return $charProcent;
	}

	function countChar2($char)
	{
		global $md5HashKey;

		$haystack = $md5HashKey;

		$haystackLength =  strlen( $haystack );

		$countChar = substr_count ( $haystack, $char);

		$charProcent = ( $countChar / $haystackLength ) * 100;

		return $charProcent;
	}
	function countChar3($char)
	{
		$haystack = $GLOBALS['md5HashKey'];

		$haystackLength =  strlen($haystack);

		$countChar = substr_count ( $haystack, $char );

		$charProcent = ( $countChar / $haystackLength ) * 100;

		return $charProcent;
	}

	$resultCountChar1 = countChar1($md5HashKey,$char);
	$resultCountChar2 = countChar2($char);
	$resultCountChar3 = countChar3($char);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Functies gevorderd Deel 1</title>
	</head>
	<body>
		<p>
		Eerste methode: Het karakter <?php echo $char ?> komt <?php echo $resultCountChar1 ?>% voor in <?php echo $md5HashKey ?> <br>
		Tweede methode: Het karakter <?php echo $char ?> komt <?php echo$resultCountChar2 ?>% voor in <?php echo $md5HashKey ?> <br>
		Derde methode: Het karakter <?php echo $char ?> komt <?php echo $resultCountChar3 ?>% voor in <?php echo $md5HashKey ?> <br>
		</p>
	</body>
</html>