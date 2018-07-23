<!-- OOP CONTRUCTORS -->
<?php
 /*Class Person {
 		var $name;
 		var $age;
 		public $height;
		protected $insurance;
		private $pin_number = 12345;
 		
 	


 	function __construct($person_name,$person_age){
 		$this->name = $person_name;
 		$this->age = $person_age;
 	}
 	function GetName(){
 		return $this->name;
 	}
 	function GetAge(){
 		return $this->age;
 	}


 	 function GetPin(){
 		return $this ->pin_number;
 	}

 	
} 
*/

class Toyin {

	public static function pin(){
 		return 10;
 	}

 	public static function yellow(){
 		$area = 2 * static::pin();
 		return $area;
 	}

}





/*class Azeez{
		var $name;
		var $age;
		var $address;


			function setName($new_name){
				$this->name = $new_name;
			}

			function GetName(){
				return $this->name;
			}
			function setAge($new_age){
				$this->age = $new_age;
			}
			function GetAge(){
				return $this->age;
			}
			function  setAddress($new_address){
				$this->address = $new_address;
			}
			function GetAddress(){
				return $this->address;
			}

}
*/

?>