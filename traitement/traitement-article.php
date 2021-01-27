<?php
session_start();

// connexion
try{
    $bdd = new pdo('mysql:host=localhost;dbname=blog;charset=utf8','root','');

}catch(exception $e){
    exit('erreur'.$e->getMessage());

}

// la requete
$requete = $bdd -> query('SELECT * FROM articles ORDER BY date DESC');
$requete->execute();








?>