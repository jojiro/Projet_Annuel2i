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
        <form method="post" action="saveTicket.php" style="margin:50px;">
            <input class="champ" type="text" name="title" placeholder="Titre de la demande" required="required"><br>

            <textarea name="message" style="width:350px;height:200px;">Contenu
        	</textarea><br>

            <input class="champ" id="bt5" type="submit" value="Poster le ticket" style="margin-bottom:50px;">

        </form>
    </section>
    <?php

    require "footer.php";

    ?>

</html>
