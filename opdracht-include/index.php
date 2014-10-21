<?php 
	$artikkels = array(
			array(
				'titel' => 'Titel van Artikkel 1',
				'tekst' => 'Tekst van artikkel 1',
				'tags' => array('tag1.1')
				),
			array(
				'titel' => 'Titel van Artikkel 2',
				'tekst' => 'Tekst van artikkel 2',
				'tags' => array('tag2.1','tag2.2')
				),
			array(
				'titel' => 'Titel van Artikkel 3',
				'tekst' => 'Tekst van artikkel 3',
				'tags' => array('tag3.1','tag3.2','tag3.3')
				)
		);

	include('view/header-partial.html');
	include('view/body-partial.html');
	include('view/footer-partial.html');
 ?>