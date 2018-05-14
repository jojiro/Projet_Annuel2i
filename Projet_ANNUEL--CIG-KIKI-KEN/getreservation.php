<?php
require "functions.php";

$db = connect_db();

if(isset($_GET["location"])){
  	$query = $db->prepare("SELECT * FROM room WHERE id_location=:location");
    $query->execute(["location" => $_GET['location']]);
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
  }
