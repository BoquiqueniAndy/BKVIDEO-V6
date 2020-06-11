<?php
// Connexion à la BASE DE DONNÉES
class dbotd {
  private $cnx = null;
  private $resultat = null;

  function __construct(){

    $this->cnx = new PDO("mysql:host=localhost;dbname=bkvideo1;charset=utf8", "root", "otd15" );
}

  function __destruct(){
    if ($this->resultat!==null) { $this->resultat = null; }
    if ($this->cnx!==null) { $this->cnx = null; }
  }

  // Exécution de la requête préparée
  // La fonction peut être appelée plusieurs fois.
  function reqotd($req){
    $this->resultat = $this->cnx->prepare($req);
    $this->resultat->execute();
    return $this->resultat->fetchAll();
  }

  function Requete($strSQL, $tblValeur){
    $this->resultat = $this->cnx->prepare($strSQL);
    $this->resultat->execute($tblValeur);
    return $this->resultat->fetchAll();
  }

  function runQuery($query) {
    $this->resultat = $this->cnx->prepare($query);
    $this->resultat->execute();
		while($row=$this->resultat->fetchAll()) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->cnx,$query);
		$rowcount = $this->resultat->fetchAll(PDO::FETCH_NUM);
		return $rowcount;	
    }
}
?>