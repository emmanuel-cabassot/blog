<?php require 'traitement/traitement-article.php';

?>

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

    </header>
    <main>
        <h1 class="article">Les articles</h1>
        <?php while ($article = $requete->fetch(PDO::FETCH_ASSOC)) :?>
               <p class="articles"><?= $article['article'] ?></p>
               <?= $article['date'] ;?>
               <a class="boutton" href="article.php?id=<?= $article['id'] ?>">Voir l'article</a>
               

            
        <?php endwhile ;?>
    </main>
    <footer>

    </footer>
    
</body>
</html>