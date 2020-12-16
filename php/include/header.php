<section class = header_toolbar>
    <section class = header_logo>
    <a href="index.php"><img src="src/img/ampoule.png" alt="logo outils"> PC pro</a>
    </section>
    
    <section class = header_nav>
    <ul>
        <li><a class="accueil" href="index.php">Accueil</a></li>
        <?php if (isset($_SESSION['login'])) {
            if ($_SESSION['login'] === 'admin' OR $_SESSION['login'] === "administrateur") {
                echo '<li><a href="creer-article.php">Créer un article</a></li>';
            }
            if ($_SESSION['login'] === 'admin'){
                echo '<li><a href="creer-article.php">Admin</a></li>';
            }
        } ?>
        <li><a href="articles.php">Articles</a></li>
        <?php
        /* Profil ou Inscription */
        if (isset($_SESSION['login'])) 
        {
            echo '<li><a href="profil.php">profil</a></li>';
        }
        else 
        {
            echo '<li><a href="inscription.php">S\'inscrire</a></li>';
        }
        /* Affiche Se connecter ou Se déconnecter */
        if (!isset($_SESSION['login'])) 
        {
            echo '<li><a href="connexion.php">Se connecter</a></li>';
        }
        else 
        {
            echo '<li><a href="deconnexion.php">Se déconnecter</a></li>';
        }
        ?>
    </ul>
    </section>
</section>
<section class = header_slogan>
    <section class="slogantext"></section>
<h1>
<?php
    if (!isset($_SESSION['login'])) 
    {
        echo '<h1>Montez votre ordinateur</h1>
                <p>Pièces, composants, prix, nouveautés. Vous êtes au bon endroit.</p>';
    }

    if (isset($_SESSION['login']))
    {
        echo '<h1>Montez votre ordinateur</h1>
        <p>Bonjour '.$_SESSION['login'].', bravo. Vous emmagasinez des connaisances</p>';
    }    
?>
</h1>
    </section>
</section>
