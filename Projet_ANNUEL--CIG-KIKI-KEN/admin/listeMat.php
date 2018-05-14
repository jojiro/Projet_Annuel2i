<?php
	require "header-admin.php";

	unset($_SESSION["userId"]);
?>

	<section id="page-section">
		<h1 id="page-title">Gestion du matériel</h1>

		<hr>


		<div class="container">
		    <h2>Liste du matériel</h2>
		    <div class="table-responsive">
			    <table class="table">
			   		<thead>
			        	<tr>
				        	<th>Réference</th>
				       		<th>Type de matériel</th>
				       		<th>État</th>
				       		<th>Localisation</th>
					        <th>Date d'enregistrement</th>
			      		</tr>
			   		</thead>
			    	<tbody>
								
				    <?php

						$query = $db->prepare('SELECT * FROM materiel ORDER BY entered_at');
				  		$query->execute([
				  			]);
				  		$resMat=$query->fetchAll(PDO::FETCH_ASSOC);

						foreach ($resMat as $materiel) {
							echo '<td>'.$materiel["reference"].'</td>';
							switch ($materiel["type"]) {
								case '1':
									echo '<td>'.'1-Ordinateur portable'.'</td>';
									break;
								case '2':
									echo '<td>'.'2-Ordinateur fixe'.'</td>';
									break;
								case '3':
									echo '<td>'.'3-Écran'.'</td>';
									break;
								case '4':
									echo '<td>'.'4-Périphérique'.'</td>';
									break;
								case '5':
									echo '<td>'.'5-Vidéoprojecteur'.'</td>';
									break;
								case '6':
									echo '<td>'.'6-Autre'.'</td>';
									break;
								
								default:
									# code...
									break;
							}
								
							switch ($materiel["status"]) {
								case '1':
									echo '<td>'.'1-Parfait/Neuf'.'</td>';
									break;
								case '2':
									echo '<td>'.'2-Dommages faible'.'</td>';
									break;
								case '3':
									echo '<td>'.'3-Dommages empéchant utilisation'.'</td>';
									break;
								case '4':
									echo '<td>'.'4-Hors service et non réparable'.'</td>';
									break;
								
								default:
									# code...
									break;
							}
							switch ($materiel["localisation"]) {
								case '1':
									echo '<td>'.'1-Bastille'.'</td>';
									break;
								case '2':
									echo '<td>'.'2-République'.'</td>';
									break;
								case '3':
									echo '<td>'.'3-Odéon'.'</td>';
									break;
								case '4':
									echo '<td>'.'4-Place d italie'.'</td>';
									break;
								case '5':
									echo '<td>'.'5-Ternes'.'</td>';
									break;
								case '6':
									echo '<td>'.'6-Beaubourg'.'</td>';
									break;
								
								default:
									# code...
									break;
							}
							echo '<td>'.$materiel["entered_at"].'</td>';
							echo '<td><form method="POST" action="editMat.php">
										<input type="hidden" name="reference" value="'.$materiel["reference"].'">
										<input type="submit" class="btn btn-primary" value="Modifier/Afficher problèmes">
									   </form>
								 </td>';
							echo '</tr>';
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