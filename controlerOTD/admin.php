<?php

class admin 
{

    function __construct()
    {
        require_once "./modelOTD/model.php";
        $this->ds = new dbotd();
    }

    function getIdAd($idadmin)
    {
        $strSQL = "select * FROM administrateur WHERE idadmin = ?";
        $paramTab = array($idadmin);
        $admineResultat = $this->ds->Requete($strSQL, $paramTab);
        return $admineResultat;
    }
 
    public function veriflogad($adname, $adpassword) {
        $adpasswordHash = md5($adpassword);
        $strSQL = "select * FROM administrateur WHERE nomadmin = ? AND mdpadmin = ?";
        $paramTab = array($adname, $adpasswordHash);
        $admineResultat = $this->ds->Requete($strSQL, $paramTab);
        if(!empty($admineResultat)) {
            $_SESSION["adId"] = $admineResultat[0]["idadmin"];
            return true;
        }
    }
    
    public function processLogin($adname, $adpassword) {
        $adpasswordHash = md5($adpassword);
        $strSQL = "select * FROM administrateur WHERE nomadmin = ? AND mdpadmin = ?";
        $paramTab = array($adname, $adpasswordHash);
        $admineResultat = $this->ds->Requete($strSQL, $paramTab);
        if(!empty($admineResultat)) {
            $_SESSION["adId"] = $admineResultat[0]["idadmin"];
            return true;
        }
    }
}