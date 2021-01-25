<?php
session_start();

// Appelle les classes
require_once 'Autoloader.php';

// Permet de ne pas nommer les namespaces des classes Autoloader et Db
use App\php\Classes\Models\UtilisateursModel;
use App\Autoloader;

// Autoloader permettant d'appeler les classes automatiquement
Autoloader::register();

$login = $_SESSION['user']['login'];

if (isset($_POST['envoyer']) AND $_POST['new_password'] != $_POST['confirm_password']){
    $message = '<p>Mot de passe et confirmation mot de passe différents</p>';
}
if (isset($_POST['envoyer']) AND $_POST['new_password'] = $_POST['confirm_password']) {
    // Réecriture et securisation des variables recupérées dans la base de données
    $loginn=htmlspecialchars($_POST['new_login'], ENT_QUOTES);
    $email = htmlspecialchars($_POST['new_email'], ENT_QUOTES);

    // Sécurisation du mot de passe
    $password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
    
    // On instancie le modèle
    $profilModif = new UtilisateursModel;

    // On hydrate l'objet $profilModif
    $profilModif->setId($_SESSION['user']['id'])
        ->setLogin($loginn)
        ->setPassword($password)
        ->setEmail($email)
        ->setId_droits($_SESSION['user']['id_droits']);

    // On enregistre dans la base de données
    $profilModif->update();

    // On reactualise les variables de session user
    $profilModif->setSession();
    
    // Confirmation texte et changement de la variable $_SESSION['login']
    $messageok = "<section class=message_ok>Votre profil a bien été modifié!</section>";
    $_SESSION['user']['login'] = $loginn;
    $login = $loginn;                     
}
   
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Votre profil</title>
</head>
<body>
    <header>
    <?php require('php/include/header.php')?>
    </header>
    <main class=main_profil>
        <section class=profil>          
            <?php   
            if (isset($messageok)) 
            {
                echo $messageok;
            }  
            else {
                echo ' <h1>Modifier son profil</h1>';
            }
            ?>       
            <section>
                <form action="#" method="POST">
                    <div class=erreur>
                    <?php
                        if (isset($message)) 
                        {
                            echo $message;
                        }
                    ?>
                    </div>
                    <div>
                        <label for="login">Login</label><br>
                        <input type="text" name="new_login" id="login" required placeholder=<?php echo $_SESSION['user']['login']; ?>>
                    </div>
                    <div>
                        <label for="email">Email</label><br>
                        <input type="email" name="new_email" id="email" required placeholder=<?php echo $_SESSION['user']['email'];?>>
                    </div>                   
                    <div>
                        <label for="pass">Mot de passe</label><br>
                        <input type="password" id="pass" name="new_password"  minlength="4" required>
                    </div>
                    <div>
                        <label for="confpass">Confirmer le mot de passe</label><br>
                        <input type="password" id="confpass" name="confirm_password" minlength="4" required>
                    </div>
                    <div class=bouton>
                        <input type="submit" name="envoyer" value="Enregistrer vos modifications">
                    </div>
                </form>
            </section>
        </section>
    </main>
    <footer>
    <?php require('php/include/footer.php') ?> 
    </footer>  
</body>

</html>