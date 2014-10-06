<?php

	$maxTafels		=	10;
	$maxProduct		=	10;

?>
	

<!doctype html>
<html>
    <head>
    	<title>Deel 2</title>
		<style>
			
			.odd
			{
				background-color	:	lightgreen;
			}

		</style>
    </head>
    <body>
    	<table>
			<?php for( $tafel = 0; $tafel < $maxTafels; ++$tafel ):  ?>
				
				<tr>	
					<?php for( $product = 1; $product <= $maxProduct; ++$product ):  ?>
						<td class="<?= ( ( $tafel * $product ) % 2 > 0 ) ? 'odd' : '' ?>"><?= $tafel * $product ?></td>
					<?php endfor ?>
				</tr>
			<?php endfor ?>
		</table>

    </body>
</html>