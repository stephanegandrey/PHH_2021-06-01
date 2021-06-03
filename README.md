# PHH_2021-06-01
Formation ORSYS

compte github
	stephanegandrey
	st.gandrey@gmail.com

dans cmd, se placer sur le répertoire qui hébergera les sources git et taper "git clone " + l'url dispo sur l'espace web du repositories

télécharger vscode

dans vscode installer 
	gti graph
	HTML CSS Support
	HTML Snippets
	Format HTML in PHP
	PHP Debug
	PHP Formatter
	Bootstrap 3 Snippets
	PHP Getters & Setters
	PHP IntelliSense
	PHP Symbols
	Auto Close Tag
	PHP Constructor
	PHP Extension Pack
	PHPDoc Generator (ctrl + entree sur fontion pour générer)


Pour créer un site, dans wamp, apache, ajouter l'alias. Nommer puis donner le chemin. "remplacer les \ par / et terminer par /"

exemple de snippet : html généère la structure de la page. H1 génére un titre de type h1
bootstrap intègre automatiqueent les librairies CSS et js

pour intégrer le compte github, lancer git gui

pour manager le serveur, aller sur http://localhost/phpmyadmin/index.php (root pas de mot de passe)

pour designer les bases, utiliser https://github.com/ondras/wwwsqldesigner
	recupérer le lien et dans cmd, saisir git clone c:\test 'le dossier sera copié dans test'
	Puis dans wamp, créer un alias dans apache. D'abord le nom du site puis le chemin avec des / à la place des \ et terminer par /

pour avoir la liste des sites, aller sur http://127.0.0.1


conception base
	#=cle etrangere
	idxxx=cle primaire
	produits(idproduit,#idcategorie,titre,ref,prix,photo,desc)
	categorie(idproduit,titre,description)
	panier(idpanier,#idclient,date)
	client(idclient,nom,prenom,mail,adresse,mdp,login)
	etre_dans(#idproduit,#idpanier,quantite)

requetes select
	SELECT `idcat`,`titre`,`description` FROM `categories`
	SELECT `idpr`, `titre`, `ref`, `prix`, `photo`, `description`, `idcat` FROM `produits`

	liste des produits
	SELECT 
		`idpr`,
		pr.`titre` as titre,
		`ref`,
		`prix`,
		`photo`,
		pr.`description` as decription,
		ca.titre as cat_titre,
		pr.`idcat` as idcat
	FROM
		`produits` PR,
		`categories` CA
	where
		ca.idcat=pr.idcat

panier N°1
	SELECT pr.idpr,PR.titre as titre ,prix,ref,photo,CA.titre as cat_titre,ED.quantite,pa.date,CLI.nom from categories CA,produits PR, etre_dans ED, paniers PA, clients CLI where CA.idcat=PR.idcat and PR.idpr=ED.idpr and ED.idpa=PA.idpa and PA.idcl=CLI.idcl and PA.idpa=1

maj panier
	update etre_dans set etre_dans.quantite=5 where etre_dans.idpr=2 and etre_dans.idpa=1;

fonction connexion, execution et affichage resultat requete
	<?php
	function selectTable($query)
	{
		//création de la connexion
		$maDb=mysqli_connect("localhost","root","","magasin");
		$res=mysqli_query($maDb,$query);
		$rowcount=mysqli_num_rows($res);
		echo 'rows cout : '.$rowcount.'<hr/>';
		while( $row = mysqli_fetch_assoc($res)){
			print_r($row);
			echo "<hr/>";
		};
		
	}

	selectTable("Select * from produits")
	?>

dispatcher recup get
	if(isset($_GET["page"])){
        switch ($_GET["page"]) {
            case 'edit':
                include('includes/formproduit.php');
                break;
            case 'liste_produit':
                include('includes/liste_produit.php');
                break;
            default:
                include('includes/home.php');
                break;
        }
    }else{
        include('includes/home.php');
    }

