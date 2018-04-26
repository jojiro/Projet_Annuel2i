 <?php
	require "verifAdmin.php";

	showArray($_POST);

	if (count($_POST) == 10
		&& !empty($_POST["id"])
		&& !empty($_POST["gender"])
		&& !empty($_POST["name"])
		&& !empty($_POST["surname"])
		&& !empty($_POST["email"])
		&& !empty($_POST["birthday"])
		&& !empty($_POST["country"])
		&& isset($_POST["phone"])
		&& isset($_POST["is_deleted"])
		&& isset($_POST["is_admin"])
		) {

		// Se connecter à la bdd
		// mysql_connect -> nul
		// mysqli_connect -> moins nul
		// PDO -> permet de communiquer avec toutes les SGBDs

		$_POST["name"]=trim($_POST["name"]);
		$_POST["surname"]=trim($_POST["surname"]);
		$_POST["birthday"]=trim($_POST["birthday"]);
		$_POST["email"]=trim($_POST["email"]);

		$error = false;


		if (strlen($_POST["name"]) < 2 || strlen($_POST["name"]) > 50) {
			$error = true;
			$listOfErrorsModif[] = 1;
			echo '1 ';
		}
		if (strlen($_POST["surname"]) < 2 || strlen($_POST["surname"]) > 50) {
			$error = true;
			$listOfErrorsModif[] = 2;
			echo '2 ';
		}

		if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
			$error = true;
			$listOfErrorsModif[] = 3;
			echo '3 ';
		}		

		if(strlen($_POST["birthday"])==10 ){

			if(substr_count ( $_POST["birthday"] , "-") == 2){
				$arrayBirthday = explode("-", $_POST["birthday"]);

				$year = $arrayBirthday[0];
				$month = $arrayBirthday[1];
				$day = $arrayBirthday[2];

			}else if(substr_count ( $_POST["birthday"] , "/") == 2){
				$arrayBirthday = explode("/", $_POST["birthday"]);

				$year = $arrayBirthday[2];
				$month = $arrayBirthday[1];
				$day = $arrayBirthday[0];
				
			}else{
				$error = true;
				$listOfErrorsModif[] = 4;
				echo '4 ';
			}

		}else{
			$error = true;
			$listOfErrorsModif[] = 5;
			echo '5 ';
		}


		if(!empty($year) && !empty($month) && !empty($day) && checkdate ($month ,$day ,$year )){

			//entre 16 et 70
			$oneYear = 365*24*60*60;
			$oldTime = time()-$oneYear*70;
			$youngTime = time()-$oneYear*16;
			$birthdayTime = strtotime($year."-".$month."-".$day);

			if($birthdayTime<$oldTime || $birthdayTime>$youngTime ){
				$error = true;
				$listOfErrorsModif[] = 6;
				echo '6 ';
			}

		}else{
			$error = true;
			$listOfErrorsModif[] = 7;
			echo '7 ';
		}

		if (!(strlen($_POST["phone"]) == 10 && is_numeric($_POST["phone"]) || strlen($_POST["phone"]) == 0)) {
			$error = true;
			$listOfErrorsModif[] = 8;
			echo '8 ';
		}

		if (!array_key_exists($_POST["country"], $listOfCountry)) {
			$error = true;
			$listOfErrorsModif[] = 9;
			echo '9 ';
		}
		if (!array_key_exists($_POST["gender"], $listOfGender)) {
			$error = true;
			$listOfErrorsModif[] = 10;
			echo '10 ';
		}

		if ($error) {
			$_SESSION["errors_modif"] = $listOfErrorsModif;
			$_SESSION["userId"] = $_POST["id"];
			header("Location: editUser.php");
		}else {
			
			$now = date('Y-m-d H:i:s');

			$query = $db->prepare("UPDATE users SET gender = :gender, name = :name, surname = :surname, email = :email, birthday = :birthday, country = :country, phone = :phone, date_updated = :date_updated, is_deleted = :is_deleted, is_admin = :is_admin WHERE id = :id");

			$query->execute([
					"gender"=>$_POST["gender"],
					"name"=>strtoupper($_POST["name"]),
					"surname"=>ucfirst($_POST["surname"]),
					"email"=>$_POST["email"],
					"birthday"=>$year."-".$month."-".$day,
					"country"=>$_POST["country"],
					"phone"=>$_POST["phone"],
					"date_updated"=>$now,
					"is_deleted"=>$_POST["is_deleted"],
					"is_admin"=>$_POST["is_admin"],
					"id"=>$_POST["id"]
				]);

			unset($_SESSION["userId"]);
			header("Location: users.php");
		}



	}else {
		die("Access denied, we know who you are and where you live : ".$_SERVER["REMOTE_ADDR"]);
	}
