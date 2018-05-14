<?php
    require "header-admin.php";
?>

    <section id="page-section">
        <h1 id="page-title">Modifier Ticket</h1>

        <hr>

 <div class="container">
            <form method="POST" action="modifTicket.php" class="form-horizontal" role="form">
                <h2>Modification des informations du ticket</h2>



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

                    $ticket = $db -> prepare('SELECT * FROM tickets WHERE id=:userId');
                    $ticket -> execute(["userId" => $userId]);
                    $ticket = $ticket -> fetch(PDO::FETCH_ASSOC);
                ?>

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label modif-user-label">Statut</label>
                    <div class="col-sm-9">
                        <input type="text" id="id" placeholder="ID" class="form-control" value="<?php echo $ticket["status"];?>" disabled autofocus>
                        <input type="hidden" name="id" value="<?php echo $ticket["id"];?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label modif-user-label">Titre</label>
                    <div class="col-sm-9">
                        <input type="text" id="name" name="name" placeholder=Titre" class="form-control" value="<?php echo $ticket["title"];?>" disabled autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="surname" class="col-sm-3 control-label modif-user-label">Email de l'auteur</label>
                    <div class="col-sm-9">
                        <input type="text" id="surname" name="surname" placeholder="email" class="form-control" value="<?php echo $ticket["user_id"];?>" disabled autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label modif-user-label">Message</label>
                    <div class="col-sm-9">
                        <textarea name="message" style="width:350px;height:200px;" disabled><?php echo $ticket["message"];?>
                        </textarea><br>
                        <input type="hidden" name="message" value="<?php echo $ticket["message"];?>">
                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label modif-user-label">Réponse</label>
                    <div class="col-sm-9">
                        <textarea name="answer" style="width:350px;height:200px;" >Réponse
                        </textarea><br>
                        
                    </div>
                </div>

                <div class="form-group">
                    <label for="is_deleted" class="control-label col-sm-3 modif-user-label">Nouveau Statut</label>
                    <div class="col-sm-9">
                        <select id="status" name="status" class="form-control">
                          

                                <option value=1 selected>1-Nouveau ticket</option>
                                <option value=2>2-En cours de résolution</option>
                                <option value=3>3-Résolu</option>
                                <option value=0>0-Supprimer le ticket</option>                            
                        </select>
                    </div>
                </div>

                

                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary btn-block">Envoyer la réponse et enregistrer le statut</button>
                    </div>
                </div>
            </form> <!-- /form -->
        </div> <!-- ./container -->

        <hr>

    </section>

<?php
    require "footer-admin.php";
?>
