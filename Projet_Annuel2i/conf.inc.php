<?php

	define("DB_HOST", "localhost");
	define("DB_NAME", "worknshare");
	define("DB_USER", "root");
	define("DB_PWD",  "");




	$listOfErrorsMsg = [
			1=>"Le nom doit faire entre 2 et 50 caractères",
			2=>"Le prénom doit faire entre 2 et 50 caractères",
			3=>"Le mot de passe  doit faire entre 8 et 25 caractères",
			4=>"Le mot de passe de confirmation ne correspond pas",
			5=>"Le format du numéro n'est pas correct",
			6=>"Le métier  doit faire entre 3 et 50 caractères",
			7=>"L'email n'est pas valide",
			8=>"Le format de date n'est pas correct",
			9=>"Le format de date doit faire 10 caractères",
			10=>"Vous devez avoir entre 16 et 70 ans",
			11=>"La date de naissance n'est pas valide",
			12=>"Le pays ne correspond pas",
			13=>"Le genre ne correspond pas",
			14=>"Le captcha n'est pas correct",
			15=>"La taille de l'image est trop grosse",
			16=>"Les extension autorisées sont jpeg jpg et png",
			17=>"Il y a eu une erreur lors de l'importation",
			18=>"L'email saissie n'existe pas ",
			18=>"L'email saissie est deja utilisée"
	];
