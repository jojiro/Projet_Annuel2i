<?php
session_start();
 ?>

<!DOCTYPE html>
<html class="no-js">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Union &mdash; 100% Free Fully Responsive HTML5 Template by FREEHTML5.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO"/>
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive"/>
	<meta name="author" content="FREEHTML5.CO"/>
<!--
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
-->
	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Simple Line Icons -->
	<link rel="stylesheet" href="css/simple-line-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Style -->
	<link rel="stylesheet" href="css/style.css">


	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>

	<body>
	<header role="banner" id="fh5co-header">
		<div class="fluid-container">
			<nav class="navbar navbar-default">
				<div class="navbar-header">
					<!-- Mobile Toggle Menu Button -->
					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
					<a class="navbar-brand" href="./"><span>W</span>ork'N<span>S</span>hare</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="#" data-nav-section="home"><span>Home</span></a></li>
						<li><a href="http://localhost/Projet_ANNUEL--CIG-KIKI-KEN" data-nav-section="explore"><span>WebGL</span></a></li>
						<li><a href="http://localhost/Projet_ANNUEL--CIG-KIKI-KEN" data-nav-section="testimony"><span>Témoignages</span></a></li>
            <li><a href="reservation.php" class="external"><span></span>Réserver</a></li>
						<li><a href="#" data-nav-section="services"><span>Services</span></a></li>
						<li><a href="#" data-nav-section="faq"><span>FAQ</span></a></li>
						<li class="call-to-action">
							<?php if (isset($_SESSION["id_utilisateur"]) && !empty($_SESSION["id_utilisateur"])){
                echo "<li><a href='abonnement.php' class='external'><span>Abonnement</span></a></li>";
                echo "<li><a href='ticket.php' class='external'><span>Support Ticket</span></a></li>";
                echo "<li><a href='deconnexion.php' class='external'><span>Se deconnecter</span></a></li>";
							}else{
								echo "<a class='external' href='connexion'><span>Se connecter</span></a>";
							}
              if(isset($_SESSION["is_admin"]) && $_SESSION["is_admin"] == 1){
              	echo "<li><a href='admin/index.php' class='external'><span>Administration</span></a></li>";
              }
							?>
							</li>
					</ul>
				</div>
			</nav>
	  </div>
	</header>
