<?php
	session_start();
	require "../functions.php";
	require "../conf.inc.php";

		// test connexion au serveur
	try{
	    $db = new PDO(
	     "mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER , DB_PWD );
	   }catch(Exception $e){
	    //Si ca ne marche pas die
	    die("Erreur SQL : ". $e->getMessage() );
	}

	$user = $db -> prepare('SELECT surname,name,is_admin FROM users WHERE email=:email');
	$user -> execute(["email" => $_SESSION['email']]);
	$user = $user -> fetch();

	if(isset($_SESSION['id_utilisateur'])) {
		if($user["is_admin"] == 0 || $user["is_admin"] == NULL) header("Location: ../page_error_404.php");
	}

	if (!isset($_SESSION['id_utilisateur'])) {
		 header("Location: ../page_error_404.php");
	}
?>