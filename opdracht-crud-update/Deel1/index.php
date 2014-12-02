<?php


	$melding	=	false;
	$deleteConfirm = false;
	$deleteId = false;
	$editBrouwer = false;
	try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '' ); // Connectie maken

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
		// EDIT
		if(isset($_POST['edit']))
		{
			$editQuery = 'SELECT * FROM brouwers WHERE brouwernr = :brouwernr';
			$editGetStatement = $db->prepare($editQuery);
			$editGetStatement->bindParam(':brouwernr',$_POST['edit']);
			$editGetSuccess = $editGetStatement->execute();

			if($editGetSuccess)
			{
				// Data ophalen voor te updaten brouwer
				$editBrouwer = $editGetStatement->fetch(PDO::FETCH_ASSOC);
			}
			else
			{
				$melding['type'] = 'error';
				$melding['text'] = 'Deze brouwerij werd niet gevonden.';
			}
		}

		if(isset($_POST['wijzigen']))
		{
			$wijzigQuery = 'UPDATE brouwers
									SET brnaam 			=	:brnaam,
										adres			=	:adres,
										postcode		=	:postcode,
										gemeente		=	:gemeente,
										omzet			=	:omzet
									WHERE brouwernr		= :brouwernr
									LIMIT 1';
			$wijzigStatement = $db->prepare($wijzigQuery);

			$wijzigStatement->bindParam(':brnaam',$_POST['brnaam']);
			$wijzigStatement->bindParam(':adres',$_POST['adres']);
			$wijzigStatement->bindParam(':postcode',$_POST['postcode']);
			$wijzigStatement->bindParam(':gemeente',$_POST['gemeente']);
			$wijzigStatement->bindParam(':omzet',$_POST['omzet']);
			$wijzigStatement->bindParam(':brouwernr',$_POST['wijzigen']);

			$wijzigSuccess = $wijzigStatement->execute();
			if($wijzigSuccess)
			{
				$melding['type'] = 'success';
				$melding['text'] = 'De brouwerij '.$_POST['brnaam'].' werd succesvol gewijzigd';
			}
			else
			{
				$melding['type'] = 'error';
				$melding['text'] = 'Wijzigen mislukt probeer opnieuw';
			}
		}

		//Data ophalen voor tabel

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
		<title>Opdracht CRUD Update 1</title>
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

	<h1>Opdracht CRUD Update 1</h1>
	<hr>

	<?php if ( $melding ): ?>
		<p class="<?= $melding[ "type" ] ?>">
			<?= $melding['text'] ?>
		</p>
	<?php endif ?>
	<?php if($editBrouwer) :?>
		<h1><?= $editBrouwer['brnaam'].' (#'.$editBrouwer['brouwernr'].') wijzigen' ?></h1>
		<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
			<ul>
				<li>
					<label>Brouwernaam</label>
					<input type="text" name="brnaam" value="<?= $editBrouwer['brnaam'] ?>"></input>
				</li>
				<li>
					<label>Adres</label>
					<input type="text" name="adres" value="<?= $editBrouwer['adres'] ?>"></input>
				</li>
				<li>
					<label>Postcode</label>
					<input type="text" name="postcode" value="<?= $editBrouwer['postcode'] ?>"></input>
				</li>
				<li>
					<label>Gemeente</label>
					<input type="text" name="gemeente" value="<?= $editBrouwer['gemeente'] ?>"></input>
				</li>
				<li>
					<label>Omzet</label>
					<input type="text" name="omzet" value="<?= $editBrouwer['omzet'] ?>"></input>
				</li>
			</ul>
			<button type"submit" name="wijzigen" value="<?= $editBrouwer['brouwernr'] ?>">Wijzigen</button>
		</form>
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
						<td>
							<button type="submit" name="edit" value="<?= $brouwer['brouwernr'] ?>" class="delete-button">
								<img src="../img/icon-edit.png" alt="Delete button">
							</button>
						</td>
					</tr>
					
				<?php endforeach ?>				
			</tbody>

		</table>
	</form>

</body>
</html>