<?php
    session_start();
    $_SESSION["test"] = "test";

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

                    $query = $db->prepare('SELECT * FROM offers WHERE price = :price');
                    $query->execute([
                        "price" => $payment_amount
                    ]);

                    $d = $query->fetch(PDO::FETCH_ASSOC);

                    if(!empty($d)) {

                        $duration = $d['duration'];
                        $uid = $custom['Id_user'];

                        $now = date("Y-m-d H:i:s");

                        echo date("Y-m-d H:i:s", strtotime($now.' + '.$duration.'  month'));

                        // MAJ date d'expiration
                        $query = $db->prepare("UPDATE users SET expiration = :expiration WHERE id = :id");
                        $query->execute([
                            "expiration"=> date("Y-m-d H:i:s", strtotime($now.' + '.$duration.'  month')) ,
                            "id" => $uid
                        ]);
                        // On sauvegarde la commande

                        $query = $db->prepare("INSERT INTO subscription(user_id , amount) VALUES (:user_id, :amount)");
                        $query->execute([
                            "user_id"=> $uid ,
                            "amount" => $payment_amount
                        ]);

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
