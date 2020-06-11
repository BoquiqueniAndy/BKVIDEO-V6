<html>
<?php session_start()
  ?>
<head>

  <meta charset="utf-8" />
  <title>PS3</title>
    
</head>

<?php include "./templateOTD/header2.php"; ?>

<article>
  <div class = "table-container">
    <table class ="table is-striped">
      <?php
        echo "<thead>";
          $tproduits = (empty($tproduits) ? $tproduits=array() : $tproduits);
          foreach($tproduits as $prods){
          
          echo "<form action='index.php?action=ps3' method='POST'>";
          
            echo "<tr>"
              
              ."<td>"."<figure class='image is-48x48'>".$prods['lien']."</td>"."</figure>"."</tr>";
        echo "</thead>";
        echo "<tbody>";
            echo "<tr>"
              ."<td>"."<a class = 'content is-middle'>".$prods['nompro']."</a> "."</td>"."</tr>"
              ."<tr>"."<td>"."<a class = 'subtitle is-6'>".$prods['prix']."€"."</a> "."</td>"."</tr>";
            echo"<tr>"
              ."<td>"."<a>"."<input type='submit' name='action' value='Ajouter au panier' class='button is-warning is-focused'>"
              ."</td>"."</a>".

            "</tr>";
        echo "</tbody>";
          echo "</form>";
          }

        //$nbPages = ceil($nbelementstotal / $limite);
        //if ($page > 1):
          //<img src = "chemin" width="">
      ?>
    </table>
  </div>
</article>

<div class="conteneur">
  
</div>

</html>