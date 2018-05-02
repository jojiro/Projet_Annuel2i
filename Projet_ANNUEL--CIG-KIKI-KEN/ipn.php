<?php

if(isset($_POST)){
    //permet de traiter le retour ipn de paypal
    $email_account = "kenjiyoroba-facilitator@yahoo.fr";
    $req = 'cmd=_notify-validate';
    foreach ($_POST as $key => $value) {
        $value = urlencode(stripslashes($value));
        $req .= "&$key=$value";
    }
    // Vérification que le paiement a été effectué

    $header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
    $header .= "Host: www.sandbox.paypal.com\r\n";
    $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
    $header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
    $fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);
    $item_name = $_POST['item_name'] ;
    $item_number = $_POST['item_number'];
    $payment_status = $_POST['payment_status'];
    $payment_amount = $_POST['mc_gross'];
    $payment_currency = $_POST['mc_currency'];
    $txn_id = $_POST['txn_id'];
    $receiver_email = $_POST['receiver_email'];
    $payer_email = $_POST['payer_email'];
    parse_str($_POST['custom'],$custom);   // récupérer les informations du champ custom
    if (!$fp) {
    } else {
    fputs ($fp, $header . $req);
     if(!feof($fp)){
        $res = fgets ($fp, 1024);
        if (strcmp ($res, "VERIFIED") == 0) {
            // vérifier que payment_status a la valeur Completed
            if ( $payment_status == "Completed") {
                   if ( $email_account == $receiver_email) {

                       file_put_contents('log', print_r($_POST,true));

                    $db = new PDO("mysql:host=localhost;dbname=worknshare", "root","");
                    $req = $db->query('SELECT * FROM offers WHERE price='.$payment_amount.' LIMIT 1 ');
                    $d =$req->fetch(PDO::FETCH_ASSOC);
                    if(!empty($d)) {

                    $duration = $d['duration'];
                    $uid = $custom['Id_user'];
                    // MAJ date d'expiration
                    $db->query('UPDATE users SET expiration = DATE_ADD(NOW()) ,INTERVAL'.$duration.' MONTH) WHERE id ='.$uid.')');

                    // On sauvegarde la commande

                    $db->query("INSERT INTO subscription SET user_id= $uid, amount=$payment_amount, created= NOW() ");

                        file_put_contents('log', 'Le paiment a bien été confirmé');


                    }else{

                        file_put_contents('log', 'Le paiment ne correspond à aucune offre');
                    }

                   }
            }
            else {
                    // Statut de paiement: Echec
            }
            exit();
       }
        else if (strcmp ($res, "INVALID") == 0) {
    		// Transaction invalide
        }
    }
    fclose ($fp);
    }
}
