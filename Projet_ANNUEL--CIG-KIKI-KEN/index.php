<?php
require "header.php";
?>

<section id="fh5co-home" data-section="home" style="background-image: url(images/full_image_3.jpg);" data-stellar-background-ratio="0.5">
  <div class="gradient"></div>
  <div class="container">
    <div class="text-wrap">
      <div class="text-inner">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <h1 class="to-animate">Work'n Share</h1>
            <h2 class="to-animate">Des solutions simple et rapide pour travailler dans les meilleures conditions </h2>
            <div class="call-to-action">
              <?php if (isset($_SESSION["id_utilisateur"]) && !empty($_SESSION["id_utilisateur"])){
              }else{
                echo "<a href='connexion' class='demo to-animate'>Se connecter</a><a href='inscription' class='download to-animate'>S'inscrire</a>";
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="fh5co-explore" data-section="explore">
  <div class="container">
    <div class="row">
      <div class="col-md-12 section-heading text-center">
        <h2 class="to-animate">Explorez nos espaces</h2>
        <div class="row">
          <div class="col-md-8 col-md-offset-2 subtext to-animate">
            <h3>Visitez une maquette en 3D des locaux que vous pouvez louer!</h3>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="fh5co-explore">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-push-5 to-animate-2">
          <img class="img-responsive" src="images/work_1.png" alt="work">
        </div>
        <div class="col-md-4 col-md-pull-8 to-animate-2">
          <div class="mt">
            <h3>Intégration WebGl</h3>

            <ul class="list-nav">
              <li><i class="icon-check2"></i>Far far away, behind the word</li>
              <li><i class="icon-check2"></i>There live the blind texts</li>
              <li><i class="icon-check2"></i>Separated they live in bookmarksgrove</li>
              <li><i class="icon-check2"></i>Semantics a large language ocean</li>
              <li><i class="icon-check2"></i>A small river named Duden</li>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </div>


</section>
<section id="fh5co-testimony" data-section="testimony">
  <div class="container">
    <div class="row">
      <div class="col-md-12 to-animate">
        <div class="wrap-testimony">
          <div class="owl-carousel-fullwidth">
            <div class="item">
              <div class="testimony-slide active text-center">
                <figure>
                  <img src="images/person2.jpg" alt="user">
                </figure>
                <blockquote>
                  <p>"La solution qui m'a été proposée par Work'n Share m'as permis de me consacrer corps et âme sur mon projet et d'atteindre des niveaux de concentration et de productivité seulement possible dans un tel environnement."</p>
                </blockquote>
                <span>Killian Tissier, via <a href="#" class="twitter">Twitter</a></span>
              </div>
            </div>
            <div class="item">
              <div class="testimony-slide active text-center">
                <figure>
                  <img src="images/person3.jpg" alt="user">
                </figure>
                <blockquote>
                  <p>"Simplement la meilleure solution pour travailler loin des distractions du quotidien."</p>
                </blockquote>
                <span>Nicolas Boisan, via <a href="#" class="twitter">Twitter</a></span>
              </div>
            </div>
            <div class="item">
              <div class="testimony-slide active text-center">
                <figure>
                  <img src="images/person2.jpg" alt="user">
                </figure>
                <blockquote>
                  <p>"Grâce à Work'N Share j'ai pû lancer ma start up dans un environnement favorable et louer des équipment qui m'ont permis d'avancer trés rapidement ."</p>
                </blockquote>
                <span>Pierre Belmart, via <a href="#" class="twitter">Twitter</a></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</div>
</div>
</section>

<section id="fh5co-services" data-section="services">
  <div class="fh5co-services">
    <div class="container">
      <div class="row">
        <div class="col-md-12 section-heading text-center">
          <h2 class="to-animate">Nous proposons des services...</h2>
          <div class="row">
            <div class="col-md-8 col-md-offset-2 subtext">
              <h3 class="to-animate"></h3>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="box-services">
            <i class="icon-chemistry to-animate-2"></i>
            <div class="fh5co-post to-animate">
              <h3>Services à disposition</h3>
              <p>Que ce soit un besoin de matériel informatique ou un manque de boisson cafféiné, Work'N Share est équipé pour répondre à vos demandes.</p>
            </div>
          </div>
        </div>
        <div class="col-sm-4">

          <div class="box-services">
            <i class="icon-energy to-animate-2"></i>
            <div class="fh5co-post to-animate">
              <h3>Connexion professionnelle</h3>
              <p>Profitez d'une connexion internet de niveau professionnel pour un travail sans interruption et sécurisé. </p>
            </div>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="box-services">
            <i class="icon-people to-animate-2"></i>
            <div class="fh5co-post to-animate">
              <h3>Un environnement studieux</h3>
              <p>Cotoyez des personnes ayant les mêmes motivations, un bon moyens de créer des contacts. </p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<section id="fh5co-faq" data-section="faq">
  <div class="fh5co-faq">
    <div class="container">
      <div class="row">
        <div class="col-md-12 section-heading text-center">
          <h2 class="to-animate">Questions communes</h2>
          <div class="row">
            <div class="col-md-8 col-md-offset-2 subtext">
              <h3 class="to-animate">Tout ce que vous devez savoir avant de commencer</h3>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="box-faq to-animate-2">
            <h3>Qu'est-ce que Work'N Share?</h3>
            <p>Work'N Share est une solution de location de d'espaces de travail. Nous vous fournissons espaces, matériel, boissons et connexion internet haut débit afin de vous permettre une ambiance de travail optimale.</p>
          </div>
          <div class="box-faq to-animate-2">
            <h3>Quel type d'équipement fournissez vous?</h3>
            <p>Nous fournissons: ordinateurs portables, imprimante, projecteur, chargeurs... </p>
          </div>

        </div>

        <div class="col-md-6">
          <div class="box-faq to-animate-2">
            <h3>Comment puis-je profiter de vos services?</h3>
            <p>Pour profiter de toutes les solutons Work'N Share, vous devez vous connecter (ou créer un compte ) et choisir une de nos formules afn de réserver vos locaux.</p>
          </div>
          <div class="box-faq to-animate-2">
            <h3>Combien de personnes peuvent venir travailler avec moi?</h3>
            <p>Nous proposons plusieurs taille de locaux et vous pouvez ainsi collaborer aves 8 personnes dans nos locaux les plus large.</p>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<hr>

<?php
require "footer.php";
?>
