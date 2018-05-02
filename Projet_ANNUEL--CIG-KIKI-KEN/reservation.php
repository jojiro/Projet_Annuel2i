<?php
	require "header.php";
	require "functions.php";
?>

<div class="row">
  <div class="col-lg-12">
    <h1 id="reservation-title">Gestion des Réservations</h1>
  </div>
</div>

	<form method="POST" action="ReservationGestion.php">
    <div class="form-group">
			<br>
    <label>Les Lieux</label>
		<select class="form-control" name="place_select">
			<option value="place-default">Selectionner le lieu</option>
  	<?php
		  $db = connect_db();

		$query = $db->prepare("SELECT * FROM location");
		$query->execute();
	 $location =	$result = $query->fetchAll(PDO::FETCH_ASSOC);
		foreach ($location as $key) {
			echo '<option value="'.$key["id_location"].'">'.location_name($key["id_location"]).'</option>';
		}

		 ?>
    </select>
		<div id="print_room">
		<label for="exampleFormControlSelect1">Selectionner La Salle</label>
		<select class="form-control" name="select_room" onchange="print_room()">
			<?php
			if( isset($POST["location"])){
				$rooms = room($POST["location"]);
			}
			echo '<option value="room_default" selected="selected"> Selectionner la salle </option>';
	 		foreach ($room as $keyroom) {
	 			echo '<option value="'.$room["id_room"].'">'.$room["type_room"].' Nombre de Place : '.$room["number_places"].'</option>';
	 		}
			 ?>
		 </select>
	 </div>
    <input class="champ" id="btnsubmit" type="submit" value="Reserver">
  </form>
