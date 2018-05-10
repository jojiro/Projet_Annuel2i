<?php
try{
  $db = new PDO(
    "mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER , DB_PWD );
}catch(Exception $e){
  //Si ca ne marche pas die
  die("Erreur SQL : ". $e->getMessage() );
}
 ?>
