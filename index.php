<?php
// Cela signifie que vous ne souhaitez pas voir le résultat de votre script mis une fois pour toutes en cache, 
 header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
 header("Cache-Control: no-cache");
 header("Pragma: no-cache");

 require_once("./templateOTD/header.php");

 echo     "<meta charset='utf-8' />";
 echo     "<figure class='image is-128x128'>";
 echo     "<img class= 'logo' src='./StyleOTD/LOGO-BKVIDEO.png' alt=''>";
 echo     "</figure>";
 echo     "<link rel='stylesheet' href='./StyleOTD/style.css'>";

 //Dispatcheur
 try{

    if (isset($_REQUEST['action']))
    {
        require_once("./controlerOTD/controler.php");
        $produits = new Produits();

        if($_GET['action'] == 'produits'){
            $tproduits = $produits->ProdGlob();
            require "./VueOTD/produits.php";
        }




        if($_GET['action'] == 'panier'){
            require "./VueOTD/Vpanier.php";
            require_once("./modelOTD/model.php");
            $panier = new dbotd();
            $sql = "SELECT lien,nompro,prix,code FROM produits WHERE code='" . $_GET["code"] . "'";
            if(!empty($_GET["action"])) {
                switch($_GET["action"]) {
                    case "add":
                        if(!empty($_POST["quantité"])) {
                            $productByCode = $panier->runQuery($sql);
                            $itemArray = array($productByCode[0]["code"]=>array('nompro'=>$productByCode[0]["nompro"], 
                                        'code'=>$productByCode[0]["code"], 
                                        'quantité'=>$_POST["quantité"], 
                                        'prix'=>$productByCode[0]["prix"],
                                        'lien'=>$productByCode[0]["lien"]));
                            
                            if(!empty($_SESSION["cart_item"])){
                                if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
                                    foreach($_SESSION["cart_item"] as $k => $v) {
                                            if($productByCode[0]["code"] == $k) {
                                                if(empty($_SESSION["cart_item"][$k]["quantité"])) {
                                                    $_SESSION["cart_item"][$k]["quantité"] = 0;
                                                }
                                                $_SESSION["cart_item"][$k]["quantité"] += $_POST["quantité"];
                                            }
                                        }
                                }else{
                                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                                    }
                            }else{
                                    $_SESSION["cart_item"] = $itemArray;
                                }
                        }
                    break;
                    case "remove":
                        if(!empty($_SESSION["cart_item"])) {
                            foreach($_SESSION["cart_item"] as $k => $v) {
                                    if($_GET["code"] == $k)
                                        unset($_SESSION["cart_item"][$k]);				
                                    if(empty($_SESSION["cart_item"]))
                                        unset($_SESSION["cart_item"]);
                            }
                        }
                    break;
                    case "empty":
                        unset($_SESSION["cart_item"]);
                    break;	
                }
            }
            
        }




        if($_GET['action'] == 'ps3'){
            $tproduits = $produits->ProdPS3();
            require "./VueOTD/ps3.php";
        }

        if($_GET['action'] == 'ps4'){
            $tproduits = $produits->ProdPS4();
            require "./VueOTD/ps4.php";
        }

        if($_GET['action'] == 'pc'){
            $tproduits = $produits->ProdPC();
            require "./VueOTD/pc.php";
        }

        if($_GET['action'] == 'xboxone'){
            $tproduits = $produits->ProdXBOXONE();
            require "./VueOTD/xboxone.php";
        }

        if($_GET['action'] == 'xbox360'){
            $tproduits = $produits->ProdXBOX360();
            require "./VueOTD/xbox360.php";
        }




        if($_GET['action'] == 'New1'){
            $tproduits = $produits->ProdPS3N();
            require "./VueOTD/New1.php";
        }

        if($_GET['action'] == 'New2'){
            $tproduits = $produits->ProdPS4N();
            require "./VueOTD/New2.php";
        }

        if($_GET['action'] == 'New3'){
            $tproduits = $produits->ProdPCN();
            require "./VueOTD/New3.php";
        }

        if($_GET['action'] == 'New4'){
            $tproduits = $produits->ProdXBOXONEN();
            require "./VueOTD/New4.php";
        }

        if($_GET['action'] == 'New5'){
            $tproduits = $produits->ProdXBOX360N();
            require "./VueOTD/New5.php";
        }




        if($_GET['action'] == 'OI1'){
            $tproduits = $produits->ProdPS3OI();
            require "./VueOTD/OI1.php";
        }

        if($_GET['action'] == 'OI2'){
            $tproduits = $produits->ProdPS4OI();
            require "./VueOTD/OI2.php";
        }

        if($_GET['action'] == 'OI3'){
            $tproduits = $produits->ProdPCOI();
            require "./VueOTD/OI3.php";
        }

        if($_GET['action'] == 'OI4'){
            $tproduits = $produits->ProdXBOXONEOI();
            require "./VueOTD/OI4.php";
        }

        if($_GET['action'] == 'OI5'){
            $tproduits = $produits->ProdXBOX360OI();
            require "./VueOTD/OI5.php";
        }




        if($_GET['action'] == 'RM1'){
            $tproduits = $produits->ProdPS3RM();
            require "./VueOTD/RM1.php";
        }

        if($_GET['action'] == 'RM2'){
            $tproduits = $produits->ProdPS4RM();
            require "./VueOTD/RM2.php";
        }

        if($_GET['action'] == 'RM3'){
            $tproduits = $produits->ProdPCRM();
            require "./VueOTD/RM3.php";
        }

        if($_GET['action'] == 'RM4'){
            $tproduits = $produits->ProdXBOXONERM();
            require "./VueOTD/RM4.php";
        }

        if($_GET['action'] == 'RM5'){
            $tproduits = $produits->ProdXBOX360RM();
            require "./VueOTD/RM5.php";
        }
   


        if ($_REQUEST['action'] == 'Inscription') {
            include "./controlerOTD/controleur.php";
            $Client = new Client();
            $Client->setAdd($_POST);
            include "./VueOTD/vueInscription.php"; 

        } 

    

        if ($_REQUEST['action'] == 'recherche') {
            include "./controlerOTD/controleur.php";
            $Client = new Client();
            $tblcli = $Client->Search($_POST);
            include "./VueOTD/vuesearch.php";
        }

        if ($_GET['action'] == 'Co') {
      
            session_start();
        }

        if (!empty($_SESSION['userId'])) {
            include "./controlerOTD/controleur.php";
            $Client = new Client();
            $tblcli = $Client->getSelect();
      
            include "./VueOTD/vueDashboard.php"; 

        }else {

        include "./VueOTD/vueLogin.php";         

        }
    

        if ($_GET['action'] == 'Util') {
            include "./VueOTD/vueLogin.php";
        }

        if ($_GET['action'] == 'Login') {
        session_start();
        $username = filter_var($_POST["user_name"], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
        
        require_once "./controlerOTD/membre.php";
        require_once  "./controlerOTD/controleur.php";
        $membre = new Membre();
        $Client = new Client();
        $tblcli = $Client->getSelect();
        
        $isLoggedIn = $membre->verifLogin($username, $password);


        if (! $isLoggedIn) {
            $_SESSION["erreurMessage"] = "Les informations d'identification sont invalides !";
            include "./VueOTD/vueLogin.php";
            exit();
        }
        exit();
    
        }

        if ($_GET['action'] == 'Accueil') {
            include "./VueOTD/accueil.php";
            
        } 
    
        

        if ( $_GET['action'] == 'Deco') {

            session_start();

            session_destroy();

        }



        if ($_REQUEST['action'] == 'supprimer') {
            $produits->setdelete(intval($_POST['idprod']));
            include "./VueOTD/vueConnect.php";
        }

        if ($_REQUEST['action'] == 'modifier') {
            $_POST['idprod']=intval($_POST['idprod']);
            $produits->setUpdate($_POST);
            include "./VueOTD/vueConnect.php";
        }

        if ($_GET['action'] == 'admin') {
            require_once("./controlerOTD/controler.php");
            $produits = new Produits();
            $tproduits = $produits->ProdGlob2();
            include "./VueOTD/vueco.php";
            
        }  
  
          if ($_GET['action'] == 'connect') {
            session_start();
            $adname = filter_var($_POST["adname"], FILTER_SANITIZE_STRING);
            $adpassword = filter_var($_POST["adpassword"], FILTER_SANITIZE_STRING);
            require_once("./controlerOTD/admin.php");
            $admin = new admin();
            require_once("./controlerOTD/controler.php");
            $produits = new Produits();
            $tproduits = $produits->ProdGlob2();
            $isLoggedIn = $admin->veriflogad($adname, $adpassword);
            if (! $isLoggedIn) {
                $_SESSION["erreurMessage"] = "Les informations d'identification sont invalides";
                exit();
            }
            include "./VueOTD/vueConnect.php";
            include "./VueOTD/vuesearch.php";
            exit();
            
          }  

    }
}
catch (Exception $e) {
    erreur($e->getMessage());
}

    
?> 
