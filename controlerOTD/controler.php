<?php

require_once("./modelOTD/model.php");

class Produits extends dbotd {

  function ProdGlob(){
    $req = 'SELECT nompro,prix,lien FROM Produits ORDER BY numprod ASC';
    $p = $this->reqotd($req);
    return $p;
  }
  function ProdGlob2(){
    $req = 'SELECT numprod,nompro,prix,lien FROM Produits ORDER BY numprod ASC';
    $p = $this->reqotd($req);
    return $p;
  }




  function ProdPS3(){

    $req = ('SELECT nompro,prix,lien  FROM Produits 
    GROUP BY numprod,plateforme,categorie HAVING plateforme LIKE "ps3"');
    $p = $this->reqotd($req);
    return $p;
  }
  function ProdPS3N(){

    $req = ('SELECT nompro,prix,lien  FROM Produits 
    GROUP BY numprod,plateforme,categorie HAVING plateforme LIKE "ps3" AND categorie LIKE"New1"');
    $p = $this->reqotd($req);
    return $p;
  }
  function ProdPS3OI(){

    $req = ('SELECT nompro,prix,lien  FROM Produits 
    GROUP BY numprod,plateforme,categorie,prix HAVING plateforme LIKE "ps3" AND categorie LIKE "OI1"');
    $p = $this->reqotd($req);
    return $p;
  }
  function ProdPS3RM(){

    $req = ('SELECT nompro,prix,lien  FROM Produits 
    GROUP BY numprod,plateforme,categorie HAVING plateforme LIKE "ps3" AND categorie LIKE "RM1"');
    $p = $this->reqotd($req);
    return $p;
  }




  function ProdPS4(){

    $req = ('SELECT nompro,prix,lien  FROM Produits  
    GROUP BY numprod,plateforme,categorie HAVING plateforme LIKE "ps4"');
    $p = $this->reqotd($req);
    return $p;
  }
  function ProdPS4N(){

    $req = ('SELECT nompro,prix,lien  FROM Produits  
    GROUP BY numprod,plateforme,categorie HAVING plateforme LIKE "ps4" AND categorie LIKE "New2"');
    $p = $this->reqotd($req);
    return $p;
  }
  function ProdPS4OI(){

    $req = ('SELECT nompro,prix,lien  FROM Produits  
    GROUP BY numprod,plateforme,categorie HAVING plateforme LIKE "ps4" AND categorie LIKE "OI2"');
    $p = $this->reqotd($req);
    return $p;
  }
  function ProdPS4RM(){

    $req = ('SELECT nompro,prix,lien  FROM Produits  
    GROUP BY numprod,plateforme,categorie HAVING plateforme LIKE "ps4" AND categorie LIKE "RM2"');
    $p = $this->reqotd($req);
    return $p;
  }




  function ProdPC(){

    $req = ('SELECT nompro,prix,lien  FROM Produits
    GROUP BY numprod,plateforme,categorie HAVING plateforme LIKE "pc"');
    $p = $this->reqotd($req);
    return $p; 
  }
  function ProdPCN(){

    $req = ('SELECT nompro,prix,lien  FROM Produits
    GROUP BY numprod,plateforme,categorie HAVING plateforme LIKE "pc" AND categorie LIKE "New3"');
    $p = $this->reqotd($req);
    return $p;
  }
  function ProdPCOI(){

    $req = ('SELECT nompro,prix,lien  FROM Produits  
    GROUP BY numprod,plateforme,categorie HAVING plateforme LIKE "pc" AND categorie LIKE "OI3"');
    $p = $this->reqotd($req);
    return $p;
  }
  function ProdPCRM(){

    $req = ('SELECT nompro,prix,lien  FROM Produits  
    GROUP BY numprod,plateforme,categorie HAVING plateforme LIKE "pc" AND categorie LIKE "RM3"');
    $p = $this->reqotd($req);
    return $p;
  }
  
  


  function ProdXBOXONE(){

    $req = ('SELECT nompro,prix,lien  FROM Produits
    GROUP BY numprod,plateforme HAVING plateforme LIKE "xboxone"');
    $p = $this->reqotd($req);
    return $p;
  }
  function ProdXBOXONEN(){

    $req = ('SELECT nompro,prix,lien  FROM Produits
    GROUP BY numprod,plateforme,categorie HAVING plateforme LIKE "xboxone" AND categorie LIKE "New4"');
    $p = $this->reqotd($req);
    return $p;
  }
  function ProdXBOXONEOI(){

    $req = ('SELECT nompro,prix,lien  FROM Produits
    GROUP BY numprod,plateforme,categorie HAVING plateforme LIKE "xboxone" AND categorie LIKE "OI4"');
    $p = $this->reqotd($req);
    return $p;
  }
  function ProdXBOXONERM(){

    $req = ('SELECT nompro,prix,lien  FROM Produits
    GROUP BY numprod,plateforme,categorie HAVING plateforme LIKE "xboxone" AND categorie LIKE "RM4"');
    $p = $this->reqotd($req);
    return $p;
  }




  function ProdXBOX360(){

    $req = ('SELECT nompro,prix,lien  FROM Produits
    GROUP BY numprod,plateforme HAVING plateforme LIKE "xbox360"');
    $p = $this->reqotd($req);
    return $p;
  }
  function ProdXBOX360N(){

    $req = ('SELECT nompro,prix,lien  FROM Produits
    GROUP BY numprod,plateforme,categorie HAVING plateforme LIKE "xbox360" AND categorie LIKE "New5"');
    $p = $this->reqotd($req);
    return $p;
  }
  function ProdXBOX360OI(){

    $req = ('SELECT nompro,prix,lien  FROM Produits
    GROUP BY numprod,plateforme,categorie HAVING plateforme LIKE "xbox360" AND categorie LIKE "OI5"');
    $p = $this->reqotd($req);
    return $p;
  }
  function ProdXBOX360RM(){

    $req = ('SELECT nompro,prix,lien  FROM Produits
    GROUP BY numprod,plateforme,categorie HAVING plateforme LIKE "xbox360" AND categorie LIKE "RM5"');
    $p = $this->reqotd($req);
    return $p;  
  }




  function setDelete($id){

    $strSQL = "DELETE FROM Produits WHERE numprod = ?";
    $tabValeur = array($id);
    $del = $this->Requete($strSQL, $tabValeur);
    return $del;
  }
  function setUpdate($tproduits){

    $strSQL = "UPDATE Produits SET prix = UCASE(:prix) WHERE numprod = :idprod;";

    $tabValeur = array(
      'idprod'  => $tproduits['idprod'],
      'prix'  => $tproduits['prix']
    );
    
    $upd = $this->Requete($strSQL, $tabValeur);
    return $upd;
  }

}

?>