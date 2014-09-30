<?php
	$arrayGetallen = array(1,2,3,4,5);
	$arrayProduct = array_product($arrayGetallen);
	$arrayGetallen2 = array(5,4,3,2,1);
	foreach ($arrayGetallen as $key => $value)
	{
			$arraySom[] = $value + $arrayGetallen2[$key];		
	}
?>
<!doctype html>
<html>
<head>
	<title>Opdracht Arrays Basics</title>
</head>
<body>
	<p>Array product:<?php echo $arrayProduct ?></p>
	<p>Array oneven:<br>
		<ul>
		<?php foreach ($arrayGetallen as $key => $value): ?>
            <?php if($value&1): ?>
            	<li><?php echo $value ?></li>
        	<?php endif ?>
         <?php endforeach ?>
     	</ul>
	</p>
	<p>Array som:
		<ul>
		<?php foreach ($arraySom as $key => $value): ?>
            	<li><?php echo $value ?></li>
         <?php endforeach ?>
		</ul>
	</p>
</body>
</html>