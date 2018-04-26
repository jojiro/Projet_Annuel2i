<?php
	session_start();

	require "header.php";

?>



		<section id="signup-block">

			<div class="row">
				<div class="col-lg-12">
					<h1 id="signup-title">INSCRIPTION</h1>
					    
				</div>
			</div>


		
			
			<form method="POST" action="saveUser.php">

				

					<li><input class="champ" type="text" name="name" placeholder="Nom" required="required" value="<?php echo (isset($data["name"]))?$data["name"]:"" ?>">
					  
					<li><input class="champ" type="text" name="surname" placeholder="Prénom" required="required" value="<?php echo (isset($data["surname"]))?$data["surname"]:"" ?>">

					<li><input  class="champ" type="date" name="birthday" placeholder="Votre date de naissance" required="required" value="<?php echo (isset($data["birthday"]))?$data["birthday"]:"" ?>">

					<li><input class="champ" type="email" name="email" placeholder="Votre email" required="required" value="<?php echo (isset($data["email"]))?$data["email"]:"" ?>">

					<li><input class="champ" type="password" name="password" placeholder="Choisissez un mot de passe" required="required">  
					<li><input class="champ" type="password" name="password2" placeholder="Confirmez votre mot de passe" required="required">  

					

				
					  
					<li><input class="champ" type="number" name="phone" placeholder="Numéro de téléphone" value="<?php echo (isset($data["number"]))?$data["number"]:"" ?>">
					  
					<li><label><input  type="checkbox" name="legacy" required="required">En cochant cette case, je déclare avoir lu, compris et accepté les <a id="cgu-link" href="">Conditions générales d'utilisation</a> de ce site web.</label>
					    
					
					<li><input class="champ" id="bt1" type="submit" value="S'inscrire">

				</ul>

			</form>

		</section>

<?php

	require "footer.php";

?>