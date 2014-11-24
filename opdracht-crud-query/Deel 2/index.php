<?php


	$melding	=	false;

	$brouwer	=	false;

	try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '' );


		$brouwerQuery =	'SELECT brnaam, brouwernr
							FROM brouwers';

		$brouwersStatement = $db->prepare( $brouwerQuery);

		$brouwersStatement->execute();

		$brouwers =	array();

		while ( $row = $brouwersStatement->fetch( PDO::FETCH_ASSOC ) )
		{
			$brouwers[] = $row;
		}

		if ( isset( $_GET[ 'brouwernr' ] ) )
		{
			$brouwer	=	$_GET[ 'brouwernr' ];

			$bierenQuery	=	'SELECT bieren.naam
									FROM bieren 
									WHERE bieren.brouwernr = :brouwernr';

			$bierenStatement = $db->prepare($bierenQuery);

			$bierenStatement->bindParam( ':brouwernr', $_GET['brouwernr'] );

		}
		else
		{
			$bierenQuery	=	'SELECT bieren.naam
										FROM bieren';

			$bierenStatement = $db->prepare($bierenQuery);
		}

		$bierenStatement->execute();


		$bierenHeader	=	array();
		$bierenHeader[]	=	'Aantal';

		for ($kolomNummer = 0; $kolomNummer  < $bierenStatement->columnCount( );  ++$kolomNummer) 
		{ 
			$bierenHeader[] = $bierenStatement->getColumnMeta($kolomNummer)['name'];
		}

		$bieren	= array();

		while( $row = $bierenStatement->fetch( PDO::FETCH_ASSOC ) )
		{
			$bieren[] =	$row['naam'];
		}

	}
	catch ( PDOException $e )
	{
		$message['type'] =	'error';
		$message['text'] =	'De connectie is mislukt.';
	}

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Opdracht CRUD - Query 2</title>
		<style>
			.modal
			{
				padding			:	6px;
				border-radius	:	3px;
			}
			.success
			{
				background-color:green;
			}
			.error
			{
				background-color:red;
			}
			table tr:nth-child(even)
			{
				background-color:grey;
			}
		</style>
	</head>
<body>


	<?php if ( $melding ): ?>
		<div class="modal <?= $melding[ "type" ] ?>">
			<?= $melding['text'] ?>
		</div>
	<?php endif ?>

	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="GET">
		
		<select name="brouwernr">
			<?php foreach ($brouwers as $key => $brouwer): ?>
				<option value="<?= $brouwer['brouwernr'] ?>" <?= ( $brouwer === $brouwer['brouwernr'] ) ? 'selected' : '' ?>><?= $brouwer['brnaam'] ?></option>
			<?php endforeach ?>
		</select>
		<input type="submit" value="Geef mij alle bieren van deze brouwerij">
	</form>
	

	<table>
		
		

		<thead>
			<tr>
				<?php foreach ($bierenHeader as $kolomNaam): ?>
					<th><?= $kolomNaam ?></th>
				<?php endforeach ?>
			</tr>
		</thead>

		<tbody>
		
			<?php foreach ($bieren as $key => $bierNaam): ?>
				<tr>
					<td><?= ( $key + 1 ) ?></td>
					<td><?= $bierNaam ?></td>
				</tr>
			<?php endforeach ?>

		</tbody>

	</table>

</body>
</html>