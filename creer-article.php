<?php
require 'traitement/traitement-creer-article.php';

var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>article</title>
</head>
<body>
<header>
    <?php require('php/include/header.php'); ?>
</header>
<main class="main_creer">
    <section class="creer_article">
    <h1>Créer un article</h1>
        <form action="" method='POST'>
            <div>
                <label for="titre">Titre de l'article</label>
            </div>
            <div>
                <input type="text" name="titre" id="titre">
            </div>
            <div>
                <label for="article">Entrez votre article</label>
            </div>
            <div>
                <Textarea id="article" name="article"></Textarea>
            </div>
            <div>
                <label for="categorie">Catégorie</label>
            </div>
            <div>
                <select name="categorie" id="categorie">
                <?php for ($t = 0 ; $t < COUNT($categories) ; $t++) :?>
                    <option value="<?= $categories[$t]['id']?>"><?= $categories[$t]['nom']?></option>
                <?php endfor ;?>
                </select>
            </div>
            <div>
                <label for="photo">Copiez le lien de la photo</label>
            </div>
            <div>
                <input type="text" name="photo" id="photo">
            </div>
            <div>
                <input type="submit" name="valider" value="Valider">
            </div>
        </form>
    </section>
</main>

<footer>
    <?php require('php/include/footer.php') ?>
</footer>
    
</body>
</html>