
<?php
    include_once('sqlfunctions.php');

    if(isset($_GET["search"])){
        $monresultat=getlisteproduit($_GET["search"]);
    }else{
        $monresultat=getlisteproduit();
    }
    //test si produit existe
    if($monresultat==false){
        echo "<h1>Liste des produits</h1>";
    }else{
        echo "<h1>Liste des produits:".count($monresultat).' résultats</h1>';
        ?>
        <table border=1>
            <tr class="entete_colonne">
                <td>Catégorie</td>
                <td>Ref</td>
                <td>titre</td>
                <td>description</td>
                <td>prix</td>
                <td>photo</td>
                <td>action</td>
            </tr>
        
            <?php
            for($i=0;$i<count($monresultat);$i++)
            {
                echo '<tr>';
                    echo '<td>'.$monresultat[$i]["cat_titre"].'</td>';
                    echo '<td>'.$monresultat[$i]["ref"].'</td>';
                    echo '<td>'.$monresultat[$i]["titre"].'</a></td>';
                    echo '<td>'.$monresultat[$i]["description"].'</td>';
                    echo '<td>'.$monresultat[$i]["prix"].' €</td>';
                    echo '<td><img src="'.$monresultat[$i]["photo"].'"></td>';
                    echo '<td class="buttons">';
                    echo '<a href="index.php?page=detail_produit&idp='.$monresultat[$i]["idpr"].'"><button type="button" class="btn btn-success">Voir</button></a><br/>';
                    echo '<button type="button" class="btn btn-primary">Ajouter</button>';
                    echo '</td>';
                echo '</tr>';
            }
        echo '</table>';
    }
?>
