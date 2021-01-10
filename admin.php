<!-- Creation de la page traitement Admin -->
<!-- connexion BDD -->
<!-- Recuperation de tout les utilisateurs -->
<!-- Affichage en html php dans un tableau -->
<!-- Ajouter un lien pour chaque utilisateur pour le supprimer grace  a un url et passer le numero de l'id -->
<!-- creation d un fichier supprimer un utilisateur -->
<!-- requete pour recuperer tout les articles  -->
<!-- Les afficher sur la page html admin dans un tableu -->
<!-- creation d un bouton dans le tablaeu pour chaque article a l aide de l'url ==> id -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<table>
<thead>
    <tr>
    <th>Nom</th>
    <th>Premon</th>


    <th>supprimer</th>
    </tr>
</thead>
<tbody>

<?php for (hhhhh) :?>

<tr>
<td> <?= $utilisateur[$t]['nom'] ?></td>
</tr>

<?endfor ?>



</tbody>
    
</body>
</html>