<?php

	$text = file_get_contents( '../text-file.txt' );
	$textChars = str_split($text);
	asort($textChars);
	$teller = array();

	foreach($textChars as $value)
	{
		if(ctype_alpha($value))
		{
			$value = strtolower($value);
			if ( isset ($teller[$value]))
			{
				$teller[$value]++;
			}
			else
			{
				$teller[$value] = 1;
			}
		}	
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Deel 2</title>
	</head>
	<body>
		<p>	Character count: <br>
			<?php var_dump ( $teller) ?>
		</p>
	</body>
</html>