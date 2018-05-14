 <?php
	require "verifAdmin.php";

	showArray($_POST);
	showArray($_SESSION);
	echo count($_POST);
	if (count($_POST) == 4
		&& !empty($_POST["id"])
		&& !empty($_POST["answer"])
		&& !empty($_POST["status"])
		&& !empty($_POST["message"])
		) {
		showArray($_POST);
	$_POST["message"] = $_POST["message"] . "\nRéponse de l'administrateur: " . $_POST["answer"];
	echo $_POST["message"];
}

	$query = $db->prepare("UPDATE tickets SET status = :status, message = :message WHERE id = :id");

			$query->execute([
					"status"=>$_POST["status"],
					"message"=>$_POST["message"],
					"id"=>$_POST["id"]
				]);

 ?>


