<?php
    require "header-admin.php";
?>

    <section id="page-section">
        <h1 id="page-title">Utilisateurs</h1>

        <hr>

        <div class="container">
            <form method="POST" action="changePassword.php" class="form-horizontal" role="form">
                <h2>Modification du mot de passe</h2>


                <?php

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
                    $user -> execute([
                        "userId" => $userId
                        ]);
                    $user = $user -> fetch(PDO::FETCH_ASSOC);

                    if (empty($user)) {
                        header('Location: users.php');
                    }

                ?>

                <div class="form-group">
                    <label for="id" class="col-sm-3 control-label modif-user-label">ID</label>
                    <div class="col-sm-9">
                        <input type="text" id="id" placeholder="ID" class="form-control" value="<?php echo $user["id"];?>" disabled autofocus>
                        <input type="hidden" name="id" value="<?php echo $user["id"];?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label modif-user-label">Mot de passe</label>
                    <div class="col-sm-9">
                        <input type="password" id="password" name="password" placeholder="Mot de passe" class="form-control" autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password2" class="col-sm-3 control-label modif-user-label"></label>
                    <div class="col-sm-9">
                        <input type="password" id="password2" name="password2" placeholder="Confirmer le mot de passe" class="form-control" autofocus>
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