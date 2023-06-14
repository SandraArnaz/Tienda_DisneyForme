<?php

class User {
	public $id;
	public $email;

	function __construct($id, $email){
		$this->id = $id;
		$this->email = $email;
	}
	
}

?>