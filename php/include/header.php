<section class = header_toolbar>
    <section class = header_logo>
    <a href="index.php"><img src="img/ampoule.png" alt="logo outils"> Voyages</a>
    </section>
    
    <section class = header_nav>
    <ul>
        <li><a class="accueil" href="index.php">Accueil</a></li>
        <?php if (isset($_SESSION['user'])) {
            if ($_SESSION['user']['id_droits'] == 1337){
                echo '<li><a href="admin.php">Admin</a></li>';
            }
            if ($_SESSION['user']['id_droits'] == 1337 OR $_SESSION['user']['id_droits'] == 42) {
                echo '<li><a href="creer-article.php">Créer un article</a></li>';
            }
        } ?>
        <li><a href="articles.php">Articles</a></li>
        <?php
        /* Profil ou Inscription */
        if (isset($_SESSION['user'])) 
        {
            echo '<li><a href="profil.php">Profil</a></li>';
        }
        else 
        {
            echo '<li><a href="inscription.php">Inscription</a></li>';
        }
        /* Affiche Se connecter ou Se déconnecter */
        if (!isset($_SESSION['user'])) 
        {
            echo '<li><a href="connexion.php">Connexion</a></li>';
        }
        else 
        {
            echo '<li><a href="deconnexion.php">Déconnexion</a></li>';
        }       
        ?>
    </ul>
    </section>
</section>
<section class = header_slogan>
    <section class="slogantext">
        <h1>
        <?php
            if (!isset($_SESSION['login'])) 
            {
                echo '<h1>Voyages</h1>
                        <p>Blog de voyage</p>';
            }

            if (isset($_SESSION['login']))
            {
                echo '<h1>Voyages</h1>
                <p>Bienvenue '.$_SESSION['user']['login'].'.</p>';
            }    
        ?>
        </h1>
    </section>
</section>
