<?php
session_start();

// Appelle l'Autoloader
require_once 'Autoloader.php';

// Permet de ne pas nommer les namespaces des classes Autoloader, Commentaires et Db
use App\php\Classes\Db\Db;
use App\Autoloader;


// Autoloader permettant d'appeler les classes automatiquement
Autoloader::register();


// connexion à la base de données grace à la classe Db et la methode getInstance
$bdd = Db::getInstance();

$sql = 'SELECT * FROM `articles` WHERE id = '.$_GET['id'].'' ;
$query = $bdd->prepare($sql);
$query->execute();
$article = $query->fetch();

$id = $_GET['id'];

if (isset($_POST['valider'])) {
    $post_comm = $_POST['commentaire'];
    $sql = $bdd->prepare('INSERT INTO `commentaires`( `commentaire`, `id_article`, `id_utilisateur`, `date`) VALUES (:commentaire, :article, :utilisateur, NOW())');
    $sql->execute(array(
        'commentaire'=>$_POST['commentaire'],
        'article'=>$_GET['id'] ,
         'utilisateur'=>$_SESSION['user']['id']
    ));
}

/* $sql = 'SELECT * FROM commentaires WHERE id_article = '.$_GET['id'].''; */
$sql = 'SELECT *
FROM commentaires
INNER JOIN utilisateurs
WHERE commentaires.id_utilisateur = utilisateurs.id AND id_article = '.$_GET['id'];
$query = $bdd->prepare($sql);
$query->execute();
$commentaires = $query->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
</head>
<body>
<header>
<?php require('php/include/header.php')?>
</header>
<main class="main_article">
    <section class="container_article">
        <article class="article_article">
            <h1><?php echo $article->titre; ?></h1>
            <img src="<?php echo $article->photo; ?>">
            <p><?php echo $article->article; ?></p>
        </article>
        <h2>Commentaires</h2>
        <section class="commentaires_article">      
            <?php foreach ($commentaires as $commentaire) {
                echo '
                <section class="commentaire_article">
                    <section class="identite">
                        <p>'.$commentaire->login.'</p>
                        le '.strftime("%d/%m/%G à %Hh%M", strtotime($commentaire->date)).'
                    </section>
                    <section class="message">
                        <p>'.$commentaire->commentaire.'</p>
                    </section>
                </section>';
            } ?>
        </section>
        <h2>Ajouter un commentaire</h2>
        <section class="ajout_commentaire">
        <?php  
            if (isset($_SESSION['user']['login'])) {
                ?>         
                <form action="" method="post">
                <div>
                    <textarea name="commentaire" id="commentaire" cols="30" rows="10" required></textarea>
                </div>
                <div>
                    <input type="submit" value='envoyer message' name="valider" required>
                </div>
                </form>
                <?php
            }
            else {?>
                <p>Pour écrire un message veuillez vous connecter svp</p>
                <a href="connexion.php">Connexion</a>
                <?php
            }
            ?>

        </section>
    </section>
</main>
<footer>
<?php require('php/include/footer.php') ?>
</footer>
    
</body>
</html>

