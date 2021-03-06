<?php
require "conf.inc.php";

function connect_db(){

	try{
			$db = new PDO(
					"mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER , DB_PWD );
			}catch(Exception $e){
					//Si ca ne marche pas die
					die("Erreur SQL : ". $e->getMessage() );
			}
			return $db;
}

function showArray($array){
	echo "<pre>";
	print_r($array);
	echo "</pre>";
}

function location_name($id){
	$db = connect_db();

	$query = $db->prepare("SELECT town FROM location WHERE id_location =:id_location");
	$query->bindparam('id_location',$id);

	$query->execute();
	$result = $query->fetch(PDO::FETCH_ASSOC);

	return $result["town"];
}
