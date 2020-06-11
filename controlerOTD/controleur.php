<?php

require_once("./modelOTD/model.php");

class Client extends dbotd {

  function getSelect(){
    return $this->Requete("SELECT * FROM `utilisateur`");
  }

 //Fonction Inscription
 function setAdd($tblcli){
	  
  
 
  
  $strSQL = 'INSERT INTO utilisateur (pseudo,mail,mdp) 
              VALUES (?,?,?);';

              $tabValeur = array(
              $tblcli['pseudo'],
               $tblcli['mail'],
              sha1 ($tblcli['mdp'])
            
              );
   $ins = $this->Requete($strSQL, $tabValeur);
   return $ins;
} 

//Fonction recherche

function Search($tblcli){

  $strSQL = "SELECT * FROM produit
              WHERE nompro LIKE  :nom  ";

   empty($tblcli['nom'])     ? $tblcli['nom']    = '*' : $tblcli['nom']; 
  
$tabValeur = array(
        
        'nom'   => "%".$tblcli['nom']."%", 
        
      );

  $sch = $this->Requete($strSQL, $tabValeur);
  return $sch;
 
  }


    } 
  

?>