<section class="logo">
    <div><img src="src/img/ordinateur.gif" alt="logo outils"></div> <div class="texte">PC pro</div>

</section>
<section class="coordonnees">
    <h3>Coordonnées</h3>
    <p>Pc Pro<br>
    30 rue de la bonne pioche<br>
    13008 Marseille<br>
    email : pcpro@gmail.com<br>
    tél :04 31 78 78 78</p>
</section>
<section class="navigation">
    <h3>Navigation</h3>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="index.php">Articles</a></li>
        <?php 
        if (isset($_SESSION['login'])) {
            ?>
            <li><a href="profil.php">Profil</a></li>
            <li><a href="deconnexion.php">Déconnexion</a></li>
            <?php
        }
        else {
            ?>
            <li><a href="inscription.php">Inscription</a></li>
            <li><a href="connexion.php">Connexion</a></li>
            <?php
        }
        if (isset($_SESSION['id_droits'])) {
            if ($_SESSION['id_droits'] === 42 OR $_SESSION['id_droits'] === 1337 ) {
                ?>
                <li><a href="creer-article.php">Créer article</a></li>
                <?php
            }
            if ($_SESSION['id_droits'] === 1337) {
                ?>
                <li><a href="admin.php">Admin</a></li>
                <?php
            }
        }
        ?>
    </ul>
</section>
<section class="social">
    <div><img src="src/img/facebook.png" alt="logo facebook"></div>
    <div><img src="src/img/instagram.png" alt="logo instagram"></div>
    <div><img src="src/img/twitter.png" alt="logo twitter"></div>
</section>

</body>
</html>