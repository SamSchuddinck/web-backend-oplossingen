<?php 
	class Animal
	{
		protected $name, $gender, $health;

		public function __construct($newName, $newGender, $newHealth)
		{
			$this->name = $newName;
			$this->gender = $newGender;
			$this->health = $newHealth;
		}

		public function getName()
		{
			return $this->name;
		}
		public function getGender()
		{
			return $this->gender;
		}
		public function getHealth()
		{
			return $this->health;
		}
		public function changeHealth($addHealth)
		{
			$this->health += $addHealth;
		}
		public function doSpecialMove()
		{
			return 'Walk';
		}
	}	






?>