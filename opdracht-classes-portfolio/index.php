<?php 
	function __autoload($className)
	{
		include_once 'classes/' . $className . '.php'; 
	}

	$page = new HTMLBuilder('header.partial.php','index.partial.php','footer.partial.php');
?>