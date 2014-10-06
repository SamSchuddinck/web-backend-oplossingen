<?php

	$text = file_get_contents( '../text-file.txt' );

	$textChars = str_split($text);
	rsort($textChars);
	$charReversed = array_reverse($textChars);

	$teller = array();

	foreach($charReversed as $value)
	{
		if ( isset ($teller[$value]))
		{
			$teller[$value]++;
		}
		else
		{
			$teller[$value] = 1;
		}
		
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Deel 1</title>
	</head>
	<body>

		<p>
			VanZ naar A: <br>
			<?php var_dump ( $textChars ) ?>
		</p>
		<p>	Reversed: <br>
		 	<?php //var_dump ( $characterSortedReversed ) ?>
		</p>
		<p>	Character count: <br>
			<?php var_dump ( $teller) ?>
		</p>
	</body>
</html>