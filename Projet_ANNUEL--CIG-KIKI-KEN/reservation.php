<?php
require "header.php";
require "conf.inc.php";
require "functions.php";
//$datetime = $_GET['day'];

try{
  $db = new PDO(
    "mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER , DB_PWD );
}catch(Exception $e){
  //Si ca ne marche pas die
  die("Erreur SQL : ". $e->getMessage() );
}


    // liste des salles
    $req = $db->prepare("SELECT id_room, type_room FROM room ORDER BY id");

    $booking = $req->fetchall(PDO::FETCH_ASSOC);

    echo "<h3>Liste des salles</h3>";
    debug($room);

    // création d'un tableau avec en index id et en valeur le nom de la salle
     $salle = array();
     foreach($room as $v){
         $room[$v->id] = $v->type_room;
     }
    echo "<h3>Liste des salles 2</h3>";
    debug($room);

    // récupération de toutes les réservations en fonction de la date
    $req = $db->query("SELECT id_room, type_room, hour, day FROM booking WHERE day = '".$datetime."'");
    $booking = $req->fetchall(PDO::FETCH_OBJ);

    // création d'un tableau vide avec toutes les salles et toutes les heures
    $tableau_room = array();
    foreach($room as $k=>$v){
        for($h = 8; $h < 20; $h++){
            $tableau_room[$v][$h] = "libre";
        }
    }
    echo "<h3>Tableau vide</h3>";
    debug($tableau_room);


    $i = 0;
    $colspan = 0;
    // Ici on rempli le tableau $tableau_room avec les réservations récupérées dans la bdd
    foreach($reserv as $v){
        $x = $i-1;

        if($v->nom != $reserv[$x]->nom){
            $colspan = 1;
            $tableau_room[$room[$v->id_room]][$v->hour] = $v->name;
            $tableau_room[$room[$v->id_room]]['colspan'][$v->hour] = $colspan;
            $colspan = 0;
        }
        else{
            $c = 2;
            unset($tableau_room[$room[$v->id_room]][$reserv[$x]->hour]);
            $tableau_room[$room[$v->id_room]][$v->hour] = $v->name;
            $tableau_room[$room[$v->id_room]]['colspan'][$v->hour] = $c+$colspan;
            $colspan++;
        }


    $i++;
    }
    $tab = $tableau_room;
    echo "<h3>Tableau final</h3>";
    debug($tab);
?>

<<<<<<< HEAD




    <h1>RESERVATION SALLES</h1>
    <table>
        <tr>
            <th colspan="14"><?php echo $_GET['day']; ?></th>
        </tr>
        <tr>
            <th>HEURES</th>
            <?php
                for($i = 8; $i < 21; $i++){
                ?>
                    <th><?php echo $i; ?></th>
                <?php
                }
            ?>
        </tr>
        <?php
            $j = 1;
            foreach($tab as $k=>$v){
            ?>
                <tr>
                    <th><?php echo $k; ?></th>
                    <?php
                        for($i = 8; $i < 18; $i++){
                            if($v[$i]){
                                if($v[$i] == "libre"){
                                ?>
                                    <td class="libre">

                                    </td>
                                <?php
                                }else{
                                ?>
                                    <td colspan="<?php echo $v['colspan'][$i]; ?>" class="reserv">
                                        <?php echo $v[$i]; ?>
                                    </td>
                                <?php
                                }
                            }
                        }
                    ?>
                </tr>
            <?php
            $j++;
            }
        ?>
    </table>


</section>
=======
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
>>>>>>> parent of c1af762... DEBUG XML , RESERVATION AVANCEMENT et BDD UPDATE
