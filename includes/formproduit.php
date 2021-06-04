<div id="form_produit">
<?php
    include_once('sqlfunctions.php');
    
    $constitutionurl="?page=saveproduit";
    if(isset($_GET["idp"])){
        $titre="Edition produit";
        $constitutionurl=$constitutionurl."&idp=".$_GET["idp"];
        $prod=getsqlproduit($_GET["idp"]);
    }else{
        $titre="Nouveau produit";
        $prod=null;
    }
?>


    <form action="<?=$constitutionurl?>" method="POST" role="form" enctype="multipart/form-data">
        <legend><?=$titre?></legend>
    
        <div class="form-group">
            <label for="titre-produit">Titre</label>
            <input type="text" class="form-control" id="titre-produit" name="titre-produit" value="<?=$prod?$prod["titre"]:"" ?>" placeholder="saisir titre">
            <label for="ref-produit">Référence</label>
            <input type="text" class="form-control" id="ref-produit" name="ref-produit" value="<?=$prod?$prod["ref"]:"" ?>" placeholder="saisir référence">
            <label for="cat-produit">catégorie</label>
            <?php
                
                $monresultat=selectTable("Select idcat,titre from categories");
            ?>
            <select name="cat-produit" id="cat-produit" class="form-control" required="required" value="<?=$prod?$prod["idcat"]:"" ?>">
                <?php
                    for($i=0;$i<count($monresultat);$i++)
                    {
                        echo '<option value="'.$monresultat[$i]["idcat"].'"';
                        if($prod && $monresultat[$i]["idcat"]==$prod["idcat"]) echo ' selected="selected"';
                        echo '">'.$monresultat[$i]["titre"].'</option>';
                    }
                ?>

            </select>
            
        </div>

        <div class="form-group">
            <label for="photo-produit">Photo</label>
            <input type="file" class="form-control" id="photo-produit" name="photo-produit" value="<?=$prod?$prod["photo"]:"" ?>" placeholder="sélectionner image">
        </div>
        
        <div class="form-group">
            <label for="prix-produit">prix</label>
            <input type="number" class="form-control" id="prix-produit" name="prix-produit" value="<?=$prod?$prod["prix"]:"" ?>" placeholder="indiquer le prix" min="0.01" step="0.01">
        </div>

        <div class="form-group">
            <label for="description-produit">description</label>
            <textarea class="form-control" id="description-produit" name="description-produit" placeholder="saisir description"><?=$prod?$prod["description"]:"" ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>