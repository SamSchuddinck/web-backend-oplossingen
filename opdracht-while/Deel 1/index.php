<?php

	$getallen		=	array();

	$getal = 0;

	while ( $getal < 100 )
	{
		$getallen[]	=	$getal;
		$getal ++;
	}

	$getallen	=	implode( ', ', $getallen );

	/* Getallenreeks 2 */

	$getal = 0;

	$getallen2	=	array();

	while ( $getal < 100 )
	{
		if ( $getal % 3 == 0 && $getal > 40 && $getal < 80 )
		{
			$getallen2[]	=	$getal;
		}

		$getal++;
	}

	$getallen2	=	implode( ', ', $getallen2 );
?>
	

<!doctype html>
<html>
    <head>
    	<title>Deel1</title>
    </head>
    <body>
		
		<h1>Oplossing while: deel1</h1>

		<p>Getallen1: <?= $getallen ?></p>

		<p>Getallen2: <?= $getallen2 ?></p>

    </body>
</html>


