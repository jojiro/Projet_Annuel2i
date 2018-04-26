 <?php
	require "verifAdmin.php";

	showArray($_POST);

	if (count($_POST) == 3

		&& !empty($_POST["id"])
		&& !empty($_POST["password"])
		&& !empty($_POST["password2"])

		) {

		echo 'ok post';

	    if (!empty($_POST["userId"])) {
	        $userId = $_POST["userId"];
	    }

	    if (isset($_SESSION["userId"])) {
	        $userId = $_SESSION["userId"];
	    }

		$error = false;

		if (strlen($_POST["password"]) < 8 || strlen($_POST["password"]) > 25) {
			$error = true;
			$listOfErrorsModif[] = 11;
			echo '11 ';
		}

		if ($_POST["password"] != $_POST["password2"]) {
			$error = true;
			$listOfErrorsModif[] = 12;
			echo '12 ';
		}

		if ($error) {
			$_SESSION["errors_modif"] = $listOfErrorsModif;
			$_SESSION["userId"] = $userId;
			header("Location: editPassword.php");


		} else {
			
			$now = date('Y-m-d H:i:s');

			$pwd = password_hash($_POST["password"], PASSWORD_DEFAULT);

			$query = $db->prepare("UPDATE users SET password = :password, date_updated = :date_updated WHERE id = :id");

			$query->execute([
				"password"=>$pwd,
				"date_updated"=>$now,
				"id"=>$userId
			]);

			header("Location: editUser.php");

		}


	} else {
		header("Location: editPassword.php");
	}