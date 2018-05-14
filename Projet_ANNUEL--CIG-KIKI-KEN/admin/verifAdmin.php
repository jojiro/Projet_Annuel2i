<?php
	session_start();
	require "functions.php";
	require "conf.inc.php";

		// test connexion au serveur
	try{
	    $db = new PDO(
	     "mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER , DB_PWD );
	   }catch(Exception $e){
	    //Si ca ne marche pas die
	    die("Erreur SQL : ". $e->getMessage() );
	}

	//tester si l'utilisateur est ADMIN

?>