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
        <label for="exampleFormControlSelect1">Selectionner la Salle</label>
        <select class="form-control" name="select_room">
          <?php
           echo '<option value="room_default" selected="selected"> Selectionner la salle </option>';
          // AJAX
          ?>
        </select>
        <!-- -->

        <!-- HORAIRES -->
        <label for="exampleFormControlSelect1">Selectionner la plage horaire</label>
        <div class="input-append date form_datetime">
          <?php
          $now = date("Y-m-d");
          ?>
          <input size="16" type="date" value="" name="dateinput" min="<?php echo $now;?>">
          <br>
          debut : <input size="16" type="time" value="" name="timeinput">
          fin : <input size="16" type="time" value="" name="timeoutput">
          <?php
          if(isset($_SESSION["error"])){
            echo "<div style='color:red;'>";
            echo $_SESSION["error"];
            echo "</div>";
            unset($_SESSION["error"]);
          }
            if(isset($_SESSION["ok"])){
                echo "<br>";
                echo $_SESSION["ok"];
                unset($_SESSION["ok"]);
            }
           ?>
        <!-- -->
      </div>
      <input class="champ" id="btnsubmit" type="submit" value="Reserver">
    </form>
  </div>
</div>
  <script src="function.js"></script>
  <?php
  require "footer.php";
  ?>
