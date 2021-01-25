<?php require 'traitement/traitement-article.php';

session_start();

// Appelle les classes
require_once 'Autoloader.php';


// Permet de ne pas nommer les namespaces des classes Autoloader et Db
use App\php\Classes\Db\Db;
use App\php\Classes\Models\ClasseDiverse;
use App\Autoloader;

// Autoloader
Autoloader::register();


// On détermine sur quelle page on se trouve
if(isset($_GET['start']) AND !empty($_GET['start'])){
    $currentPage = (int) strip_tags($_GET['start']);
}else{
    $currentPage = 1;
}
// On détermine dans quelle catégorie on se trouve
if (isset($_GET['categorie']) AND !empty($_GET['categorie'])) {
    $categorie_chiffre = 'WHERE id_categorie = '.strip_tags($_GET['categorie']);
}
else {
    $categorie_chiffre = '';
}

// connexion à la base de données grace à la classe Db et la methode getInstance
$bdd = Db::getInstance(); 





// On détermine le nombre total d'articles
$sql = 'SELECT  COUNT(*) AS nb_articles FROM `articles` '.$categorie_chiffre.'';

// On prépare la requête
$query = $bdd->prepare($sql);

// On exécute
$query->execute();

// On récupère le nombre d'articles
$result = $query->fetch();

$nbArticles = (int) $result->nb_articles;

// On détermine le nombre d'articles par page
$parPage = 5;

// On calcule le nombre de pages total
$pages = ceil($nbArticles / $parPage);

// Calcul du 1er article de la page
$premier = ($currentPage * $parPage) - $parPage;

$sql =$bdd->query ('SELECT * FROM `articles` '.$categorie_chiffre.' ORDER BY `id` DESC LIMIT '.$premier.', '.$parPage.'');



$articles = $sql->fetchAll();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
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
    
        <?php require('php/include/header.php') ?>
    </header>
    <main class="main_articles">
        <section class="page_articles">
            <section class="titre">
                <h1><span>A</span>rticles</h1>
            </section>
            <!-- Continents -->
            <section class="categories">
            <ul>
                <li><a href="articles.php?categorie=2&start=1">Eurasie</a></li>
                <li><a href="articles.php?categorie=1&start=1">Afrique</a></li>
                <li><a href="articles.php?&start=1">Tous</a></li>
                <li><a href="articles.php?categorie=3&start=1">Amérique</a></li>
                <li><a href="articles.php?categorie=4&start=1">Océanie</a></li>
            </ul>
            </section>
            <!-- Articles -->
            <section class="les_articles">
                <?php
                foreach ($articles as $article) {
                    ?>
                    <article class="articles"> 
                        <a href="article.php?id=<?php echo $article->id?>">
                        <section class="conteneur_image">
                            <img src="<?php echo $article->photo ?>" alt="">
                        </section>
                        <section class="text">
                            <h2><?php echo substr($article->titre, 0, 60) ?></h2> 
                            <p><?php echo substr($article->article, 0, 200).'...'; ?></p>
                        </section>
                        </a>
                    </article>
                    <?php  
                    }
                    ?>
            </section>
            <!-- Pagination -->
            <section class="pagination">
                <?php
                if ($currentPage != 1) {
                    echo '<a href="articles.php?';if (isset($_GET['categorie'])) {
                        echo 'categorie='.$_GET['categorie'].'&';
                    }    
                    echo 'start='.($currentPage-1).'">Précédant</a>'; 
                } 
                
                for($i=1;$i<=$pages;$i++) {
                    
                    
                    if($i == $currentPage) {
                        echo $i.' ';
                    } else {
                        echo '<a href="articles.php?';if (isset($_GET['categorie'])) {
                            echo 'categorie='.$_GET['categorie'].'&';
                        }   
                        echo 'start='.$i.'">'.$i.'</a> ';
                    }
                }

                if ($currentPage < $pages) {
                    echo '<a href="articles.php?';if (isset($_GET['categorie'])) {
                        echo 'categorie='.$_GET['categorie'].'&';
                    }   
                    
                    echo 'start='.($currentPage+1).'">Suivant</a>';
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