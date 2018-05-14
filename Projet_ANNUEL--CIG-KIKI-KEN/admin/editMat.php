<?php
    require "header-admin.php";

?>

    <section id="page-section">
        <h1 id="page-title">Modifier le Matériel</h1>

        <hr>

 <div class="container">
            <form method="POST" action="modifMat.php" class="form-horizontal" role="form">
                <h2>Modification des informations du matériel</h2>




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
                    $reference = $_POST["reference"];
                    //$_POST["reference"] = $reference;

                    $materiel = $db -> prepare('SELECT * FROM materiel WHERE reference=:reference');
                    $materiel -> execute(["reference" => $reference]);
                    $materiel = $materiel -> fetch(PDO::FETCH_ASSOC);
                ?>

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label modif-user-label">Référence</label>
                    <div class="col-sm-9">
                        <input type="text" id="reference" placeholder="reference" class="form-control" value="<?php echo $materiel["reference"];?>" disabled autofocus>
                        <input type="hidden" name="reference" value="<?php echo $materiel["reference"];?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label modif-user-label">Type</label>
                    <div class="col-sm-9">
                        <?php
                        switch ($materiel["type"]) {
                                case '1':
                                    echo '<input type="text" id="name" name="name" placeholder="type" class="form-control" value="1-Ordinateur Portable" disabled autofocus>';
                                    break;
                                case '2':
                                    echo '<input type="text" id="name" name="name" placeholder="type" class="form-control" value="2-Ordinateur Fixe" disabled autofocus>';
                                    break;
                                case '3':
                                    echo '<input type="text" id="name" name="name" placeholder="type" class="form-control" value="3-Écran" disabled autofocus>';
                                    break;
                                case '4':
                                    echo '<input type="text" id="name" name="name" placeholder="type" class="form-control" value="4-Périphérique" disabled autofocus>';
                                    break;
                                case '5':
                                    echo '<input type="text" id="name" name="name" placeholder="type" class="form-control" value="5-Vidéoprojecteur" disabled autofocus>';
                                    break;
                                case '6':
                                    echo '<input type="text" id="name" name="name" placeholder="type" class="form-control" value="6-Autre" disabled autofocus>';
                                    break;
                                
                                default:
                                    # code...
                                    break;
                            }
                            ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label modif-user-label">État</label>
                    <div class="col-sm-9">
                        <?php
                        switch ($materiel["status"]) {
                                case '1':
                                    echo '<input type="text" id="name" name="name" placeholder="type" class="form-control" value="1-Parfait/Neuf" disabled autofocus>';
                                    break;
                                case '2':
                                    echo '<input type="text" id="name" name="name" placeholder="type" class="form-control" value="2-Dommages faible" disabled autofocus>';
                                    break;
                                case '3':
                                    echo '<input type="text" id="name" name="name" placeholder="type" class="form-control" value="3-Dommages empéchant utilisation" disabled autofocus>';
                                    break;
                                case '4':
                                    echo '<input type="text" id="name" name="name" placeholder="type" class="form-control" value="4-Hors service et non réparable" disabled autofocus>';
                                    break;

                                default:
                                    # code...
                                    break;
                            }

                            ?>
                            </div>

                            <div class="form-group">
                                <label for="is_deleted" class="control-label col-sm-3 modif-user-label">Nouvel État</label>
                                <div class="col-sm-9">
                                    <select id="status" name="status" class="form-control">
                                      

                                            <option value=1 selected>1-Parfait/Neuf</option>
                                            <option value=2>2-Dommages faible</option>
                                            <option value=3>3-Dommages empéchant l'utilisation</option>
                                            <option value=4>4-Hors d'utilisation et non réparable</option>                          
                                    </select>
                                </div>
                        </div>
                    </div>
                
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label modif-user-label">Localisation</label>
                    <div class="col-sm-9">
                        <?php
                        switch ($materiel["localisation"]) {
                                case '1':
                                    echo '<input type="text" id="name" name="name" placeholder="type" class="form-control" value="1-Bastille" disabled autofocus>';
                                    break;
                                case '2':
                                    echo '<input type="text" id="name" name="name" placeholder="type" class="form-control" value="2-République" disabled autofocus>';
                                    break;
                                case '3':
                                    echo '<input type="text" id="name" name="name" placeholder="type" class="form-control" value="3-Odéon" disabled autofocus>';
                                    break;
                                case '4':
                                    echo '<input type="text" id="name" name="name" placeholder="type" class="form-control" value="4-Place d italie" disabled autofocus>';
                                    break;
                                case '5':
                                    echo '<input type="text" id="name" name="name" placeholder="type" class="form-control" value="5-Ternes" disabled autofocus>';
                                    break;
                                case '6':
                                    echo '<input type="text" id="name" name="name" placeholder="type" class="form-control" value="6-Beaubourg" disabled autofocus>';
                                    break;
                                
                                default:
                                    # code...
                                    break;
                            }
                            ?>
                            </div>
                            <div class="form-group">
                                <label for="is_deleted" class="control-label col-sm-3 modif-user-label">Nouvelle localisation</label><br>
                                    <div class="col-sm-9">
                                        <select id="localisation" name="localisation" class="form-control">
                                          

                                                <option value=1 selected>1-Bastille</option>
                                                <option value=2>2-République</option>
                                                <option value=3>3-Odéon</option>
                                                <option value=4>4-Place d'italie</option>   
                                                <option value=5>5-Ternes</option>
                                                <option value=6>6-Beaubourg</option>                       
                                        </select>
                                    </div>
                            </div>
                            
                        
                    </div>

                <div class="form-group">
                    <label for="surname" class="col-sm-3 control-label modif-user-label">Date d'Enregistrement</label>
                    <div class="col-sm-9">
                        <input type="text" id="enter" name="enter" placeholder="email" class="form-control" value="<?php echo $materiel["entered_at"];?>" disabled autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label modif-user-label">Historique des problèmes</label>
                    <div class="col-sm-9">
                        <textarea name="old_Problems" style="width:350px;height:200px;" disabled><?php echo $materiel["problems"];?>
                        </textarea><br>
                        <input type="hidden" name="oldProblems" value="<?php echo $materiel["problems"];?>">
                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label modif-user-label">Ajouter problème</label>
                    <div class="col-sm-9">
                        <textarea name="problems" style="width:350px;height:200px;" >Texte
                        </textarea><br>
                        
                    </div>
                </div>


                

                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary btn-block">Enregistrer</button>
                    </div>
                </div>
            </form> <!-- /form -->
        </div> <!-- ./container -->

        <hr>

    </section>

<?php
    require "footer-admin.php";
?>
