<?php

require "header.php";
require "conf.inc.php" ;


try{
    $db = new PDO(
        "mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER , DB_PWD );
    }catch(Exception $e){
        //Si ca ne marche pas die
        die("Erreur SQL : ". $e->getMessage() );
    }



 ?>

 <!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
        <div class="topbar">
            <div class="topbar-inner">
                <div class="container">
                    <ul class="nav">
                        <li><a href="" title="">Connecté en tant que <?php echo $_SESSION['id_utilisateur']; ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container" style= "padding-top:60px;">
            <div class="page-header">
                <h1>Felicitations le paiement pour votre abonnement a été validé </h1>



            </div>
        </div>


</body>
</html>
