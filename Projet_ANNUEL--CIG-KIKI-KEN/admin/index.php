<?php
	require "header-admin.php";

if(isset($_SESSION["is_admin"]) && $_SESSION["is_admin"] == 0){
	header("Location: ../index.php");
}
?>
	<section id="page-section">
		<h1 id="page-title">Panel Admin Worknshare</h1>

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
									<p class="admin-stat-text">Nombre d'espaces</p>
									<p class="admin-stat-number">
										<?php
											$nbAdd = $db -> prepare('SELECT COUNT(id) FROM id_room');
											$nbAdd -> execute();
											$nbAdd = $nbAdd -> fetch();

											$nbAdds = $nbAdd[0];
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
