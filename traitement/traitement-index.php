<?php
$connexion = new PDO('mysql:host=localhost;dbname=blog', "root", "");

$execute=$connexion->prepare('SELECT * FROM `articles` ORDER BY `date` DESC LIMIT 10');
$execute->execute();
$resultat=$execute->fetchall(PDO::FETCH_ASSOC);





?>