<?php

require "header.php";
require "conf.inc.php" ;


try{
    $db = new PDO(
        "mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER , DB_PWD );
    }catch(Exception $e){
        //Si ca ne marche pas die
        die("Erreur SQL : ". $e->getMessage() );
    }



 ?>

 <!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
        <div class="topbar">
            <div class="topbar-inner">
                <div class="container">
                    <ul class="nav">
                        <li><a href="" title="">Connecté en tant que <?php echo $_SESSION['id_utilisateur']; ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container" style= "padding-top:60px;">
            <div class="page-header">
                <h1>Choissisez votre formule d'abonnement </h1>

                    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                        <select name="amount">
                        <?php

                            $req = $db->query('SELECT * FROM offers ');
                            while($d = $req->fetch(PDO::FETCH_ASSOC)){
                                ?>

                                <option value="<?php echo $d['price']; ?>"><?php echo $d['name']; ?> - <?php echo $d['price']; ?> € </option>
                                <?php
                            }



                         ?>
                     </select>
                        <input name="amount" type="hidden" value="75" />
                        <input name="currency_code" type="hidden" value="EUR" />
                        <input name="shipping" type="hidden" value="0.00" />
                        <input name="tax" type="hidden" value="0.00" />
                        <input name="return" type="hidden" value="http://localhost/Projet_ANNUEL--CIG-KIKI-KEN/payment_successful.php" />
                        <input name="cancel_return" type="hidden" value="http://localhost/Projet_ANNUEL--CIG-KIKI-KEN/cancel_payment.php" />
                        <input name="notify_url" type="hidden" value="http://localhost/Projet_ANNUEL--CIG-KIKI-KEN/ipn.php" />
                        <input name="cmd" type="hidden" value="_xclick" />
                        <input name="business" type="hidden" value="kenjiyoroba-facilitator@yahoo.fr" />
                        <input name="item_name" type="hidden" value="Abonnement Mensuel WorknShare" />
                        <input name="no_note" type="hidden" value="1" />
                        <input name="lc" type="hidden" value="FR" />
                        <input name="bn" type="hidden" value="PP-BuyNowBF" />
                        <input name="custom" type="hidden" value="Id_user = 1" />
                        <input type="submit" value="S'abonner" class="btn primary">
    </form>

            </div>
        </div>
        <?php

        require "footer.php";

        ?>


</body>
</html>
