<?php

	session_start();

	function __autoload( $classname )
	{
		require_once( './classes/'.$classname . '.php' );
	}

	$logout	=	User::logout();

	if ( $logout )
	{
		$logoutMessage	=	new Notification('success', 'Tot de volgende keer!');
		header( 'location: login.php' );
	}

?>