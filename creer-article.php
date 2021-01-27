<?php
require 'traitement/traitement-creer-article.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>article</title>
</head>
<body>
<header>

</header>
<main>
    <form action="traitement/traitement-creer-article.php" method='POST'>
            <label for="article">Entrez votre article</label>
            <Textarea id="article" name="article"></Textarea>
            <select name="categorie" id="categorie">
            <?php for ($t = 0 ; $t < COUNT($categories) ; $t++) :?>
                <option value="<?= $categories[$t]['id']?>"><?= $categories[$t]['nom']?></option>
            <?php endfor ;?>

            </select>
            <input type="submit" name="valider" value="Valider">
    </form>



</main>

<footer>

</footer>
    
</body>
</html>