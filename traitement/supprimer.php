
<?php

 $bdd = new pdo('mysql:host=localhost;dbname=blog;charset=utf8','root','');

 $id_utilisateur =$_GET['id'];
 var_dump($id_utilisateur);

 $requette= $bdd -> query("DELETE FROM `utilisateurs` WHERE id=$id_utilisateur");
 $requette->execute();

 header("location: ../admin.php");







?>