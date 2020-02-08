<?php
	function connect(){
		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$dbName = 'dresshouse';

		$con = new mysqli($host,$user,'',$dbName);
		return $con;
	}

?>