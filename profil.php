<?php
session_start();
var_dump($_SESSION);
// Connexion a la BDD avec descriptif plus clair si il y a une erreur (array) 
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
// En cas d'erreur, on affiche un message et on arrête tout
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
// Si tout va bien, on peut continuer

$login = $_SESSION['login'];

if (isset($_POST['envoyer']) AND $_POST['new_password'] != $_POST['confirm_password'])
{
    $message = '<p>Mot de passe et confirmation mot de passe différents</p>';
}
else 
{
    if(isset($_POST['envoyer']) ) 
    {
        // Réecriture des variables recupérées dans base de données
        $loginn=htmlspecialchars($_POST['new_login'], ENT_QUOTES);
        $email = htmlspecialchars($_POST['new_email'], ENT_QUOTES);
    
        // Sécurisation du mot de passe
        $password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

        
        // Requête de modification d'enregistrement
        $modifierprofil= $bdd ->prepare('UPDATE `utilisateurs` SET login =:loginn, password = :password, email = :email, id_droits = :droits WHERE login=:login');
        $modifierprofil -> execute (array(
            'loginn' => $loginn,
            'password' => $password,
            'email' => $email,
            'droits' => 1,
            'login' => $login
        ));
        
        // Confirmation texte et changement de la variable $_SESSION['login']
        $messageok = "<section class=message_ok>Votre profil a bien été modifié!</section>";
        $_SESSION['login'] = $loginn;
        $login = $loginn;                
    }  
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
                        <input type="text" name="new_login" id="login" required placeholder=<?php echo $login; ?>>
                    </div>
                    <div>
                        <label for="email">Email</label><br>
                        <input type="email" name="new_email" id="email" required placeholder=<?php echo $_SESSION['email'];?>>
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
    <!-- <?php require('footer.php')?> --> 
    </footer>  
</body>

</html>