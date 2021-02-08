<?php session_start();
$id_user = 1;

// connexion
$connexion = new PDO('mysql:host=localhost;dbname=blog', "root", "");

//recuperation de toutes les categories
$requete = $connexion->prepare('SELECT * FROM categories');
$requete->execute();
$categories = $requete->fetchall(PDO::FETCH_ASSOC);



if (isset($_POST['valider'])){
    $titre = strip_tags($_POST['titre']);
    $article = strip_tags($_POST['article']);
    $id_user = $_SESSION['user']['id'];
    $id_categorie = intval($_POST['categorie']);
    $photo = $_POST['photo'];   

      
    if (!empty($article) AND !empty($id_categorie)){

        $requete2 = $connexion->prepare("INSERT INTO `articles`( `titre`, `article`, `id_utilisateur`, `id_categorie`, `photo`) VALUES ($titre, $article, $id_user,  $id_categorie, $photo");
        $requete2->execute();
        var_dump($_POST);
        /* header("location: ../articles.php"); */
    }
        
}

?>