<?php

	$getallen		=	array();

	for ( $getal = 0; $getal < 100; $getal++ )
	{
		$getallen[]	=	$getal;
	}

	$getallen=	implode( ', ', $getallen );

	/*

	*/

	$getallen2	=	array();
	for ( $getal = 0; $getal < 100; $getal++ )
	{
		if ( $getal % 3 == 0 && $getal > 40 && $getal < 80 )
		{
			$getallen2[]	=	$getal;
		}
	}

	$getallen2	=	implode( ', ', $getallen2 );
?>
	

<!doctype html>
<html>
    <head>
    	<title>Deel1</title>
    </head>
    <body>
		<p>Getallen1: <?= $getallen ?></p>

		<p>Getallen2: <?= $getallen2 ?></p>

    </body>
</html>