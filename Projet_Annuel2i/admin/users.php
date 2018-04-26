<?php
	require "header-admin.php";

	unset($_SESSION["userId"]);
?>

	<section id="page-section">
		<h1 id="page-title">Utilisateurs</h1>

		<hr>


		<div class="container">
		    <h2>Liste des utilisateurs</h2>                                                                                      
		    <div class="table-responsive">          
			    <table class="table">
			   		<thead>
			        	<tr>
				        	<th>#</th>
				       		<th>Image</th>
				       		<th>Sexe</th>
					        <th>Nom</th>
				       		<th>Prénom</th>
					        <th>Date de naissance</th>
					        <th>Email</th>
					        <th>Pays</th>
					        <th>Téléphone</th>
					        <th>Inscription</th>
					        <th>Dermière modification</th>
					        <th>Adresse IP</th>
					        <th>Dernière connexion</th>
					        <th>Supprimé</th>
					        <th>Admin</th>
					        <th>Token</th>
			      		</tr>
			   		</thead>
			    	<tbody>

				    <?php

						$query = $db->prepare('SELECT * FROM users ORDER BY id');
				  		$query->execute();
				  		$allUsers=$query->fetchAll(PDO::FETCH_ASSOC);

						foreach ($allUsers as $user) {
							echo '<tr>';
							foreach ($user as $key => $value) {
								if ($key != "password") {
									if ($key == "avatar") {
										echo '<td><img class="display-users-img" src="../../img/'.$value.'"></td>';
									}
									else {
										echo '<td>'.$value.'</td>';
									}
								}
								/*if ($key == "is_deleted" || $key == "is_admin") {
									if ($value == 1) {
										echo '<td>Faux</td>';
									}
									if ($value == 0) {
										echo '<td>Vrai</td>';
									}
								}*/
							}
							echo '<td><form method="POST" action="editUser.php">
										<input type="hidden" name="userId" value="'.$user["id"].'">
										<input type="submit" class="btn btn-primary" value="Modifier">
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