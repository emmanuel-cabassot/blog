<?php
$connexion = new PDO('mysql:host=localhost;dbname=blog', "root", "");
$id=$_GET['id'];
$request=$connexion->prepare("DELETE FROM `articles` WHERE `id`= $id");
$request->execute();
var_dump($request);

header('location: ../admin.php');





?>