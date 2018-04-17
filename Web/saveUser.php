<?php
	session_start();
	

	require "conf.inc.php";
	require "functions.php";

	//showArray($_POST);

	/* 
Array
(
    [gender] => m
    [name] => JALAL
    [surname] => Joachim
    [birthday] => 2017-01-12
    [email] => joachim.jalal@gmail.com
    [password] => a
    [password2] => a
    [country] => fr
    [phone] => 663573319
    [job] => 
    [legacy] => on
) */
	showArray($_POST);


	if (count($_POST) == 12
			&& !empty($_POST["gender"])
			&& !empty($_POST["name"])
			&& !empty($_POST["surname"])
			&& !empty($_POST["birthday"])
			&& !empty($_POST["email"])
			&& !empty($_POST["password"])
			&& !empty($_POST["password2"])
			&& !empty($_POST["country"])
			&& !empty($_POST["situation"])
			&& isset($_POST["phone"])
			&& !empty($_POST["legacy"])
			&& !empty($_POST["captcha"])
			) {

			// Se connecter à la bdd
			// mysql_connect -> nul
			// mysqli_connect -> moins nul
			// PDO -> permet de communiquer avec toutes les SGBDs

			try{
				$db = new PDO(
					"mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER , DB_PWD );
			}catch(Exception $e){
				//Si ca ne marche pas die
				die("Erreur SQL : ". $e->getMessage() );
			}

			$_POST["name"]=trim($_POST["name"]);
			$_POST["surname"]=trim($_POST["surname"]);
			$_POST["birthday"]=trim($_POST["birthday"]);
			$_POST["email"]=trim($_POST["email"]);

		$error = false;

		if (strlen($_POST["name"]) < 2 || strlen($_POST["name"]) > 50) {
			$error = true;
			$listOfErrors[] = 1;
		}
		if (strlen($_POST["surname"]) < 2 || strlen($_POST["surname"]) > 50) {
			$error = true;
			$listOfErrors[] = 2;
		}
		if (strlen($_POST["password"]) < 8 || strlen($_POST["password"]) > 25) {
			$error = true;
			$listOfErrors[] = 3;
		}
		if ($_POST["password"] != $_POST["password2"]) {
			$error = true;
			$listOfErrors[] = 4;
		}
		if (!(strlen($_POST["phone"]) == 10 && is_numeric($_POST["phone"]) || strlen($_POST["phone"]) == 0)) {
			$error = true;
			$listOfErrors[] = 5;
		}
		if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
			$error = true;
			$listOfErrors[] = 7;
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
				$listOfErrors[] = 8;
			}

		}else{
			$error = true;
			$listOfErrors[] = 9;
		}


		if(!empty($year) && !empty($month) && !empty($day) && checkdate ($month ,$day ,$year )){

			//entre 16 et 70
			$oneYear = 365*24*60*60;
			$oldTime = time()-$oneYear*70;
			$youngTime = time()-$oneYear*16;
			$birthdayTime = strtotime($year."-".$month."-".$day);

			if($birthdayTime<$oldTime || $birthdayTime>$youngTime ){
				$error = true;
				$listOfErrors[] = 10;
			}

		}else{
			$error = true;
			$listOfErrors[] = 11;
		}

		if (!array_key_exists($_POST["country"], $listOfCountry)) {
			$error = true;
			$listOfErrors[] = 12;
		}
		if (!array_key_exists($_POST["gender"], $listOfGender)) {
			$error = true;
			$listOfErrors[] = 13;
		}
		/*
		if ($_POST["captcha"] != $_SESSION["captcha"]) {
			$error = true;
			$listOfErrors[] = 14;
		}
*/
	    $query = $db->prepare("SELECT email FROM users WHERE email = :email");
	    $query->execute(["email"=>$_POST["email"]]);

	    if (!empty($query->fetch() ) ) {

	    	$error = true;
	    	$listOfErrors[] = 15;

		}

		if ($error) {
			$_SESSION["errors_form"] = $listOfErrors;
			$_SESSION["data_form"] = $_POST;
			header("Location: inscription.php");
			
		}else {
			
			//préparer la requête
			$query = $db->prepare("INSERT INTO users 
									(gender, name, surname,
									birthday, email, password, 
									country , phone) 
									VALUES 
									(:gender, :name, :surname,
									:birthday, :email, :password, 
									:country,:phone)");


			//Exectuer la requete avec les valeurs

			$pwd = password_hash($_POST["password"], PASSWORD_DEFAULT);

			$query->execute([
					"gender"=>$_POST["gender"],
					"name"=>$_POST["name"],
					"surname"=>$_POST["surname"],
					"birthday"=>$year."-".$month."-".$day,
					"email"=>$_POST["email"],
					"password"=>$pwd,
					"country"=>$_POST["country"],
					"phone"=>$_POST["phone"]
				]);

			header("Location: connexion.php");
		}



	}else {
		die("Access denied, we know who you are and where you live : ".$_SERVER["REMOTE_ADDR"]);
	}
