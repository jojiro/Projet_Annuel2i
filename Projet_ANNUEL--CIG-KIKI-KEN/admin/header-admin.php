<?php
	require "verifAdmin.php";
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

    <title>Panel Admin | WorkinSpace</title>
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
						  echo $_SESSION['id_utilisateur'];
					?>
					</a>
					<ul>
						<li><a href="http://localhost/Projet_ANNUEL--CIG-KIKI-KEN">Quitter</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</header> <!-- .cd-main-header -->

	<main class="cd-main-content">
		<nav class="cd-side-nav">
			<ul>
				<li class="cd-label">Principal</li>
				<li><a href="../admin"><i class="fa fa-home admin-side-icon" aria-hidden="true"></i>Accueil</a></li>
				<li><a href="admins.php"><i class="fa fa-user-secret admin-side-icon" aria-hidden="true"></i>Administrateurs</a></li>
				<li><a href="users.php"><i class="fa fa-users admin-side-icon" aria-hidden="true"></i>Utilisateurs</a></li>


		</nav>
	</main>
