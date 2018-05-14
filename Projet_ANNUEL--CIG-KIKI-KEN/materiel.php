<?php

require "header.php";
require "conf.inc.php";



 
?>

<section id="contact-block">

    <div class="row">
        <div class="col-lg-12">
            <h1 id="contact-signup-title">-sdgfysdi</h1>
            <br><br>
        </div>
    </div>


    <section>
        <form method="post" action="saveMat.php" style="margin:50px;">
            <label for="is_deleted" class="control-label col-sm-3 modif-user-label">Réference du matériel</label>
            <input class="champ" type="text" id="reference" name="reference" placeholder="Ref" required="required"><br>
            <div class="form-group">
                    <label for="is_deleted" class="control-label col-sm-3 modif-user-label">Type de matériel</label>
                    <div class="col-sm-9">
                        <select id="type" name="type" class="form-control">
                          

                                <option value=1 selected>1-Ordinateur portable</option>
                                <option value=2>2-Ordinateur fixe</option>
                                <option value=3>3-Ecran</option>
                                <option value=4>4-Périphérique</option>   
                                <option value=5>5-Vidéoprojecteur</option>
                                <option value=6>6-Autre</option>                       
                        </select>
                    </div>
            </div>
            <div>
            <div class="form-group">
                    <label for="is_deleted" class="control-label col-sm-3 modif-user-label">Etat du matériel</label>
                    <div class="col-sm-9">
                        <select id="status" name="status" class="form-control">
                          

                                <option value=1 selected>1-Parfait/Neuf</option>
                                <option value=2>2-Dommages faible</option>
                                <option value=3>3-Dommages empéchant l'utilisation</option>
                                <option value=4>4-Hors d'utilisation et non réparable</option>                          
                        </select>
                    </div>
            </div>
            <div class="form-group">
                    <label for="is_deleted" class="control-label col-sm-3 modif-user-label">Localisation</label><br>
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
            <div>
                <label for="is_deleted" class="control-label col-sm-3 modif-user-label">Problèmes rencontré</label><br>
                <textarea name="problems" style="width:350px;height:200px;">Ecrire içi
                </textarea>
            </div>

            <input class="champ" id="bt5" type="submit" value="Enregistrer le matériel dans la base" style="margin-bottom:50px;">

        </form>
    </section>
    <?php

    require "footer.php";

    ?>

</html>
