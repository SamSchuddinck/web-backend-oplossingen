<?php 
	$melding = false;
	try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '' );

		$query	=	'SELECT *
						FROM bieren 
						INNER JOIN brouwers
						ON bieren.brouwernr = brouwers.brouwernr
						WHERE bieren.naam LIKE "Du%"
						AND brouwers.brnaam LIKE "%a%"';

		$statement = $db->prepare($query);

		$statement->execute();
		
		$bieren	= array();

		while ( $row = $statement->fetch( PDO::FETCH_ASSOC ) )
		{
			$bieren[] =	$row;
		}

		$kolomNamen	=	array();
		$kolomNamen[]	=	'Biernummer';

		foreach( $bieren[0] as $key => $bier )
		{
			$kolomNamen[] =	ucfirst($key);
		}

	}
	catch ( PDOException $e )
	{
		$melding['type'] = 'error';
		$melding['text'] = 'De connectie is mislukt.';
	}
 ?>
 <!doctype html>
<html>
	<head>
		<title>Opdracht CRUD Query</title>
		<style>
			.modal
			{
				padding			:	6px;
				border-radius	:	3px;
				border: 2px solid #222;
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
		<div class="modal <?= $message[ "type" ] ?>">
			<?= $message['text'] ?>
		</div>
	<?php endif ?>

	<table>	
		<thead>
			<tr>
				<?php foreach ($kolomNamen as $kolomNaam): ?>
					<th><?= $kolomNaam ?></th>
				<?php endforeach ?>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($bieren as $key => $bier): ?>
				<tr>
					<td><?= ($key + 1) ?></td>
					<?php foreach ($bier as $value): ?>
						<td><?= $value ?></td>
					<?php endforeach ?>
				</tr>
			<?php endforeach ?>	
		</tbody>
	</table>
</body>
</html>