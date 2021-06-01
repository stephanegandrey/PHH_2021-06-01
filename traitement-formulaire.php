<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traitement du formulaire</title>

     <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
    <?php
        //declaration variable
        $mavar=0;
        //affectation d'une variable
        $mavar=$mavar+3;
        //affichage variable
        echo $mavar;
    ?>

    <?php
        $mesdata=null;
        if (count($_POST)>0){
            //echo "j'ai sélectionné"
            $mesdata=$_POST;
        }elseif (count($_GET)>0){
            $mesdata=$_GET;
        }else{
            echo "rien à voir ici";
            exit(0);
        }
    ?>

    <h1>tableau $mesdata</h1>
    <?php 
        //affichage variable complexe
        print_r($mesdata) ; 
    ?>
    <h1>position 1 $mesdata</h1>
    <?php
        //affichaga d'un champ du tablea
        echo $mesdata["description-produit"];
    ?>

</body>
</html>