<?php
	session_start();
	require"conf.inc.php"

	


?>


<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="../css/style.css" />
<link href="https://fonts.googleapis.com/css?family=Scada" rel="stylesheet">

</head>
<body>









<form name="annonce" method="post" action="ajout_point.php">

<br>
<br>
<br><br>
<center>
<b><p id="titre_page_admin">INSERTION D'UNE ANNONCE POUR LA LOCATION</p><b>






<input class="champ_admin" type="number" name="longitude" placeholder="longitude" required="required" step="any">
<br>
<input class="champ_admin" type="number" name="latitude" placeholder="latitude" required="required" step="any">
<br>
<input class="champ_admin" type="text" name="titre" placeholder="Titre annonce" required="required">
<br>
<input class="champ_admin" type="text" name="adress" placeholder="adress" required="required">
<br>
<textarea id="champ_text" type="text"   name="description" placeholder="description" required="required"></textarea>

<i><p id="min_caractere">Maximun 350 caracteres</p></i>


<input class="champ_admin" type="number" name="prix" placeholder="prix" required="required">
<br>
<input class="champ_admin" type="text" name="image" placeholder="nom de l'image" required="required">
<br>
<input class="champ_admin" type="number" name="chambre" placeholder="nombre de chambre" required="required">
<br>
<input class="champ_admin" type="number" name="voyageur" placeholder="nombre de voyageur" required="required">
<br>
<input class="champ_admin" type="number" name="lit" placeholder="nombre de lit" required="required">
<br>
<input class="champ_admin" type="number" name="parking" placeholder="nombre de place de parking" required="required">
<br>
<input class="champ_admin" type="number" name="bain" placeholder="nombre de salle de bain" required="required">
<br>
<input class="champ_admin" type="mail" name="mail" placeholder="E-mail" required="required">
<br>
<input class="champ_admin" type="number" name="tel" placeholder="Numero de telephone" required="required">
<br>
<input class="champ_admin" type="submit" value="envoyer">
</center>
<br>





<?php

	
	


try{
				$db = new PDO(
					"mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER , DB_PWD );
			}catch(Exception $e){
				//Si ca ne marche pas die
				die("Erreur SQL : ". $e->getMessage() );
			}





			if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
			$supprime = (int) $_GET['supprime'];
			$req = $db->prepare('DELETE FROM listeDesPoints WHERE id = ?');
			$req -> execute(array($supprime));
}



			$result = $db -> query("SELECT * FROM listeDesPoints order by id");

?>


<center><p id="titre_page_admin">Nos Annonces présente sur notre site</p></center>

<center><table border="1"><tr><th class="id">id</th><th class="titre">titre</th><th class="adress_tab">adress</th><th class="prix">prix</th><th>Supprimer</th></tr></table></center>
<?php




while ($row = $result -> fetch()) {




            echo "<center><table border='1'><tr><td class='id'>".$row['id']."</td><td class='titre'>".$row['titre']."</td><td  class='adress'>".$row['adress']."</td><td>".$row['prix']."</td><td><a href='page_admin.php?type=listeDesPoints&supprime=" .$row['id']. "'>Supprimer</a></td></tr></table></center>";



     } 
?>

	




</body>
</html>