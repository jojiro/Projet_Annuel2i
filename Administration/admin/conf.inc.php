<?php

	define("DB_NAME", "worknshare");
	define("DB_HOST", "localhost");
	define("DB_USER", "root");
	define("DB_PWD", "");

	


	$listOfCountry = [
						"AFG"=> "Afghanistan",
						"ZAD"=> "Afrique du Sud",
						"ALB"=> "Albanie",
						"DZA"=> "Algerie",
						"DEU"=> "Allemagne",
						"AND"=> "Andorre",
						"AGO"=> "Angola",
						"SAU"=> "Arabie Saoudite",
						"ARG"=> "Argentine",
						"ARM"=> "Armenie",
						"AUS"=> "Australie",
						"AUT"=> "Autriche",
						"AZE"=> "Azerbaidjan",
						"BHS"=> "Bahamas",
						"BGD"=> "Bangladesh",
						"BRB"=> "Barbade",
						"BHR"=> "Bahrein",
						"BEL"=> "Belgique",
						"BLZ"=> "Belize",
						"BEN"=> "Benin",
						"BLR"=> "Bielorussie",
						"BOL"=> "Bolivie",
						"BOT"=> "Botswana",
						"BTN"=> "Bhoutan",
						"BIH"=> "Boznie Herzegovine",
						"BRA"=> "Bresil",
						"BRN"=> "Brunei",
						"BGR"=> "Bulgarie",
						"BFA"=> "Burkina Faso",
						"BDI"=> "Burundi",
						"KHM"=> "Cambodge",
						"CMR"=> "Cameroun",
						"CAN"=> "Canada",
						"CPV"=> "Cap vert",
						"CHL"=> "Chili",
						"CHN"=> "Chine",
						"CYP"=> "Chypre",
						"COL"=> "Colombie",
						"COG"=> "Congo",
						"COD"=> "Congo democratique",
						"PRK"=> "Coree du Nord",
						"KOR"=> "Coree du Sud",
						"CRI"=> "Costa Rica",
						"CIV"=> "Cote d'Ivoire",
						"HRV"=> "Croatie",
						"CUB"=> "Cuba",
						"DNK"=> "Danemark",
						"DJI"=> "Djibouti",
						"DMA"=> "Dominique",
						"EGY"=> "Egypte",
						"ARE"=> "Emirats Arabes Unis",
						"ECU"=> "Equateur",
						"ERI"=> "Erythree",
						"ESP"=> "Espagne",
						"EST"=> "Estonie",
						"usa"=> "États Unis",
						"ETH"=> "Éthiopie",
						"FJI"=> "Fidji",
						"FIN"=> "Finlande",
						"FRA"=> "France",
						"GAB"=> "Gabon",
						"GMB"=> "Gambie",
						"GEO"=> "Georgie",
						"GHA"=> "Ghana",
						"GRC"=> "Grece",
						"GRD"=> "Grenade",
						"GTM"=> "Guatemala",
						"GIN"=> "Guinee",
						"GNB"=> "Guinee Bissau",
						"GNQ"=> "Guinee equatoriale",
						"GUY"=> "Guyana",
						"HTI"=> "Haiti",
						"HND"=> "Honduras",
						"HUN"=> "Hongrie",
						"MNP"=> "Îles Mariannes du Nord",
						"MHL"=> "Îles Marshall",
						"IND"=> "Inde",
						"IDN"=> "Indonesie",
						"IRN"=> "Iran",
						"IRQ"=> "Iraq",
						"IRL"=> "Irlande",
						"ISL"=> "Islande",
						"ISR"=> "Israel",
						"ITA"=> "Italie",
						"JAM"=> "Jamaique",
						"JPN"=> "Japon",
						"JOR"=> "Jordanie",
						"KAZ"=> "Kazakhstan",
						"KEN"=> "Kenya",
						"KGZ"=> "Kirghizstan",
						"KIR"=> "Kiribati",
						"KWT"=> "Koweit",
						"LAO"=> "Laos",
						"LSO"=> "Lesotho",
						"LVA"=> "Lettonie",
						"LBN"=> "Liban",
						"LBR"=> "Liberia",
						"LIE"=> "Liechtenstein",
						"LTU"=> "Lituanie",
						"LUX"=> "Luxembourg",
						"LBY"=> "Lybie",
						"MDG"=> "Madagascar",
						"MYS"=> "Malaisie",
						"MWI"=> "Malawi",
						"MDV"=> "Maldives",
						"MLI"=> "Mali",
						"MLT"=> "Malte",
						"MAR"=> "Maroc",
						"MUS"=> "Maurice",
						"MRT"=> "Mauritanie",
						"MEX"=> "Mexique",
						"FSM"=> "Micronésie",
						"MCO"=> "Monaco",
						"MNG"=> "Mongolie",
						"MOZ"=> "Mozambique",
						"NAM"=> "Namibie",
						"NRU"=> "Nauru",
						"NPL"=> "Népal",
						"NIC"=> "Nicaragua",
						"NER"=> "Niger",
						"NGA"=> "Nigeria",
						"NOR"=> "Norvège",
						"NZL"=> "Nouvelle-Zélande",
						"OMN"=> "Oman",
						"UGA"=> "Ouganda",
						"UBZ"=> "Ouzbekistan",
						"PAK"=> "Pakistan",
						"PAN"=> "Panama",
						"PNG"=> "Papouasie-Nouvelle-Guinee",
						"PRY"=> "Paraguay",
						"NLD"=> "Pays-Bas",
						"PER"=> "Pérou",
						"PHL"=> "Philippines",
						"POL"=> "Pologne",
						"PRI"=> "Porto Rico",
						"POT"=> "Portugal",
						"QAT"=> "Qatar",
						"MDA"=> "République de Moldavie",
						"DOM"=> "République Dominicaine",
						"CZE"=> "République Tchèque",
						"ROU"=> "Roumanie",
						"GBR"=> "Royaume-Uni",
						"RUS"=> "Russie",
						"RWA"=> "Rwanda",
						"LCA"=> "Sainte-Lucie",
						"SMR"=> "Saint-Marin",
						"SLB"=> "Salomon",
						"SLV"=> "Salvador",
						"WSM"=> "Samoa",
						"STP"=> "Sao Tomé-et-Principe",
						"SEN"=> "Sénégal",
						"SYC"=> "Seychelles",
						"SLE"=> "Sierra Leone",
						"SGP"=> "Singapour",
						"SVK"=> "Slovaquie",
						"SVN"=> "Slovénie",
						"SOM"=> "Somalie",
						"SDN"=> "Soudan",
						"LKA"=> "Sri Lanka",
						"SWE"=> "Suède",
						"CHE"=> "Suisse",
						"SUR"=> "Suriname",
						"SWZ"=> "Swaziland",
						"SYR"=> "Syrie",
						"TJK"=> "Tadjikistan",
						"TWN"=> "Taïwan",
						"TON"=> "Tonga",
						"TZN"=> "Tanzanie",
						"TCD"=> "Tchad",
						"THA"=> "Thaïlande",
						"TLS"=> "Timor Oriental",
						"TGO"=> "Togo",
						"TTO"=> "Trinité-et-Tobago",
						"TUN"=> "Tunisie",
						"TKM"=> "Turkmenistan",
						"TUR"=> "Turquie",
						"UKR"=> "Ukraine",
						"URY"=> "Uruguay",
						"vut"=> "Vanuatu",
						"VAT"=> "Vatican",
						"VEN"=> "Venezuela",
						"VNM"=> "Vietnam",
						"YEM"=> "Yemen",
						"ZMB"=> "Zambie",
						"ZWE"=> "Zimbabwe"
					];

	$listOfGender = [
						"m"=> "Mr",
						"w"=> "Mme",
						"g"=> "Mlle",
						"o"=> "Autre"
					];

	$listOfSituation = [
						"l"=> "Locataire",
						"p"=> "Propriétaire",
						"o"=> "Autre"
					];


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


	$listOfErrorsModifMsg = [
			1=>"Le nom doit faire entre 2 et 50 caractères",
			2=>"Le prénom doit faire entre 2 et 50 caractères",
			3=>"L'email n'est pas valide",
			4=>"Le format de date n'est pas correct",
			5=>"Le format de date doit faire 10 caractères",
			6=>"Vous devez avoir entre 16 et 70 ans",
			7=>"La date de naissance n'est pas valide",
			8=>"Le format du numéro n'est pas correct",
			9=>"Le pays ne correspond pas",
			10=>"Le genre ne correspond pas",
			11=>"Le mot de passe doit faire entre 8 et 25 caractères",
			12=>"Les mots de passe ne correspondent pas"
	];

$listOfErrorsAnnounce = [


		1=>"Erreur le titre doit faire entre 5 et 30 caractères",
		2=>"La ville doit avoir au minimun entre 2 et 30 caractères",
		3=>"Le code postal est incorrect",
		4=>"Le numero est incorrect",
		5=>"L'email n'est pas valide",
		6=>"Votre message ne doit pas depasser 350 caracteres",
		7=>"Le nombre de voyageurs doit être superieur à 0 ",
		8=>"Le nombre de salles de bain doit être superieur à 0 ",
		9=>"Le nombre de lit doit être superieur à 0 ",
		10=>"Le parking saisie doit être un nombre ",
		11=>"Le nombre de chambre doit être superieur à 0 ",
		12=>"Votre message ne doit pas depasser 350 characteres et avoir au minimun 10 caracteres"


	];









