	<?php
		session_start();


		require_once "functions.php";


		showArray($_SESSION);
		showArray($_POST);

				try{
					$db = new PDO(
						"mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER , DB_PWD );
				}catch(Exception $e){
					//Si ca ne marche pas die
					die("Erreur SQL : ". $e->getMessage() );
				}

				//préparer la requête
				$query2 = $db->prepare("INSERT INTO tickets
										(user_id,
										title, message
										)
										VALUES
										(:user_id,
										:title, :message
										)");


				//Exectuer la requete avec les valeurs

				


				$query2->execute([
						
						"user_id"=>$_SESSION['email'],
						"title"=>$_POST['title'],
						"message"=>$_POST['message']
					]);


		
