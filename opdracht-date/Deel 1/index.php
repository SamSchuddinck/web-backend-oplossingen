<?php

	$timeStamp	=	mktime( 22, 35, 25, 01, 21, 1904 );

	$date	=	strftime( '%d %B %Y, %H:%M:%S %p', $timeStamp );

?>

<!doctype html>
<html>
    <head>
    	<title>Opdracht Date: deel1</title>
    </head>
    <body>
		<p>De timestamp van 22u 35m 25sec 21 januari 1904 is <?= $timeStamp ?></p>
		<p>De timestamp omgezet naar een datum: <?= $date ?></p>
    </body>
</html>