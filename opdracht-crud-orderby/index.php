<?php

	$message			=	false;
	
	try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '' ); // Connectie maken

		$orderColumn	=	'bieren.biernr';
		$order			=	'ASC';

		if ( isset( $_GET[ 'orderBy' ] ) )
		{
			$orderArray		=	explode( '-', $_GET[ 'orderBy' ] );
			$orderColumn	=	$orderArray[ 0 ];

			$order		=	$orderArray[ 1 ];
		}

		$orderQuery		=	'ORDER BY ' . $orderColumn . ' ' . $order;

		if ( isset( $_GET[ 'orderBy' ] ) )
		{
			$order = ( $orderArray[ 1 ] != 'DESC') ? 'DESC' 	:	'ASC';
		}

		$query	=	'SELECT bieren.biernr,
							bieren.naam,
							brouwers.brnaam,
							soorten.soort,
							bieren.alcohol 
						FROM bieren 
							INNER JOIN brouwers
							ON bieren.brouwernr	= brouwers.brouwernr
							INNER JOIN soorten
							ON bieren.soortnr = soorten.soortnr '
							. $orderQuery;

		$bierenQuery	=	query( $db, $query  ) ;

		$bierenVeldnamen		= 	$bierenQuery[ 'Veldnamen' ];
		$bierenPropereVeldnamen	= 	processFieldnames( $bierenVeldnamen );
		$bieren					=	$bierenQuery[ 'data' ];

	}
	catch ( PDOException $e )
	{
		$message['type']	=	'error';
		$message['text']	=	'De connectie is niet gelukt.';
	}
	
	function query( $db, $query, $tokens = false )
	{
		$statement = $db->prepare( $query );
		
		if ( $tokens )
		{
			foreach ( $tokens as $token => $tokenValue )
			{
				$statement->bindParam( $token, $tokenValue );
			}
		}

		$statement->execute();

		/*  Veldnamen ophalen*/
		$fieldnames	=	array();

		for ( $fieldNumber = 0; $fieldNumber < $statement->columnCount(); ++$fieldNumber )
		{
			$fieldnames[]	=	$statement->getColumnMeta( $fieldNumber )['name'];
		}

		/*De brouwer-data ophalen*/
		$data	=	array();

		while( $row = $statement->fetch( PDO::FETCH_ASSOC ) )
		{
			$data[]	=	$row;
		}

		$returnArray['Veldnamen']	=	$fieldnames;
		$returnArray['data']		=	$data;

		return $returnArray;
	}

	function processFieldnames( $array )
	{

		$propereVeldnamen	=	array();

		foreach( $array as $value )
		{
			switch( $value )
			{
				case "biernr":
					$name	=	"Biernummer (PK)";
					break;
				case "naam":
					$name	=	"Bier";
					break;
				case "brnaam":
					$name	=	"Brouwer";
					break;
				case "soort":
					$name	=	"Soort";
					break;
				case "alcohol":
					$name	=	"Alcoholpercentage";
					break;
				default:
					$name	=	$value;
			}

			$propereVeldnamen[ ]	=	$name;
		}

		return $propereVeldnamen;
	}
	

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Opdracht CRUD Orderby</title>
		<style>
			.modal
			{
				padding			:	6px;
				border-radius	:	3px;
			}

			.success
			{
				background-color:lightgreen;
			}

			.error
			{
				background-color:red;
			}

			.even
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

			.confirm-delete
			{
				background-color	:	red;
				color				: 	white;
			}

			.order a
			{
				padding-right:20px;
			}

			.ascending a
			{
				background:	no-repeat url('img/icon-asc.png') right ;
			}

			.descending a
			{
				background:	no-repeat url('img/icon-desc.png') right;
			}

			.selected
			{
				background-color	:	lightgreen;
			}
		</style>
	</head>
<body>

	<h1>Opdracht CRUD OrderBy</h1>

	<?php if ( $message ): ?>
		<div class="modal <?= $message[ "type" ] ?>">
			<?= $message['text'] ?>
		</div>
	<?php endif ?>	
	

	<table>
		
		<thead>
			<tr>
				<?php foreach ($bierenPropereVeldnamen as $key => $propereVeldnaam): ?>
					<th class="order <?= ( $order == 'ASC' && $orderColumn == $bierenVeldnamen[ $key ] ) ? 'descending' : 'ascending' ?> <?= ( $orderColumn == $bierenVeldnamen[ $key ] ) ? 'selected' : '' ?>"><a href="<?= $_SERVER['PHP_SELF'] ?>?orderBy=<?= $bierenVeldnamen[ $key ] ?>-<?= $order ?>"><?= $propereVeldnaam ?></a></th>
				<?php endforeach ?>
				<th></th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($bieren as $key => $brouwer): ?>
				<tr class="<?= ( ($key + 1) % 2 == 0 ) ? 'even' : '' ?>">
					<?php foreach ($brouwer as $value): ?>
						<td><?= $value ?></td>
					<?php endforeach ?>
				</tr>
			<?php endforeach ?>
			
		</tbody>

	</table>

</body>
</html>