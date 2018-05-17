<?php
  session_start();

  require "functions.php";

  if (count($_POST) == 5
      && !empty($_POST["place_select"])
      && !empty($_POST["select_room"])
      && !empty($_POST["dateinput"])
      && !empty($_POST["timeinput"])
      && !empty($_POST["timeoutput"])
      ) {

      $db = connect_db();
      $start = $_POST["dateinput"]." ".$_POST["timeinput"];
      $end = $_POST["dateinput"]." ".$_POST["timeoutput"];

      if(new dateTime($start)< new dateTime($end)){

      $query = $db->prepare("INSERT INTO booking (id_room, begin_booking, end_booking) VALUES (:id, :begin_booking, :end_booking)");

      $query ->execute([
            "id"=>$_POST["select_room"],
            "begin_booking"=>$start,
            "end_booking"=>$end
      ]);
      $_SESSION["ok"] = "Vous avez reservez.";
      header("Location: reservation.php");
    }else{
      $_SESSION["error"] = "La date de fin est plus petite que la date de debut.";
      header("Location: reservation.php");
    }
    }else{
    //  header("Location: index.php");
    }
