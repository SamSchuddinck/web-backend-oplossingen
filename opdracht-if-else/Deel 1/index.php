<?php
	$jaar = 2100;
	$schrikkeljaar = false;
	if($jaar % 400 == 0)
	{
		$schrikkeljaar = true;
	}
	elseif($schrikkeljaar % 100 == 0)
	{
		$schrikkeljaar = false;
	}
	elseif($jaar % 4 == 0)
	{
		$schrikkeljaar = true;
	}
?>
<!doctype html>
<html>
<head>
	<title>Opdracht If/Else - Deel 1</title>
</head>
<body>
<p>Het jaar is: <?php echo $jaar ?> dit is <?php echo ($schrikkeljaar)? 'een':'geen'; ?> schrikkeljaar.</p>
</body>
</html>