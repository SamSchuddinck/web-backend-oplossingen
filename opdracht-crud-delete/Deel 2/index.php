<?php


	$melding	=	false;
	$deleteConfirm = false;
	$deleteId = false;
	try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root' ); // Connectie maken

		if(isset($_POST['delete_confirm']))
		{
			$deleteConfirm = true;
			$deleteId = $_POST['delete_confirm'];
		}
		if ( isset( $_POST['delete'] ) )
		{
			$deleteQuery = 'DELETE FROM brouwers WHERE brouwernr = :brouwernr';

			$deleteStatement = $db->prepare($deleteQuery);
			$deleteStatement->bindParam(':brouwernr', $_POST['delete']);

			$querySuccess = $deleteStatement->execute();
			
			if($querySuccess)
			{
				$melding['type'] = 'success';
				$melding['text'] = 'De datarij werd goed verwijderd.';
			}
			else
			{
				$meldng['type'] = 'error';
				$melding['text'] = 'De datarij kon niet verwijderd worden. Probeer opnieuw.';
			}
		}

		$brouwersQuery = 'SELECT * FROM brouwers';

		$brouwerStatement = $db->prepare($brouwersQuery);
		$brouwerStatement->execute();

		//Veldnamen ophalen
		$brouwersVelden = array();

		for ($veldNummer= 0; $veldNummer < $brouwerStatement->columnCount(); ++$veldNummer)
		{
			$brouwersVelden[]	=	$brouwerStatement->getColumnMeta($veldNummer)['name'];
		}

		//Brouwers data
		$brouwerData = array();
		while($row = $brouwerStatement->fetch(PDO::FETCH_ASSOC))
		{
			$brouwerData[] = $row;
		}

	}
	catch ( PDOException $e )
	{
		$melding['type']	=	'error';
		$melding['text']	=	'De connectie is niet gelukt.';
	}
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Opdracht CRUD Delete 1</title>
		<style>
			.success
			{
				color:lightgreen;
			}

			.error
			{
				color:red;
			}
			.to-delete
			{
				background-color: red !important;
				color:white;
				opacity: 0.7;
			}
			tr:nth-child(even)
			{
				background-color:lightgrey;
			}
			.delete-button
			{
				background-color	:	transparent;
				border				:	none;
				padding				:	0px;
				cursor				:	pointer;
			}
		</style>
	</head>
<body>

	<h1>Opdracht CRUD Delete 1</h1>

	<?php if ( $melding ): ?>
		<p class="<?= $melding[ "type" ] ?>">
			<?= $melding['text'] ?>
		</p>
	<?php endif ?>
	<?php if($deleteConfirm) :?>
		<p>Weet u zeker dat u deze rij wilt verwijderen ?</p>
		<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
			<button type="submit" name="delete" value="<?= $deleteId ?>">Ja</button>
			<button type="submit">Nee</button>
		</form>
	<?php endif ?>
	
	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
		<table>
			
			<thead>
				<tr>
					<?php foreach ($brouwersVelden as $veld): ?>
						<th><?= ucfirst($veld) ?></th>
					<?php endforeach ?>
					<th> Delete</th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($brouwerData as $key => $brouwer) :?>
					<tr class="<?= ($brouwer['brouwernr'] == $deleteId)? 'to-delete' : ''; ?>">
						<?php foreach ($brouwer as $key => $value) : ?>
							<td><?= $value ?></td>
						<?php endforeach ?>
						<td>
							<button type="submit" name="delete_confirm" value="<?= $brouwer['brouwernr'] ?>" class="delete-button">
								<img src="../img/icon-delete.png" alt="Delete button">
							</button>
						</td>
					</tr>
					
				<?php endforeach ?>				
			</tbody>

		</table>
	</form>

</body>
</html>