 <?php
	require "verifAdmin.php";

	
	if (count($_POST) == 4
		&& !empty($_POST["id"])
		&& !empty($_POST["answer"])
		&& !empty($_POST["status"])
		&& !empty($_POST["message"])
		) {
		
	$_POST["message"] = $_POST["message"] . "\nRéponse de l'administrateur: " . $_POST["answer"];
	


	$query = $db->prepare("UPDATE tickets SET status = :status, message = :message WHERE id = :id");

			$query->execute([
					"status"=>$_POST["status"],
					"message"=>$_POST["message"],
					"id"=>$_POST["id"]
				]);
			header("Location: ListeTicket.php");
		}else{
			echo "Problème lors de l'entrée en base de données, veuillez vous assurez de bien remplir correctement tout les champs"
			?>
			<li><a href="ListeTicket.php">Retour à la liste des tickets</a></li>
			<?php

		}

 ?>


