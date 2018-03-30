




<?php
	

	require "conf.inc.php";

	if(isset($_SESSION['email'])){

		try{
				$db = new PDO(
					"mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER , DB_PWD );
			}catch(Exception $e){
				//Si ca ne marche pas die
				die("Erreur SQL : ". $e->getMessage() );
			}

		$pseudo = $db -> prepare('SELECT surname,name FROM users WHERE email=:email');
		$pseudo -> execute(["email" => $_SESSION['email']]);
		$pseudo = $pseudo -> fetch();


	}


?>






<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>WorkinSpace</title>
		<meta name="description" contet=" Description à venir !">

		<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	 	<link rel="stylesheet" href="../css/bootstrap.css">
	 	<link rel="stylesheet" href="../css/style.css">
	 	<link rel="stylesheet"  href="../css/font/css/font-awesome.css">
	 	<link href="https://fonts.googleapis.com/css?family=Scada" rel="stylesheet">

		

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		<script src="http://maps.google.com/maps/api/js?key=AIzaSyDvXozP_xBBa5LFC3HFNHGnmrx585xBwzQ&language=fr" type="text/javascript"></script>
		<script src="../js/script.js"></script>


	 	
	</head>
	<body>
		<header>
			<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
			    <div class="container-fluid">
			      <!-- Brand and toggle get grouped for better mobile display -->
			        <div class="navbar-header">
				        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				            <span class="sr-only">Toggle navigation</span>
				            <span class="icon-bar"></span>
				            <span class="icon-bar"></span>
				        	<span class="icon-bar"></span>
				        </button>
				        <a class="navbar-brand" href="../index.php">WorkinSpace</a>
			    	</div>

				    <!-- Collect the nav links, forms, and other content for toggling -->
				  <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="#" data-nav-section="home"><span>Home</span></a></li>
                        <li><a href="#" data-nav-section="explore"><span>Explorer</span></a></li>
                        <li><a href="#" data-nav-section="testimony"><span>Témoignages</span></a></li>
                        <li><a href="#" data-nav-section="pricing"><span>Tarifs</span></a></li>
                        <li><a href="#" data-nav-section="services"><span>Services</span></a></li>
                        <li><a href="#" data-nav-section="faq"><span>FAQ</span></a></li>
                       
				        <?php

				        	if(isset($_SESSION['id_utilisateur'])) {
				        		echo 
							        '<ul class="nav navbar-nav navbar-right">
							        	<li class="dropdown">
							            	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$pseudo["surname"]." ".$pseudo["name"].'<span class="caret"></span></a>
								            <ul class="dropdown-menu">
								                <li><a href="#">Profil</a></li>
									            <li><a href="#">Coordonnées</a></li>
									            <li role="separator" class="divider"></li>
									            <li><a href="#">Panel admin</a></li>
									            <li role="separator" class="divider"></li>
									            <li><a href="registration.php">Inscription</a></li>
									            <li role="separator" class="divider"></li>
									            <li><a href="userLogin.php">Connexion</a></li>
									            <li role="separator" class="divider"></li>
									            <li><a href="userDeconnection.php">Déconexion</a></li>
								            </ul>
							        	</li>
							      	</ul>';
							}else {
								echo '	<ul class="nav navbar-nav navbar-right">
					       					<li><a href="userLogin.php">Connexion</a></li>
					       					<li><a href="registration.php">S\'inscrire</a></li>
										</ul>';
							}


				      	?>

			    	</div><!-- /.navbar-collapse -->
			    </div><!-- /.container-fluid -->
			</nav>
		</header>