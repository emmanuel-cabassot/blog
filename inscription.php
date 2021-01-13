<?php 
// On demarre la session
session_start();

//Reinitialise messages
$message_erreur = null;
$messageok = null;

// Appelle les classes
require_once 'Autoloader.php';

// Permet de ne pas nommer les namespaces des classes Autoloader et Db
use App\Autoloader;
use App\php\Classes\Models\UtilisateursModel;

// Autoloader permettant d'appeler les classes automatiquement
Autoloader::register();

//Vérifie que le mot de passe à bien été confirmé 
if (isset($_POST['envoyer']) AND  $_POST['password'] != $_POST['confirm_password']) 
{
    $message_erreur = '<p>Mot de passe et confirmation du mot de passe sont différents</p>';   
}

// Contrôle pour vérifier si la variable $_POST['Bouton'] est bien définie et que la confirmation du mot de passe est ok
if(isset($_POST['envoyer']) AND $_POST['password'] === $_POST['confirm_password'])  
{   
    //enregistre les variables de login et password
    $login = htmlspecialchars($_POST['login'], ENT_QUOTES);
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $bd = new UtilisateursModel();
    $data = $bd->login($login);

    // Vérifie si il y a une ligne qui correspond
    if (!empty($data))
    {
        $message_erreur = '<p>'.$login.' existe déjà.</p>';
    }
    else 
    {
        // On enregistre en Bdd l'utilisateur 
        $bd->setLogin($login)
            ->setEmail($email)
            ->setPassword($password)
            ->setId_droits(1);
        $bd->create();

        $messageok = "<section class=message_ok>Votre profil a bien été crée, vous pouvez <br> <a href=\"connexion.php\">vous connecter.</section>";
    }         
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Inscription</title>
</head>
<body>
    <header>
    <?php require('php/include/header.php')?>
    </header>
    <main class=main_inscription>      
        <section class=formulaire>        
        <?php   
            if ($messageok != null) 
            {
                echo '<section class=message_ok>'.$messageok.'</section>';
            }  
            else {
                ?>
                
                <h1>Créer votre profil</h1>
                           
            <section>
                <form action="" method="post">
                    <div class = erreur>
                    
                    <?php 
                    if (isset($message)) 
                    {
                        echo $message;
                    }
                    if (isset($erreur_modification)) 
                    {
                        echo $erreur_modification;
                    }
                    ?>  
                                      
                    </div>
                    <div>
                        <label for="login">Login</label><br>
                        <input type="text" name="login" id="login" required>
                    </div>
                    <div>
                        <label for="email">Email</label><br>
                        <input type="email" name="email" id="email" required>
                    </div>
                    <div>
                        <label for="pass">Mot de passe</label><br>
                        <input type="password" id="pass" name="password" minlength="2" required>
                    </div>
                    <div>
                        <label for="conf_pass">Confirmer le mot de passe</label><br>
                        <input type="password" id="conf_pass" name="confirm_password" minlength="2" required>
                    </div>
                    <div class=bouton>
                        <input type="submit" name="envoyer" value="Envoyer le formulaire" >
                    </div>
                   
                </form>
            </section>
                <?php } ?>
        </section>
    </main>
    <footer>
    <<?php require('php/include/footer.php') ?>
    </footer>

</body>

</html>