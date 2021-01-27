<?php
$connexion= new pdo('mysql:host=localhost;dbname=blog;charset=utf8','root','');
$article=$_POST['article'];
$categorie=$_POST['categorie'];
$id=$_GET['id'];
if(!empty($article) and !empty($categorie)){
    $requette=$connexion->prepare("UPDATE `articles` SET `article`='$article',`id_categorie`=$categorie WHERE `id`=$id");
    $requette->execute();
    header('Location: ../admin.php');
 
   
   
    
};







?>