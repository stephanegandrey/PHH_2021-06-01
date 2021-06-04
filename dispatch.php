<?php
    if(isset($_GET["page"])){
        switch ($_GET["page"]) {
            case 'saveproduit':
                if(
                    isset($_POST["titre-produit"])
                    && isset($_POST["cat-produit"])
                    && isset($_GET["idp"])
                ){
                    $idp=updateSqlProduit($_POST["titre-produit"],$_POST["ref-produit"],$_POST["prix-produit"],$_POST["description-produit"],$_POST["cat-produit"]);

                }elseif(
                    isset($_POST["titre-produit"])
                    && isset($_POST["cat-produit"])
                ){
                    $idp=insertSqlProduit($_POST["titre-produit"],$_POST["ref-produit"],$_POST["prix-produit"],$_POST["description-produit"],$_POST["cat-produit"]);
                    $_GET["idp"]=$idp;
                }
            case 'new':
            case 'edit':
                include('includes/formproduit.php');
            break;
            case 'liste_produit':
                include('includes/liste_produit.php');
            break;
            case 'detail_produit':
                include('includes/produit.php');
            break;
            case 'panier':
                include('includes/panier.php');
            break;
                
            
            default:
                include('includes/home.php');
            break;
        }
    }else{
        include('includes/home.php');
    }

?>

