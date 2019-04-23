<?php 
	$server = 'localhost'; 
	$username = 'root';
	$password = '';
	$database = 'bd_pocketcare';


	try {
		$conn = new PDO("mysql:host=$server; dbname=$database;",$username, $password); /* almacena conexión con la base de datos */
	} catch (PDOException $e) {
		die('Error: '.$e->getMessage());
	}
?>