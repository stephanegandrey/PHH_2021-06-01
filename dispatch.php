<?php
    if(isset($_GET["page"])){
        switch ($_GET["page"]) {
            case 'new':
                include('includes/formproduit.php');
            break;
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

