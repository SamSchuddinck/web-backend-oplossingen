<?php
	$html =   '<html><head><title>HTML Validation</title></head><body>Tekst</body></html>';
	$helden = array('Elon Musk','Sam','Spiderman');

	function drukArrayAf($array)
	{
		$dataArray  =   array();

		/* Naam uit de global array halen */
	    end( $GLOBALS );
	    $naamArray = key( $GLOBALS );

		foreach ($array as $key => $value) {
			$dataArray[] =  $naamArray .'['.$key.']'.' heeft als waarde '.$value;
		}
		return $dataArray;
	}	
	$resultaatDrukArrayAf = drukArrayAf($helden);

	function validatehtmlTag($html)
	{
		$startTag =   '<html>';
        $closeTag =   '</html>';

        $isValid    =   false;

        if ( strpos( $html, $startTag ) === 0 )
        {
            $closeTagPosition = strlen( $html ) - strlen( $closeTag );

            if ( stripos( $html, $closeTag ) == $closeTagPosition )
            {
                $isValid    =   TRUE;
            }
        }

        return $isValid;
	}
	$validHTML  =   validateHtmlTag( $htmlString );
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Functies Deel 2</title>
	</head>
	<body>
		<p>
		Array afdrukken:
		<?php foreach ( $resultaatDrukArrayAf as $value ): ?>
            <li><?= $value ?></li>
        <?php endforeach ?> <br>
        HTML Validation: <br>
        De string <b><?php echo htmlentities($html) ?></b> is <?php echo ( $validHTML )?'':'niet' ?> geldig.
		</p>
	</body>
</html>