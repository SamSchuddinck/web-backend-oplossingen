<?php 
	class Zebra extends Animal
	{
		protected $species;

		public function __construct($newName, $newGender, $newHealth, $newSpecies)
		{
			parent::__construct( $newName, $newGender, $newHealth );

			$this->species = $newSpecies;
		}

		public function getSpecies()
		{
			return $this->species;
		}
	}
?>