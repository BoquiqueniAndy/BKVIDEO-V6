<?php
if (!empty($_SESSION["adId"])) {
    require_once "./controlerOTD/admin.php";
    $admin = new admin();
    $adminResultat = $admin->getIdAd($_SESSION["adId"]);
    if(!empty($adminResultat[0]["nomadmin"])) {
        $afficherna = ucwords($adminResultat[0]["nomadmin"]);
    } else {
        $afficherna = $adminResultat[0]["nomadmin"];
    }
}
?>
<section>
    <article>
        <p class ="content is-medium">Salut ! <?php echo $afficherna; ?></p>, <br>
        <p class ="content is-medium">Vous êtes dans l'espace administrateur !</a></p><br>
        <p class ="content is-medium">Profiter des actions autorisées sur les jeux !</a></p><br>
        <p class ="content is-medium">Pour sortir d'ici cliquez sur <a href="index.php?action=Deco" >Déconnexion</a></p>
        <br><br>
    </article><br><br>
    <article>
        <br><h1 class = "title is-3">Espace administrateur</h1><br /><br />
    </article>
   
</section>

<article>
    <div class = "table-container">
        <table class ="table is-striped">
        <?php
            echo "<thead>";
            $tproduits = (empty($tproduits) ? $tproduits=array() : $tproduits);
            foreach($tproduits as $prods){
            
            echo "<form action='index.php?action=admin' method='POST'>";
                
                echo "<tr>"
                ."<td>"."<a class = 'subtitle is-6'>"."<input readonly type='text' name='idprod' id='idprod' value='".$prods['numprod']."'>"."</a>".
                "</tr>";  
                echo "<tr>"
                ."<td>"."<figure class='image is-48x48'>".$prods['lien']."</td>"."</figure>".
                "</tr>";

            echo "</thead>";
            echo "<tbody>";
                echo "<tr>"
                ."<td>"."<a class = 'content is-middle'>".$prods['nompro']."</a> "."</td>".
                "</tr>";
                echo "<tr>"
                ."<td>"."<a class = 'subtitle is-6'>"."<input type='number' name='prix' id='prix' value='".$prods['prix']."'>"."€"."</a> "."</td>".
                "</tr>";
                echo"<tr>"
                ."<td>"."<a>"."<input type='submit' name='action' value='supprimer' class='button is-warning is-focused'>"
                ."</td>"."</a>".
                "</tr>";
                echo "<tr>"
                ."<td>"."<a>"."<input type='submit' name='action' value='modifier' class='button is-warning is-focused'>"
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
</article><br><br>