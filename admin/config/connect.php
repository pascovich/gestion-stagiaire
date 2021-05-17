<?php

$user="root";
$pass="";

$db=new PDO('mysql:host=localhost;dbname=stagiaire',$user,$pass);

require 'ses.php';
$userr = new USER($db);

?>