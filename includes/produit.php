<?php
    include_once('sqlfunctions.php');
    $monresultat=getsqlproduit($_GET["idp"]);
    //test si produit existe
    if($monresultat==false){
        echo "Ah ben ça existe pas";
    }else{
        ?>
        <div class="produit">
            <div class="left">
                <?php
                echo '<img src="'.$monresultat["photo"].'" alt="'.$monresultat["description"].'" target="_blank" href="'.$monresultat["photo"].'"/>'
                ?>
                <h1 class="prix"><?php echo $monresultat["prix"]?></h1>
            </div>
            <div class="right">
                <H1 class="titre"><?php echo $monresultat["titre"]?></H1>
                <H4 class="categorie"><?php echo $monresultat["cat_titre"]?></H4>
                <H2 class="description"></H2>
            </div>
            <div class="desc">
            <?php echo $monresultat["description"]?>
            </div>
            <div class="buttons">
                <button type="button" class="btn btn-primary">ajouter panier </button>
            </div>

        </div>
        <?php
    }
?>