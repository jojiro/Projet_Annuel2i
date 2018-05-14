<?php

require "header.php";
require "functions.php" ;
$db = connect_db();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>
  <link rel="stylesheet" href="css/style.css">
  <script language="javascript" src="js/aff_abonnement.js"></script>
</head>

<body>
  <section id="fh5co-pricing" data-section="pricing">
    <div class="fh5co-pricing">
      <div class="container">
        <div class="row">
          <div class="col-md-12 section-heading text-center">
            <h2 class="to-animate">Abonnement</h2>
          </div>
          <div class="col-md-12 section-heading text-center id="type_abonnement" ">
            <h2 class="to-animate"></h2>
          </div>

          <div class="row">
            <div class="pricing">
              <div class="col-md-4">
                <div class="price-box to-animate-2">
                  <h2 class="pricing-plan">Sans Abonnement</h2>
                  <p>Payez en fonction du temps dont vous avez réellement besoin.</p>
                  <!-- Trigger the modal with a button -->
                  <a href="#" class="btn btn-select-plan btn-sm">Choisir cet Abonnement</a>
                </div>
              </div>


              <div class="col-md-4">
                <div class="price-box to-animate-2 popular">
                  <h2 class="pricing-plan pricing-plan-offer">Abonnement Simple <span>TTC</span></h2>
                  <p> Accès open space ( sans possibilité de changer d'adresse ) Wifi , Snacking & boissons à volonté cabines téléphonique </p>
                  <!-- <a href="#" class="btn btn-select-plan btn-sm">Choisir cette formule</a>-->
                  <!-- Trigger the modal with a button -->
                  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#abonnement_simple">Choisir cette formule</button>
                </div>
              </div>

              <div class="col-md-4">
                <div class="price-box to-animate-2 popular">
                  <h2 class="pricing-plan pricing-plan-offer">Abonnement Résident<span></h2>
                    <p>Bénéficiez d'un accès ilimité 7/7j</p>

                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#abonnement_resident">Choisir cette formule</button>
                  </div>
                </div>
              </div>
            </div>

            <?php
            if (isset($_GET['type'])){
              $query = $db->prepare("SELECT name FROM subscription  WHERE email = :email ");
              $query->execute([
                "subscription" => $_GET['type'],
                "email" =>$_SESSION ["email"]
              ]);
            }
            ?>
            <?php
            if (isset($_GET['abo'] ) ){
              $query = $db->prepare("UPDATE users SET id_subscription = :id_subscription WHERE email = :email ");
              $query->execute([
                "id_subscription"=>$_GET["abo"],
                "email" => $_SESSION["email"]
              ]);
            }
            ?>

            <!-- ABONNEMENT RESIDENT -->
            <div class="modal fade" id="abonnement_resident" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Abonnement Résident</h4>
                  </div>
                  <div class="modal-body">
                    <p>Devenir membre résident sans engagement : 300€ TTC/mois</p>
                    <p> Devenir membre résident avec engagement 8 mois : 252€ TTC</p>

                    <select id="choix_engagement" class="liste">
                      <option value="Selection">Sélectionnez un choix d'engagement</option>
                      <option value="1">Sans engagement à 300€ TTC/mois</option>
                      <option value="2">Avec engagement 8mois à 252€ TTC/mois</option>

                    </select>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" onclick="valid_resid()">S'abonner</button>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                  </div>
                </div>

              </div>
            </div>






            <!--ABONNEMENT SIMPLE -->
            <div class="modal fade" id="abonnement_simple" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Abonnement Simple</h4>
                  </div>
                  <div class="modal-body">
                    <p>Devenir membre sans engagement : 24€ TTC/mois</p>
                    <p> Devenir Membre avec engagement 12 mois : 20€ TTC/mois</p>

                    <select id="choix_engagement1" class="liste1" required="required">
                      <option value="">Sélectionnez un choix d'engagement</option>
                      <option value="3">Sans engagement à 24€ TTC/mois</option>
                      <option value="4">Avec engagement à mois à 20€ TTC/mois</option>



                    </select>

                    <div id="choix_user">


                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" onclick="valid_abo()">S'abonner</button>

                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>

                </div>
              </div>

              <?php
              require "footer.php";
              ?>

              <script src="js/script.js"></script>

</body>
</html>
