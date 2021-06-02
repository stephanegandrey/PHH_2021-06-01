<?php
/**
 * @param mixed $query requete sql
 * 
 * @return [ARRAY] tableau de lignes de reponses
 */
function selectTable($query)
{
    //création de la connexion
    $maDb=mysqli_connect("localhost","root","","magasin");
    $res=mysqli_query($maDb,$query);
    if($res==false) return null;
   
    $rowcount=mysqli_num_rows($res);

    $returnArray = array();

    while( $row = mysqli_fetch_assoc($res)){
        array_push($returnArray,$row);
    };
    return $returnArray;
}

?>