<?php
$connexion= new pdo('mysql:host=localhost;dbname=blog;charset=utf8','root','');
$requette=$connexion->prepare('SELECT * FROM `categories`');
$requette->execute();
$resultat=$requette->fetchall(PDO::FETCH_ASSOC);
$id=$_GET['id'];
$requete02=$connexion->prepare("SELECT * FROM `articles` WHERE id=$id");
$requete02->execute();
$resultat02=$requete02->fetch(PDO::FETCH_ASSOC);





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier article</title>
</head>
<body>
<header>

</header>
<main>

</main>
<footer>
<form action="traitement/traitement-modif-article.php?id=<?=$id?>"method="post">
<div>
<label for="article">article</label>
<textarea name="article" id="" cols="30" rows="10"><?=$resultat02['article']?></textarea>
<div>
<label for="categorie">categorie</label>
<select name="categorie" id="categorie">
<?php for ( $i = 0 ; $i < COUNT($resultat) ; $i++) :?>
    <option value="<?=$resultat[$i]['id']?> "><?=$resultat[$i]['nom']?></option>
<?php endfor ;?>

</select>
<input type="submit">
</form>
</div>


</div>

</footer>


    
</body>
</html>




