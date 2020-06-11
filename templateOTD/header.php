<!DOCTYPE html>
<html>
    <head>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
		
    </head>
 
    <body>
        <a role="button" class="navbar-burger" data-target="menu" aria-label="menu" aria-expanded="false">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
        <aside class="navbar-menu" id="menu">
            <nav>  
                <ul>
                    <li class="title is-7"><a class="is-active" href="index.php?action=Accueil">Accueil</a> </li>
                    <li class="title is-7"><a class="is-active" href="index.php?action=Inscription">Inscription</a> </li>
                    <li class="title is-7"><a class="is-active" href="index.php?action=Co">Connexion</a> </li>
                    <li class="title is-7"><a class="is-active" href="index.php?action=Deco"> Déconnexion </a></li>
                    <li class="title is-7"><a class="is-active" href="index.php?action=produits">Produits</a> </li>
                    <li class="title is-7"><a class="is-active" href="index.php?action=panier">Panier</a> </li>
                    <li class="title is-7"><a class="is-active" href="index.php?action=admin">Espace administrateur</a> </li>
            
                </ul>
            </nav>
        </aside>
        
    </body>
    <script>
      document.addEventListener('DOMContentLoaded', () => {

      // Récupération de tous les éléments "navbar-burger"
      const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

      // Vérifier s'il y a des hamburgers navbar
      if ($navbarBurgers.length > 0) {

      //Ajouter un événement click sur chacun d'eux
      $navbarBurgers.forEach( el => {
          el.addEventListener('click', () => {

          // Récupération de la cible à partir de l'attribut "data-target"
          const target = el.dataset.target;
          const $target = document.getElementById(target);

          // Commutation de la classe "is-active" à la fois sur le "navbar-burger" et sur le "navbar-menu".
          el.classList.toggle('is-active');
          $target.classList.toggle('is-active');

          });
      });
      }

      });

      $(document).ready(function() {

      // Vérifier les événements de clics sur l'icône de la barre de navigation hamburger
      $(".navbar-burger").click(function() {

          // Commutation de la classe "is-active" à la fois sur le "navbar-burger" et sur le "navbar-menu"
          $(".navbar-burger").toggleClass("is-active");
          $(".navbar-menu").toggleClass("is-active");

      });
      });
  </script>

</html>
