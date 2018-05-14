<?php
	require "header-admin.php";

	unset($_SESSION["userId"]);
?>

	<section id="page-section">
		<h1 id="page-title">Gestion des tickets</h1>

		<hr>


		<div class="container">
		    <h2>Liste des Tickets</h2>
		    <div class="table-responsive">
			    <table class="table">
			   		<thead>
			        	<tr>
				        	<th>Statut</th>
				       		<th>Titre</th>
				       		<th>Auteur</th>
					        <th>Date d'émission</th>
			      		</tr>
			   		</thead>
			    	<tbody>

				    <?php

						$query = $db->prepare('SELECT * FROM tickets ORDER BY id');
				  		$query->execute([
				  			]);
				  		$resTicket=$query->fetchAll(PDO::FETCH_ASSOC);

						foreach ($resTicket as $ticket) {
							if ($ticket["status"]!=0) {
							echo '<tr>';
							switch ($ticket["status"]) {
								case '1':
									echo '<td>'.'1-Nouveau ticket'.'</td>';
									break;
								case '2':
									echo '<td>'.'2-En cours de résolution'.'</td>';
									break;
								case '3':
									echo '<td>'.'3-Résolu'.'</td>';
									break;
								
								default:
									# code...
									break;
							}
							
							echo '<td>'.$ticket["title"].'</td>';
							echo '<td>'.$ticket["user_id"].'</td>';
							echo '<td>'.$ticket["created_at"].'</td>';
							echo '<td><form method="POST" action="editTicket.php">
										<input type="hidden" name="userId" value="'.$ticket["id"].'">
										<input type="submit" class="btn btn-primary" value="Modifier">
									   </form>
								 </td>';
							echo '</tr>';
						}else{
						}
						
						}


				    ?>

					</tbody>
				</table>
			</div>
		</div>


		<hr>

	</section>

<?php
	require "footer-admin.php";
?>