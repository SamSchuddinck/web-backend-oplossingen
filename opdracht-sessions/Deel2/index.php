<?php


    session_start();
    if(isset($_POST['submit']))
    {
        $_SESSION['Registratie']['email']       =   $_POST[ 'email' ];
        $_SESSION['Registratie']['nickname']    =   $_POST[ 'nickname' ];
    }

    $registratieGegevens = $_SESSION['Registratie'];

    $straat      =   ( isset( $_SESSION['Adres']['straat'] ) ) ? $_SESSION[ 'Adres' ][ 'straat'] : '';
    $nummer      =   ( isset( $_SESSION[ 'Adres' ]['nummer'] ) ) ? $_SESSION[ 'Adres' ][ 'nummer'] : '';
    $gemeente      =   ( isset( $_SESSION[ 'Adres' ]['gemeente'] ) ) ? $_SESSION[ 'Adres' ][ 'gemeente'] : '';
    $postcode      =   ( isset( $_SESSION[ 'Adres' ]['postcode'] ) ) ? $_SESSION[ 'Adres' ][ 'postcode'] : '';
?>

<!doctype html>
<html>
    <head>
        <title>Opdracht Sessions: Deel 1</title>
    </head>
    <body>
        <h1>Opdracht Sessions Deel 2: Adresgegevens</h1>
        <ul>
        <?php foreach( $registratieGegevens as $data => $value ):  ?>
            <li><?= $data ?>: <?= $value ?></li>
        <?php endforeach ?>
        </ul>

        <form action="../Deel3/index.php" method="POST">
            
            <ul>
                <li>
                    <label for="straat">straat</label>
                    <input type="text" id="straat" name="straat" value="<?= $straat ?>" placeholder="vul straat in"  <?= ( isset( $_GET['focus'] ) && $_GET['focus'] == "straat" ) ? 'autofocus' : '' ?>>
                </li>
                <li>
                    <label for="nummer">nummer</label>
                    <input type="text" id="nummer" name="nummer" value="<?= $nummer ?>" placeholder="vul nummer in"  <?= ( isset( $_GET['focus'] ) && $_GET['focus'] == "nummer" ) ? 'autofocus' : '' ?>>
                </li>
                <li>
                    <label for="gemeente">gemeente</label>
                    <input type="text" id="gemeente" name="gemeente" value="<?= $gemeente ?>" placeholder="vul gemeente in"  <?= ( isset( $_GET['focus'] ) && $_GET['focus'] == "gemeente" ) ? 'autofocus' : '' ?>>
                </li>
                <li>
                    <label for="postcode">postcode</label>
                    <input type="text" id="postcode" name="postcode" value="<?= $postcode ?>" placeholder="vul postcode in"  <?= ( isset( $_GET['focus'] ) && $_GET['focus'] == "postcode" ) ? 'autofocus' : '' ?>>
                </li>
            </ul>

            <input type="submit" name="submit">

        </form>
        <a href="../destroy_Session.php">Sessie's verwijderen</a>
        
    </body>
</html>