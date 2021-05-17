<?php

try{
	$db = new PDO(
		'mysql:host=localhost;dbname=stagiaire;charset=utf8',
		 'root',
		 '',
		 array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
		);
	// $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

} catch(Exception $e){
	die('Erreur de connexion: '.$e->getMessage());
}

?>