<?php
    session_start();
    require 'traitement/traitement-index.php';
    
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <?php require('php/include/header.php') ?>
    </header>
    <main>
        <?php for ($t= 0 ; $t < COUNT($resultat) ; $t++) :?>
            <section>
                <p> <?= $resultat[$t]['article'] ?></p>
                <p><?= $resultat[$t]['date'] ?></p>
                <a href="article.php?id=<?= $resultat[$t]['id'] ?>">Voir l'article</a>
            </section>

        <?php endfor ;?>
    </main>
    <footer>
        <?php require('php/include/footer.php') ?>
    </footer>
</body>
</html>