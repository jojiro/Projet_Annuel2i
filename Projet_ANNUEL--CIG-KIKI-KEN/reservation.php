<?php
session_start();

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
    $req = $db->query("SELECT id_room, type_room FROM room ORDER BY id");
    $booking = $req->fetchall(PDO::FETCH_ASSOC);

    echo "<h3>Liste des salles</h3>";
    debug($room);

    // création d'un tableau avec en index id et en valeur le nom de la salle
     $salle = array();
     foreach($room as $v){
         $room[$v->id] = $v->name;
     }
    echo "<h3>Liste des salles 2</h3>";
    debug($room);

    // récupération de toutes les réservations en fonction de la date
    $req = $db->query("SELECT id_room, type_room, hour, day FROM booking WHERE day = '".$datetime."'");
    $booking = $req->fetchall(PDO::FETCH_OBJ);

    // création d'un tableau vide avec toutes les salles et toutes les heures
    $tableau_room = array();
    foreach($salle as $k=>$v){
        for($h = 8; $h < 18; $h++){
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





    <h1>RESERVATION SALLES</h1>
    <table>
        <tr>
            <th colspan="14"><?php echo $_GET['day']; ?></th>
        </tr>
        <tr>
            <th>HEURES</th>
            <?php
                for($i = 8; $i < 18; $i++){
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
