<div id="form_produit">
    
    <form action="traitement-formulaire.php" method="POST" role="form">
        <legend>Edition produit</legend>
    
        <div class="form-group">
            <label for="titre-produit">Titre</label>
            <input type="text" class="form-control" id="titre-produit" name="titre-produit" placeholder="saisir titre">
            <label for="ref-produit">Référence</label>
            <input type="text" class="form-control" id="ref-produit" name="ref-produit" placeholder="saisir référence" pattern="REF-[\d\w]{1,25}">
            <label for="cat-produit">catégorie</label>
            <?php
                include_once('sqlfunctions.php');
                $monresultat=selectTable("Select idcat,titre from categories");
            ?>
            <select name="cat-produit" id="cat-produit" class="form-control" required="required">
                <?php
                    for($i=0;$i<count($monresultat);$i++)
                    {
                        echo '<option value="'.$monresultat[$i]["idcat"].'">'.$monresultat[$i]["titre"].'</option>';
                    }
                ?>

            </select>
            
        </div>

        <div class="form-group">
            <label for="photo-produit">Photo</label>
            <input type="file" class="form-control" id="photo-produit" name="photo-produit" placeholder="sélectionner image">
        </div>
        
        <div class="form-group">
            <label for="prix-produit">prix</label>
            <input type="number" class="form-control" id="prix-produit" name="prix-produit" placeholder="indiquer le prix" min="0.01" step="0.01">
        </div>

        <div class="form-group">
            <label for="description-produit">description</label>
            <textarea class="form-control" id="description-produit" name="description-produit" placeholder="saisir description"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
</div>