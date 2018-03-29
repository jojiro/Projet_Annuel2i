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

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/admin.css">
  	
    <title>Panel Admin | Century Student</title>
</head>
<body>
	<header class="cd-main-header">
		<a href="../../" class="cd-logo"><img class="logo" src="img/logo.png" alt="Logo"></a>

		<a href="#" class="cd-nav-trigger"><span></span></a>

		<nav class="cd-nav">
			<ul class="cd-top-nav">
				<li class="has-children account">
					<a href="#"><i class="fa fa-user-circle-o admin-top-icon" aria-hidden="true"></i>
					<?php
						echo $user["surname"]." ".$user["name"];
					?>
					</a>
					<ul>
						<li><a href="../../">Quitter</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</header> <!-- .cd-main-header -->

	<main class="cd-main-content">
		<nav class="cd-side-nav">
			<ul>
				<li class="cd-label">Pricipal</li>
				<li><a href="../admin"><i class="fa fa-home admin-side-icon" aria-hidden="true"></i>Accueil</a></li>
				<li><a href="admins.php"><i class="fa fa-user-secret admin-side-icon" aria-hidden="true"></i>Administrateurs</a></li>
				<li><a href="users.php"><i class="fa fa-users admin-side-icon" aria-hidden="true"></i>Utilisateurs</a></li>
				<li><a href="displayLocations.php"><i class="fa fa-list-alt admin-side-icon" aria-hidden="true"></i>Locations</a></li>
				<li><a href="displayVentes.php"><i class="fa fa-list-alt admin-side-icon" aria-hidden="true"></i>Ventes</a></li>
			</ul>

			<ul>
				<li class="cd-label">Secondaire</li>
				<li><a href="addAnnonce.php">Ajouter une annonce</a></li>
			</ul>

		</nav>
	</main>

