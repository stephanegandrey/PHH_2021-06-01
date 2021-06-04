<?php
$madb=null;


/**
 * @param mixed $query requete sql
 * 
 * @return [ARRAY] tableau de lignes de reponses
 */
function selectTable($query)
{
    //création de la connexion
    $GLOBALS["maDb"]=mysqli_connect("localhost","root","","magasin");
    $res=mysqli_query($GLOBALS["maDb"],$query);
    if($res==false){
        return false;
    }elseif(gettype($res)=="boolean" & mysqli_affected_rows($GLOBALS["maDb"])>0){
        return mysqli_affected_rows($GLOBALS["maDb"]);
    }

    // $rowcount=mysqli_num_rows($res);

    $returnArray = array();

    while( $row = mysqli_fetch_assoc($res)){
        array_push($returnArray,$row);
    }
    return $returnArray;
}

Function getsqlproduit($id)
{
    // $query='select * from produits where idpr='.$id.';';
    $query='SELECT PR.prix,PR.description,PR.titre as titre,PR.prix,PR.photo,PR.ref,PR.description,PR.idcat,CA.titre as cat_titre from produits PR, categories CA where PR.idcat=CA.idcat and pr.idpr='.$id.';';
    $result=selectTable($query);
    if($result==false){
        return false;
    }else{
        return $result[0];
    }
    // test si resultat est ok et gérer renvoi

}



Function getlisteproduit($search=false)
{
    // $query='select * from produits where idpr='.$id.';';
    $query='SELECT PR.idpr,PR.prix,PR.description,PR.titre as titre,PR.prix,PR.photo,PR.ref,PR.description,PR.idcat,CA.titre as cat_titre from produits PR, categories CA where PR.idcat=CA.idcat';
    if($search){
        $query=$query.' and pr.titre like "%'.$search.'%";';
    }
    $result=selectTable($query);
    // test si resultat est ok et gérer renvoi
    if($result==false){
        return false;
    }else{
        return $result;
    }

}

function insertSqlProduit($titre,$ref,$prix,$description,$idcat,$photo=null){
    $req="INSERT INTO `produits`(`titre`, `ref`, `prix`, `description`, `idcat`) VALUES ('".$titre."','".$ref."',".$prix.",'".$description."',".$idcat.");";
    $isaffected=selectTable($req);
    if($isaffected){
        return mysqli_insert_id ($GLOBALS["maDb"]);
    }else{
        return false;
    }
}

function updateSqlProduit($titre,$ref,$prix,$description,$idcat,$photo=null){
    $req="UPDATE `produits` SET `titre`='".$titre."',`ref`='".$ref."',`prix`=".$prix.",`description`='".$description."',`idcat`=".$idcat." WHERE idpr=".$_GET["idp"].";";
    return selectTable($req);
    
}
?>