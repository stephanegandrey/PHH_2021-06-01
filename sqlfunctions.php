<?php
function selectTable($query)
{
    //création de la connexion
    $maDb=mysqli_connect("localhost","root","","magasin");
    $res=mysqli_query($maDb,$query);
    if($res==false) return null;
    // print_r($res);
    // echo '<br/>'.$res->num_rows.'<br/>';
    //soit pat l'objet du résultat soit ar la fonciton fournit par mysqli_
    $rowcount=mysqli_num_rows($res);
    // echo 'rows cout : '.$rowcount.'<hr/>';

    $returnArray = array();

    while( $row = mysqli_fetch_assoc($res)){
        //print_r($row);
        //echo "<hr/>";
        array_push($returnArray,$row);
    };
    return $returnArray;
}

$monresultat=selectTable("Select * from produits");
print_r($monresultat);
?>