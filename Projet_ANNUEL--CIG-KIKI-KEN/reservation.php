  <?php
  	require "header.php";
  	require "functions.php";
  ?>

  <div class="row">
    <div class="col-lg-12">
    </div>
  </div>
<div style="margin:80px;">
  <h1 id="reservation-title">Gestion des Réservations</h1>

  	<form method="POST" action="ReservationGestion.php">
      <div class="form-group">
  			<br>

  	<!-- LIEUX -->
      <label>Les Lieux</label>
  		<select class="form-control" name="place_select" required="required" onchange="printf_room()">
  			<option value="">Selectionner le lieu</option>
    	<?php
  		$db = connect_db();

  		$query = $db->prepare("SELECT * FROM location");
  		$query->execute();
  	  $location = $query->fetchAll(PDO::FETCH_ASSOC);
  		foreach ($location as $key) {
  			echo '<option value="'.$key["id_location"].'">'.location_name($key["id_location"]).'</option>';
  		}
  		 ?>
      </select>
  <!-- -->

  	<!-- SALLE -->
  		<div id="print_room">
  		<label for="exampleFormControlSelect1">Selectionner La Salle</label>
  		<select class="form-control" name="select_room">
  			<?php

        $rooms = room(1); // test
  			echo '<option value="room_default" selected="selected"> Selectionner la salle </option>';
  	 		foreach ($rooms as $keyroom) {
  	 			echo '<option value="'.$keyroom["id_room"].'">'.$keyroom["type_room"].'</option>';
  	 		}
  			 ?>
  		 </select>
  	<!-- -->

  	<!-- HORAIRES -->
    <label for="exampleFormControlSelect1">Selectionner Les horaires</label>
  		 <select class="form-control" name="select_hour" onchange="print_hour()">
         	<option value="place-default">Selectionner horaires</option>
  			 <?php
  			 if( isset($POST["room"])){

  			 }


  			  ?>
  			</select>
  	<!-- -->
  	 </div>
      <input class="champ" id="btnsubmit" type="submit" value="Reserver">
    </form>
</div>
<script src="function.js"></script>
