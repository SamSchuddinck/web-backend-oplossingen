<?php 
	$articles = array(
		array(
			'titel' => 'Verkoudheid bij mannen is echt erger',
			'p' =>'Als je man nog eens kermend op de zetel ligt, weet dan dat hij echt meer last heeft van zijn verkoudheid dan een vrouw. Hij kan zelfs zwaaien met een studie van de prestigieuze Harvard University ter verdediging.
Volgens de wetenschappers van Harvard is het een kwestie van hormonen: omdat mannen minder oestrogeen in hun lichaam hebben, zijn ze gevoeliger voor aandoeningen van de luchtwegen. Voor hun onderzoek, dat verscheen in het vakblad Life Sciences, besmetten ze muizen met een longinfectie. De vrouwtjesmuizen bleken beter bestand tegen de ziekte dan de mannetjesmuizen.

Die hogere resistentie van de vrouwtjesmuizen houdt verband met de aanwezigheid van het enzym NOS3 (stikstofoxide synthase 3), dat geactiveerd wordt wanneer het vrouwelijke hormoon oestrogeen vrijkomt. Wanneer de mannelijke muizen oestrogeen toegediend kregen, konden ze sneller genezen van hun longziekte.

‘Dit kan nuttig zijn om het risico op secundaire bacteriële longontstekingen tijdens een griepepidemie te beperken’, zegt hoofdauteur Lester Kobzik. ‘Het voordeel is dat we medicijnen kunnen gebruiken die zich richten op NOS3 en dat die medicijnen al voorhanden zijn’.',
			'datum' => '17/10/2014',
			'img' =>'../img/artikkel1.jpg',
			'img_beschrijving' => 'Zieke man in bed'
			),
		array(
			'titel' => 'Moeder reist naar Turkije en redt zoon uit handen van IS',
			'p' =>'Een alleenstaande moeder uit Londen trok naar Turkije in een poging haar geradicaliseerde zoon te redden uit de handen van IS. Met behulp van de navigatie op haar iPad slaagde Linda (45) er in om haar zoon James veilig terug te loodsen. "Ik was nog nooit in Turkije geweest en had dus geen idee waar ik naar toe moest of wat ik deed", vertelt ze aan BBC Inside Out.
James, een voormalig christen, raakte volgens zijn moeder geradicaliseerd nadat hij informatie inwon over de islam op internet. Hij besloot daarom om de Islamitische Staat (IS) te gaan helpen in Syrië. Linda kwam er pas achter nadat haar zoon was vertrokken. "Anders had ik hem wel tegengehouden".

James is één van de zeshonderd Britse jongeren die naar het land trok om daar te vechten. 

Angst en paniek
Gedurende de vier maanden dat haar zoon in het Midden-Oosten verbleef, ontving Linda nog regelmatig telefoontjes van hem. Desondanks leefde ze in een constante staat van angst en paniek. "Ik besloot een andere tactiek te gebruiken. Toen ik hem sprak, vertelde ik dat ik in het buitenland zou gaan werken. Ik trok het niet meer om zonder hem in dit appartement te zijn. Het leek zijn verzet te breken en bleek de drijfveer achter zijn terugkeer", aldus Linda.

Zijn terugreis was niet zonder gevaar. James belandde in een spervuur en kreeg granaatscherven in zijn schouder. Toen Linda hier lucht van kreeg, ging ze naar het grensplaatsje Adana en bracht haar zoon met behulp van de navigatie op haar iPad in veiligheid. "En toen stond hij daar opeens. Ik was zo opgelucht: het was me gelukt om mijn zoon terug te krijgen!"

Geheime dienst
James, die door Linda beschreven wordt als fragiel en getraumatiseerd, heeft bij terugkeer geen therapie ontvangen die tot deradicalisering moet leiden. De geheime dienst zat hem wel meteen op de lip. "Ze probeerden hem onder druk te zetten, zodat hij informatie zou geven. Ze boden hem dingen in ruil voor informatie, maar James was er niet toe in staat".',
			'datum' => '20/10/14',
			'img' =>'../img/artikkel2.jpg',
			'img_beschrijving' => 'Ontploffing in Midden-Oosten'

			),
		array(
			'titel' => 'Dronken vrouw komt vast te zitten in glascontainer',
			'p' => 'De 19-jarige Britse studente Chelsie Redwood zal zich haar laatste avondje uit met de vriendinnen nog lang herinneren. De vrouw kwam op uiterst gênante wijze vast te zitten in een glascontainer.

Volgens een persbericht van de brandweer was de dame op zoek naar nog meer drank toen ze zich in de glascontainer wurmde met haar hoofd. Eenmaal binnen kwam ze tot de constatatie dat ze haar hoofd niet meer vrij kreeg. Een brandweerkorps moest de opening uiteindelijk groter maken zodat de vrouw los kon komen.',
			'datum' => '20/10/2014',
			'img' =>'../img/artikkel3.jpg',
			'img_beschrijving' =>'Foto van glascontainer'
			)
		);
	$singleArticle	=	false;
	$wrongArticle	=	false;

	if ( isset ( $_GET['id'] ) )
	{
		$id = $_GET['id'];

		if ( array_key_exists( $id , $articles ) )
		{
			$articles 			= 	array( $articles[$id] );
			$singleArticle	=	true;
		}
		else
		{
			$wrongArticle	=	true;
		}
	}
?>
<html>
<head>
	<title>Opdracht Get</title>
	<style>
		body
		{
			font-family:"Segoe UI";
			color:#423f37;
		}
		.container
		{
			width:	1024px;
			margin:	0 auto;
		}

		img
		{
			max-width: 100%;
		}

		.multiple
		{
			float:left;
			width:288px;
			margin:16px;
			padding:16px;
			box-sizing:border-box;
			background-color:#EEEEEE;
		}

		.multiple:nth-child(3n+1)
		{
			margin-left:0px;
		}

		.multiple:nth-child(3n)
		{
			margin-right:0px;
		}

		.single img
		{
			float:right;
			margin-left: 16px;
		}
	</style>
</head>
<body>
	<?php if ( !$wrongArticle ): ?>
		<div class="container">
			<?php foreach ( $articles as $id => $article ): ?>
				<article class="<?php echo ( !$singleArticle ) ? 'multiple': 'single' ; ?>">
					<h1><?php echo $article['titel'] ?></h1>
					<p><?php echo $article['datum'] ?></p>
					<img src="img/<?php echo $article['img'] ?>" alt="<?php echo $article['img_beschrijving'] ?>">
					<p><?php echo ( !$singleArticle ) ? str_replace ( "\r\n", "</p><p>", substr( $article['p'], 0, 50 ) ) . '...': str_replace ( "\r\n", "</p><p>",$article['p'] ) ; ?></p>
					<?php if ( !$singleArticle ): ?>
						<a href="index.php?id=<?php echo $id ?>">Lees meer</a>
					<?php endif ?>
				</article>
			<?php endforeach ?>
		</div>
	<?php else: ?>
		<p>Het article met id <?php echo $id ?> bestaat niet. Probeer een ander article.</p>
	<?php endif ?>
</body>
</html>