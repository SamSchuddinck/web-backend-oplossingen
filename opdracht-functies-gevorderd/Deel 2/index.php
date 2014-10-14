<?php

	$pigHealth         =   5;
    $maxThrows     =   8;

    $game        =   array();

    function calculateHit()
    {
        global $pigHealth;
        $dataArray  =   array();

        $hitChance = rand(0,9);

        if($hitChance <= 4 )
        {
            $hit = true;
        }
        else
        {
            $hit = false;
        }

        if($hit)
        {
            $pigHealth --;
            $dataArray['isHit']     =   true;
            $dataArray['message']    =   'Raak! Er zijn nog maar ' . $pigHealth . ' varkens over.'; 
        }
        else
        {
            $dataArray['isHit']     =   false;
            $dataArray['message']    =   'Mis! Nog ' . $pigHealth . ' varkens in het team.';
        }

        return $dataArray;
    }

    function launchAngryBird()
    {
        global $pigHealth;
        global $maxThrows; 
        global $game;

        static $throws = 0;

        if ( $maxThrows > $throws && $pigHealth > 0 )
        {
            $hitResult = calculateHit( );

            $game[]  =   $hitResult['message'];
            $throws++;
            launchAngryBird();

            
        }
        else
        {
            if ( $pigHealth > 0 )
            {
               $game[]   =   'Helaas, je hebt verloren.'; 
            }
            else
            {
                $game[]   =   'Hoera! Hoera! Hoera! Je hebt gewonnen!';
            }
        }
    } 


    launchAngryBird( );

?>
	

<!doctype html>
<html>
    <head>
    	<title>Functies gevorderd Deel 2</title>
    </head>
    <body>
        <ul>
            <?php foreach( $game as $result): ?>
                <li><?= $result ?></li>
            <?php endforeach ?>
        </ul>
    </body>
</html>


