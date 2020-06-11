<html>
<head>
  <?php
  ?>

  <meta charset="utf-8" />
  <title>Produits</title>
    
</head>

<?php include_once "./templateOTD/header.php"; ?>

<?php include_once "./templateOTD/header2.php"; ?>

<article>
  <div class = "table-container">
    <table class ="table is-striped">
      <?php
        echo "<thead>";
          $tproduits = (empty($tproduits) ? $tproduits=array() : $tproduits);
          foreach($tproduits as $prods){
          
          echo "<form action='index.php?action=produits' method='POST'>";
          
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

<!--<nav class="pagination" role="navigation" aria-label="pagination">
  <a class="pagination-previous" title="This is the first page" disabled>Previous</a>
  <a class="pagination-next">Next page</a>
  <ul class="pagination-list">
    <li>
      <a class="pagination-link is-current" aria-label="Page 1" aria-current="page">1</a>
    </li>
    <li>
      <a class="pagination-link" aria-label="Goto page 2">2</a>
    </li>
    <li>
      <a class="pagination-link" aria-label="Goto page 3">3</a>
    </li>
  </ul>
</nav>-->

</html>