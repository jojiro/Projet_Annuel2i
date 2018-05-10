<?php
    require "header-admin.php";
?>

    <section id="page-section">
        <h1 id="page-title">Utilisateurs</h1>

        <hr>

 <div class="container">
            <form method="POST" action="modifAdmin.php" class="form-horizontal" role="form">
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
                    <label for="name" class="col-sm-3 control-label modif-user-label">ID</label>
                    <div class="col-sm-9">
                        <input type="text" id="id" placeholder="ID" class="form-control" value="<?php echo $user["id"];?>" disabled autofocus>
                        <input type="hidden" name="id" value="<?php echo $user["id"];?>">
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
                        <a href="editAdminPassword.php" class="btn btn-warning btn-block">Changer le mot de passe</a>
                    </div>
                </div>
                <div class="form-group">
                    <label for="birthdate" class="col-sm-3 control-label modif-user-label">Date de naissance</label>
                    <div class="col-sm-9">
                        <input type="date" id="birthday" name="birthday" class="form-control" value="<?php echo $user["birthday"];?>">
                    </div>
                </div>


                <div class="form-group">
                    <label for="phone" class="col-sm-3 control-label modif-user-label">Téléphone</label>
                    <div class="col-sm-9">
                        <input type="number" id="phone" name="phone" placeholder="Numéro de téléphone" class="form-control" value="<?php echo $user["phone"];?>">
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
