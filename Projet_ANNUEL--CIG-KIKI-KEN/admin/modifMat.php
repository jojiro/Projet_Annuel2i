 <?php
	require "verifAdmin.php";


	if (count($_POST) == 5
		&& !empty($_POST["status"])
		&& !empty($_POST["localisation"])
		&& !empty($_POST["problems"])
		&& !empty($_POST["reference"])
		) {
	
	$_POST["problems"] = $_POST["oldProblems"] . "\n- " . $_POST["problems"];
	//echo $_POST["problems"];
	//$reference=$_POST["reference"];
	


	$query = $db->prepare("UPDATE materiel SET status = :status, problems = :problems, localisation = :localisation WHERE reference = :reference");

			$query->execute([
					"status"=>$_POST["status"],
					"problems"=>$_POST["problems"],
					"localisation"=>$_POST["localisation"],
					"reference"=>$_POST["reference"]
				]);

			header("Location: ListeMat.php");

		}else{
			echo "Problème lors de l'entrée en base de données, veuillez vous assurez de bien remplir correctement tout les champs"
			?>
			<li><a href="ListeMat.php">Retour à la liste du matériel</a></li>
			<?php

		}

 ?>


