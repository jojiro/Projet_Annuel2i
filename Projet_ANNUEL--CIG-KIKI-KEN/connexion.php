<?php
session_start();

require "header.php";
require "conf.inc.php";


if (isset($_POST['email']) && isset ($_POST['password'])) {

	try{
		$db = new PDO(
			"mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER , DB_PWD );
		}catch(Exception $e){
			//Si ca ne marche pas die
			die("Erreur SQL : ". $e->getMessage() );
		}
	}

	/* REQUETE VERIFIER SI DONNEES SONT CORRECTES */
	/* 1 - RECUPERER DONNES EN FONCTION DE L'EMAIL : COUNT(champ à vérifier en bdd)*/
		 $query = $db->prepare("SELECT password FROM users WHERE email = :email");
	    $query->execute(["email"=>$_POST["email"]]);

	/* 2 	- VERIFIER L'EXISTENCE DES DONNEES (email, mot de passe)
				- SI email ET mot de passe EXISTENT, JE VALIDE SINON JE JARTE*/
	if (isset($_POST['email']) && isset ($_POST['password'])) {
		 $_SESSION['id_utilisateur'] = $_POST["email"];
		 $_SESSION['email'] = $_POST['email'];
		 header("Location: index.php");

	 }else {

		 header("Location: pages/erreur_connecter.php");
	 }
?>



	}

	?>


	<section id="contact-block">

		<div class="row">
			<div class="col-lg-12">
				<h1 id="contact-signup-title">Connexion</h1>
				<br><br>
			</div>
		</div>


		<section>
			<form method="post" action="connexion.php">
				<input class="champ" type="email" name="email" placeholder="Votre email" required="required"><br>
				<input class="champ" type="password" name="password" placeholder="Votre mot de passe" required="required"><br>
				<input class="champ" id="bt5" type="submit" value="Se connecter">
			</form>
		</section>


	</section>

	<?php

	require "footer.php";

	?>


	</html>
