<?php

class Membre 
{

    function __construct()
    {
        require_once "./modelOTD/model.php";
        $this->ds = new dbotd();
    }

    function getMemberById($idMembre)
    {
        $strSQL = "select * FROM utilisateur WHERE id = ?";
        $paramTab = array($idMembre);
        $membreResultat = $this->ds->Requete($strSQL, $paramTab);
        return $membreResultat;
    }

    public function verifLogin($username, $password) {
        $passwordHash = sha1($password);
        $strSQL = "select * FROM utilisateur WHERE pseudo = ? AND mdp = ?";
        $paramTab = array($username, $passwordHash);
        $membreResultat = $this->ds->Requete($strSQL, $paramTab);
        if(!empty($membreResultat)) {
            $_SESSION["userId"] = $membreResultat[0]["id"];
            return true;
        }
    }
    
}
?>