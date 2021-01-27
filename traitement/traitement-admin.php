<?php

//connexion
$connexion = new PDO('mysql:host=localhost;dbname=blog', "root", "");

//recuperer utilisateurs
$membre=$connexion->query('SELECT * FROM `utilisateurs`' );
$membre->execute();
$resultat=$membre->fetchall(PDO::FETCH_ASSOC);


//recuperer articles
$article=$connexion->query('SELECT *, articles.id AS id_article FROM `articles` INNER JOIN utilisateurs ON articles.id_utilisateur=utilisateurs.id');
$article->execute();
$resultat2=$article->fetchall(PDO::FETCH_ASSOC);




?>




