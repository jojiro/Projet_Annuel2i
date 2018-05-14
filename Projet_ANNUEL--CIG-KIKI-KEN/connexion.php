<?php

require "header.php";
require "functions.php";


if (isset($_POST['email']) && isset ($_POST['password'])) {
  $db = connect_db();
  /* REQUETE VERIFIER SI DONNEES SONT CORRECTES */
  /* 1 - RECUPERER DONNES EN FONCTION DE L'EMAIL : COUNT(champ à vérifier en bdd)*/
  $query = $db->prepare("SELECT email,password,is_admin FROM users WHERE email = :email");
  $query->execute([ "email"=>$_POST["email"],
  ] );
  $result =$query->fetch(PDO::FETCH_ASSOC);
  if (!password_verify($_POST["password"], $result["password"])){
    unset($_SESSION);
    header("Location: index.php");
  }

  if (isset($result) && !empty($result)) {
    $_SESSION['id_utilisateur'] = $_POST["email"];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['is_admin'] =   $result["is_admin"];
    header("Location: index.php");
  }
}
?>

<section id="contact-block">

  <div class="row">
    <div class="col-lg-12">
      <h1 id="contact-signup-title">Connexion</h1>
      <br><br>
    </div>
  </div>


  <section>
    <form method="post" action="connexion.php" style="margin:50px;">
      <input class="champ" type="email" name="email" placeholder="Votre email" required="required"><br>
      <input class="champ" type="password" name="password" placeholder="Votre mot de passe" required="required"><br>
      <input class="champ" id="bt5" type="submit" value="Se connecter" style="margin-bottom:50px;">
    </form>
  </section>
  <?php
  require "footer.php";
  ?>
  </html>
