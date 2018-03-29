 <?php
	require "verifAdmin.php";

	$query = $db->prepare("UPDATE users SET avatar = :avatar WHERE id = :id");

	$query->execute([
		"avatar"=>"image-profil.png",
		"id"=>$_SESSION["userId"]
	]);

	header("Location: editAdmin.php");