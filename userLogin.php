<?php
	session_start();

	require "header.php";

?>


<section id="contact-block">

	<div class="row">
				<div class="col-lg-12">
					<h1 id="contact-signup-title">Connexion</h1>
					<br><br>
				</div>
			</div>


		<section>
			<form method="post" action="connection.php">
				<input class="champ" type="email" name="email" placeholder="Votre email" required="required"><br>
				<input class="champ" type="password" name="password" placeholder="Votre mot de passe" required="required"><br>
				
				<i><b><a color="white" href="password-missing.php" >mot de passe oublié</a></b></i>
				<br>
				<input class="champ" id="bt5" type="submit" value="Se connecter">
			</form>
</section>


		</section>

<?php

require "footer.php";

?>
		
	
</html>
