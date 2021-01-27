<?php session_start();
$id_user = 1;

// connexion
$connexion = new PDO('mysql:host=localhost;dbname=blog', "root", "");

//recuperation de toutes les categories
$requete = $connexion->prepare('SELECT * FROM categories');
$requete->execute();
$categories = $requete->fetchall(PDO::FETCH_ASSOC);



if (isset($_POST['valider'])){
   
    $article = $_POST['article'];
    $id_categorie = intval($_POST['categorie']);   
    
      
    if (!empty($article) AND !empty($id_categorie)){

        $requete2 = $connexion->prepare("INSERT INTO `articles`( `article`, `id_utilisateur`, `id_categorie`, `date`) VALUES ('$article',$id_user,$id_categorie,NOW())");
        $requete2->execute();
        header("location: articles.php");
    }
        
}

?>