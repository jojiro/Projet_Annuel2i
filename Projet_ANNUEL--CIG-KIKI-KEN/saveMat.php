	<?php
		session_start();


		require_once "functions.php";

				try{
					$db = new PDO(
						"mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER , DB_PWD );
				}catch(Exception $e){
					//Si ca ne marche pas die
					die("Erreur SQL : ". $e->getMessage() );
				}

				//préparer la requête
				$query2 = $db->prepare("INSERT INTO materiel
										(reference,
										localisation, problems, status, type
										)
										VALUES
										(:reference,
										:localisation, :problems, :status, :type
										)");


				//Exectuer la requete avec les valeurs

				


				$query2->execute([
						"reference"=>$_POST['reference'],
						"localisation"=>$_POST['localisation'],
						"problems"=>$_POST['problems'],
						"status"=>$_POST['status'],
						"type"=>$_POST['type']
					]);


		
