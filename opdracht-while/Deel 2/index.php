<?php

	$maxTafels		=	10;
	$maxProduct		=	10;

?>
	

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
    	<title>Deel2</title>
		<style>
			
			.odd
			{
				background-color	:	lightgreen;
			}

		</style>
    </head>
    <body>
		
		<h1>Deel2</h1>

		<table>
			<?php 
				$tafel 		= 	0;
			?>
			<?php while( $tafel < $maxTafels ):  ?>
				
				<tr>
					<?php 
						$product = 	1;
					?>
					<?php while( $product <= $maxProduct ):  ?>

						<td class="<?= ( ( $tafel * $product ) % 2 > 0 ) ? '' : 'odd' ?>"><?= $tafel * $product ?></td>
						<?php $product++ ?>
					<?php endwhile ?>
				</tr>

				<?php $tafel++ ?>
			<?php endwhile ?>
		</table>

    </body>
</html>