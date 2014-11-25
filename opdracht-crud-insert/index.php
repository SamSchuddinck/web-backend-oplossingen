<?php 
	$melding = false;
	if(isset($_POST['submit']))
	{
		try {
			$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root' ); // Paswoord root op laptop leeg op desktop

			$insertBrouwerQuery = 'INSERT INTO brouwers
				(
					brnaam,
					adres,
					postcode,
					gemeente,
					omzet
				)
				VALUES 
				(
					:brnaam,
					:adres,
					:postcode,
					:gemeente,
					:omzet
				)
				';
			$insertBrouwerStatement = $db->prepare($insertBrouwerQuery);
			$insertBrouwerStatement->bindParam(':brnaam', $_POST['brnaam']);
			$insertBrouwerStatement->bindParam(':adres', $_POST['adres']);
			$insertBrouwerStatement->bindParam(':postcode', $_POST['postcode']);
			$insertBrouwerStatement->bindParam(':gemeente', $_POST['gemeente']);
			$insertBrouwerStatement->bindParam(':omzet', $_POST['omzet']);

			$querySuccess = $insertBrouwerStatement->execute();

			if($querySuccess)
			{
				$lastId = $db->lastInsertId();
				$melding['type'] = 'success';
				$melding['text'] = 'Brouwerij succesvol toegevoegd. Het unieke nummer van deze brouwerij is '.$lastId;
			}
			else
			{
				$melding['type'] = 'error';
				$melding['text'] = 'Er ging iets mis met het toevoegen. Probeer opnieuw.';
			}
			
		} 
		catch ( PDOException $e) 
		{
			$melding['type'] = 'error';
			$melding['text'] = 'De connectie is mislukt';
		}
	}
	
?>
<! doctype>
<html>
<head>
	<title>Opdracht CRUD Insert</title>
	<style type="text/css">
		.error
		{
			color:red;
		}
		.success
		{
			color:green;
		}
		ul
		{
			list-style-type: none;
			width: auto;
			height: auto;
		}
	</style>
</head>
<body>
	<?php if($melding) :?>
		<p class="<?= $melding['type']?>">
			<?= $melding['text'] ?>
		</p>
	<?php endif ?>
	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
		<ul>
			<li>
				<label for="brnaam">Brouwernaam</label>
				<input type="text" name="brnaam" id="brnaam">
			</li>
			<li>
				<label for="adres">Adres</label>
				<input type="text" name="adres" id="adres">
			</li>
			<li>
				<label for="postcode">Postcode</label>
				<input type="text" name="postcode" id="postcode">
			</li>
			<li>
				<label for="gemeente">Gemeente</label>
				<input type="text" name="gemeente" id="gemeente">
			</li>
			<li>
				<label for="omzet">Omzet</label>
				<input type="text" name="omzet" id="omzet">
			</li>
		</ul>	
		<input type="submit" value="Voeg toe" name="submit">
	</form>

</body>
</html>