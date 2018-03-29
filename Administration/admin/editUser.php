<?php
    require "header-admin.php";
?>

    <section id="page-section">
        <h1 id="page-title">Utilisateurs</h1>

        <hr>

        <div class="container">
            <form method="POST" action="modifUser.php" class="form-horizontal" role="form">
                <h2>Modification des informations</h2>


                <?php

                 if (!empty($_POST["userId"])) {
                        $userId = $_POST["userId"];
                    }

                    if (isset($_SESSION["userId"])) {
                        $userId = $_SESSION["userId"];
                    }

                    if (isset($_SESSION["errors_modif"])) {

                        echo '<center><ul class="display-errors-modif">';
                        foreach ($_SESSION["errors_modif"] as $error) {
                            echo "<li>".$listOfErrorsModifMsg[$error];
                        }
                        echo "</ul></center>";

                        unset($_SESSION["errors_modif"]);
                    }

                    $_SESSION["userId"] = $userId;

                    $user = $db -> prepare('SELECT * FROM users WHERE id=:userId');
                    $user -> execute(["userId" => $userId]);
                    $user = $user -> fetch(PDO::FETCH_ASSOC);

                    if (empty($user)) {
                        header('Location: users.php');
                    }

                ?>
                <div class="form-group">
                    <label for="image" class="col-sm-3 control-label modif-user-label">Image de profil</label>
                    <div class="col-sm-9" style="text-align: center;">
                        <img id="image" class="modif-user-avatar" src="../../img/<?php echo $user["avatar"];?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label modif-user-label"></label>
                    <div class="col-sm-9">
                        <a href="deleteUserAvatar.php" class="btn btn-warning btn-block">Supprimer l'image</a>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label modif-user-label">ID</label>
                    <div class="col-sm-9">
                        <input type="text" id="id" placeholder="ID" class="form-control" value="<?php echo $user["id"];?>" disabled autofocus>
                        <input type="hidden" name="id" value="<?php echo $user["id"];?>">
                    </div>
                </div>

                <div class="form-group">
                  <label for="gender" class="control-label col-sm-3 custom-control custom-radio modif-user-label">Sexe</label>
                    <div class="col-sm-9">
                        <?php
                        foreach ($listOfGender as $key => $value) {
                            if ($key == $user["gender"]) {
                            echo '<label>'.$value.' -> <input type="radio" name="gender" value="'.$key.'" checked></label><br>';
                            }
                            else {
                                echo '<label>'.$value.' -> <input type="radio" name="gender" value="'.$key.'"></label><br>';
                            }
                        }   
                    ?>  
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label modif-user-label">Nom</label>
                    <div class="col-sm-9">
                        <input type="text" id="name" name="name" placeholder="Nom" class="form-control" value="<?php echo $user["name"];?>" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="surname" class="col-sm-3 control-label modif-user-label">Prénom</label>
                    <div class="col-sm-9">
                        <input type="text" id="surname" name="surname" placeholder="Prénom" class="form-control" value="<?php echo $user["surname"];?>" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label modif-user-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" id="email" name="email" placeholder="Email" class="form-control" value="<?php echo $user["email"];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label modif-user-label">Mot de passe</label>
                    <div class="col-sm-9">
                        <a href="editPassword.php" class="btn btn-warning btn-block">Changer le mot de passe</a>
                    </div>
                </div>
                <div class="form-group">
                    <label for="birthdate" class="col-sm-3 control-label modif-user-label">Date de naissance</label>
                    <div class="col-sm-9">
                        <input type="date" id="birthday" name="birthday" class="form-control" value="<?php echo $user["birthday"];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="country" class="col-sm-3 control-label modif-user-label">Pays</label>
                    <div class="col-sm-9">
                        <select id="country" name="country" class="form-control">
                            <?php
                                foreach ($listOfCountry as $key => $value) {
                                    if ($key == $user["country"]) {
                                        echo "<option value=\"".$key."\"selected>".$value."</option>";
                                    }else {
                                        echo "<option value=\"".$key."\">".$value."</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div> <!-- /.form-group -->

                <div class="form-group">
                    <label for="phone" class="col-sm-3 control-label modif-user-label">Téléphone</label>
                    <div class="col-sm-9">
                        <input type="number" id="phone" name="phone" placeholder="Numéro de téléphone" class="form-control" value="<?php echo $user["phone"];?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="situation" class="control-label col-sm-3 modif-user-label">Situation</label>
                    <div class="col-sm-9">
                        <?php
                            foreach ($listOfSituation as $key => $value) {
                                if ($key == $user["situation"]) {
                                    echo '<label>'.$value.' -> <input type="radio" name="situation" value="'.$key.'" checked></label><br>';
                                }
                                else {
                                    echo '<label>'.$value.' -> <input type="radio" name="situation" value="'.$key.'"></label><br>';
                                }
                            }
                        ?>  
                    </div>
                </div>

                <div class="form-group">
                    <label for="ip" class="col-sm-3 control-label modif-user-label">Adresse IP</label>
                    <div class="col-sm-9">
                        <input type="text" id="ip" class="form-control" value="<?php echo $user["ip_address"];?>" disabled>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="inscription" class="col-sm-3 control-label modif-user-label">Date d'inscription</label>
                    <div class="col-sm-9">
                        <input type="text" id="inscription" class="form-control" value="<?php echo $user["date_inserted"];?>" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="modification" class="col-sm-3 control-label modif-user-label">Dernière modification</label>
                    <div class="col-sm-9">
                        <input type="text" id="modification" class="form-control" value="<?php echo $user["date_updated"];?>" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="connexion" class="col-sm-3 control-label modif-user-label">Dernière connexion</label>
                    <div class="col-sm-9">
                        <input type="text" id="connexion" class="form-control" value="<?php echo $user["last_connexion"];?>" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="is_deleted" class="control-label col-sm-3 modif-user-label">Supprimé</label>
                    <div class="col-sm-9">
                        <select id="is_deleted" name="is_deleted" class="form-control">
                            <?php
                                for ($i=0; $i <= 1 ; $i++) { 
                                    if ($user["is_deleted"] == $i) {
                                        echo "<option value=\"".$i."\"selected>";if ($i == 1) echo"Oui"; else echo "Non"; echo "</option>";
                                    } else {
                                        echo "<option value=\"".$i."\">";if ($i == 1) echo"Oui"; else echo "Non"; echo "</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="is_admin" class="control-label col-sm-3 modif-user-label">Admin</label>
                    <div class="col-sm-9">
                        <select id="is_admin" name="is_admin" class="form-control">
                            <?php
                                for ($i=0; $i <= 1 ; $i++) { 
                                    if ($user["is_admin"] == $i) {
                                        echo "<option value=\"".$i."\"selected>";if ($i == 1) echo"Oui"; else echo "Non"; echo "</option>";
                                    } else {
                                        echo "<option value=\"".$i."\">";if ($i == 1) echo"Oui"; else echo "Non"; echo "</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary btn-block">Sauvegarder</button>
                    </div>
                </div>
            </form> <!-- /form -->
        </div> <!-- ./container -->

        <hr>

    </section>

<?php
    require "footer-admin.php";
?>