<?php
	require "header-admin.php";
?>

	<section id="page-section">
		<h1 id="page-title">Panel Admin</h1>

		<hr>

			<div class="row">

 
					<div class="stat-container">

						<center>
							<div class="admin-stat-block col-sm-3">
								<div class="admin-stat-values">
									<p class="admin-stat-text">Utilisateurs enregistrés</p>
									<p class="admin-stat-number">
										<?php
											$nbUser = $db -> prepare('SELECT COUNT(id) FROM users');
											$nbUser -> execute();
											$nbUser = $nbUser -> fetch();
											echo $nbUser[0];
										?>
									</p>
								</div>
							</div>	

							<div class="admin-stat-block col-sm-3">
								<div class="admin-stat-values">
									<p class="admin-stat-text">Nombre de locataires</p>
									<p class="admin-stat-number">
										<?php
											$nbUser = $db -> prepare('SELECT COUNT(id) FROM users WHERE situation = :situation');
											$nbUser -> execute([
													":situation"=>"l"
												]);
											$nbUser = $nbUser -> fetch();
											echo $nbUser[0];
										?>
									</p>
								</div>
							</div>

							<div class="admin-stat-block col-sm-3">
								<div class="admin-stat-values">
									<p class="admin-stat-text">Nombre de vendeurs</p>
									<p class="admin-stat-number">
										<?php
											$nbUser = $db -> prepare('SELECT COUNT(id) FROM users WHERE situation = :situation');
											$nbUser -> execute([
													":situation"=>"p"
												]);
											$nbUser = $nbUser -> fetch();
											echo $nbUser[0];
										?>
									</p>
								</div>
							</div>

							<div class="admin-stat-block col-sm-3">
								<div class="admin-stat-values">
									<p class="admin-stat-text">Nombre d'annonces</p>
									<p class="admin-stat-number">
										<?php
											$nbAdd = $db -> prepare('SELECT COUNT(id) FROM listeDesPoints');
											$nbAdd -> execute();
											$nbAdd = $nbAdd -> fetch();

											$nbAdd2 = $db -> prepare('SELECT COUNT(id) FROM listeDesPointsvente');
											$nbAdd2 -> execute();
											$nbAdd2 = $nbAdd2 -> fetch();

											$nbAdds = $nbAdd[0] + $nbAdd2[0];
											echo $nbAdds;
										?>
									</p>
								</div>
							</div>
						</center>

					</div>
				</div>

			<hr>

	</section>

<?php
	require "footer-admin.php";
?>