<?php
	session_start();
	require "functions.php";
	require "conf.inc.php";
	

	try{
		$db = new PDO(
			"mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER , DB_PWD );
	}catch(Exception $e){
		//Si ca ne marche pas die
		die("Erreur SQL : ". $e->getMessage() );
	}

	  $query = $db->prepare("SELECT password FROM users WHERE email = :email");
	    $query->execute(["email"=>$_POST["email"]]);

	   	$result = $query->fetch(PDO::FETCH_ASSOC);

	   	if (password_verify($_POST["password"], $result["password"])) {
	   		$_SESSION['id_utilisateur'] = $_POST["email"];
	   		$_SESSION['email'] = $_POST['email'];
	   		header("Location: ../index.php");
	   		
	   	}else {
	   		
	   		header("Location: ../pages/erreur_connecter.php");
	   	}
?>
