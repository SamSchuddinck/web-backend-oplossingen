<?php

	session_start();
    if ( isset( $_POST[ 'submit' ] ) )
    {
        $_SESSION['Adres']['straat']  =   $_POST[ 'straat' ];
        $_SESSION['Adres']['nummer']  =   $_POST[ 'nummer' ];
        $_SESSION['Adres']['gemeente']  =   $_POST[ 'gemeente' ];
        $_SESSION['Adres']['postcode']  =   $_POST[ 'postcode' ];
    }

    $alleGegevens =  array($_SESSION['Registratie'],$_SESSION['Adres']);

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
    	<title>Opdracht Sessions Deel 3: Overzicht</title>

    </head>
    <body>
        <h1>Opdracht Sessions Deel 3: Adresgegevens</h1>
        <ul>

        <?php foreach( $alleGegevens as $deel => $deelData ):  ?>

            <?php foreach( $deelData as $data => $value ):  ?>
                <li>
                    <?= $data ?>: <?= $value ?>
                    <p><a href="../Deel<?= $deel + 1 ?>/index.php?focus=<?= $data ?>">wijzig</a></p>
                </li>
            <?php endforeach ?>

        <?php endforeach ?>
        
        </ul>

		<a href="../destroy_Session.php">Sessie's verwijderen</a>
    </body>
</html>