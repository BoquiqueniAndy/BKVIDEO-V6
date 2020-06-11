<?php
class Panier extends Produits 
{
    function __construct()
    {
        require_once "./modelOTD/model.php";
        $this->ds = new DBOTD();
    }
    
    
    
}
?>