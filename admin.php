<?php
session_start();
require 'traitement/traitement-admin.php';

?>


<!-- requete pour recuperer tout les articles  -->
<!-- Les afficher sur la page html admin dans un tableu -->
<!-- creation d un bouton dans le tablaeu pour chaque article a l aide de l'url ==> id supprimer et update-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <?php require('php/include/header.php') ?>
    </header>
    <main>
<h1 class='admine'></h1>

    <!-- TABLEAU UTILISATEURS -->
    <table class='tableau-style'>
        <thead>
            <tr>
                <th>login</th>
                <th>email</th>
                <th>droit</th>
                <th>modification article</th>
                <th>suppréssion article</th>    
            </tr>
        </thead>
        <tbody>
        <?php for($tab=0;$tab<count($resultat);$tab++):?>
            <tr>
                <td><?=$resultat[$tab]['login']?></td>
                <td><?=$resultat[$tab]['email']?></td>
                <td><?=$resultat[$tab]['id_droits']?></td>
                <td><a href="modifier-article.php?id=<?= $resultat[$tab]['id'];?>">Modification</a></td>
                <td><a href="traitement/supprimer.php?id=<?=$resultat[$tab]['id'];?>">suprimer</a></td>
            </tr>
        <?php endfor;?>

        </tbody>
    </table>

    <!-- TABLEAU ARTICLES -->
    <table>
    <thead>
    <tr>
    <th>contenu</th>
    <th>categorie</th>
    <th>auteur</th>
    <th>modifier</th>
    <th>suprimer</th>
            
    </tr>
    
    </thead>
    <tbody>
    <?php for($arti=0;$arti<count($resultat2);$arti++):?>
        <tr>
            <td><?=$resultat2[$arti]['article']?></td>
            <td><?=$resultat2[$arti]['id_categorie']?></td>
            <td><?=$resultat2[$arti]['login']?></td>
            <td><a href="modifier-article.php?id=<?= $resultat2[$arti]['id_article']?>">Modifier</a></td>
            <td><a href="traitement/traitement-supprimer-article.php?id=<?= $resultat2[$arti]['id_article']?>">supprimer</a></td>
        </tr>  
    <?php endfor;?>
    </tbody>
    </table>
    </main>
    <footer>
        <?php require('php/include/footer.php') ?>
    </footer>
    
</body>
</html>