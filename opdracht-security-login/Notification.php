<?php

	class Notification
	{
		private $type;
		private $text;

		public function __construct( $type, $text )
		{
			$this->type	=	$type;
			$this->text	=	$text;

			$this->addNotificationToSession();
		}

		private function addNotificationToSession()
		{
			$_SESSION[ 'notification' ][ 'type' ]	=	$this->type;
			$_SESSION[ 'notification' ][ 'text' ]	=	$this->text;
		}

		private function removeNotificationFromSession()
		{
			unset( $_SESSION[ 'notification' ] );
		}

		public static function getNotification()
		{
			$notification	=	false;

			if ( isset( $_SESSION[ 'notification' ] ) )
			{
				$notification[ 'type' ]	=	$_SESSION[ 'notification' ][ 'type' ];
				$notification[ 'text' ]	=	$_SESSION[ 'notification' ][ 'text' ];
				
				self::removeNotificationFromSession( );
			}

			return $notification;
		}

	}

?>