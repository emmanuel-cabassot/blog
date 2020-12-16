<?php
// On débute la session
session_start();

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

/* Vérificatin que login et password ont été renseignés */
if (isset($_POST['login']) AND isset($_POST['password'])) 
{   
    $login = htmlspecialchars($_POST['login'], ENT_QUOTES);
    /* recherche $login dans la base de donnée */    
    $req = $bdd->prepare('SELECT login, password, id FROM utilisateurs WHERE login = :login');
    $req->execute(array(
    'login' => $login
    ));

    //Met dans $data le tableau de $req
    $data = $req->fetch();
    $data['id'];

    // Vérifie si il y a une ligne qui correspond
    $row = $req->rowCount();

    //Si oui verifie que le mot de passe est le bon
    if ($row == 1) {
        if (password_verify($_POST['password'], $data['password'])) {
            $_SESSION['login'] = $login;
            $_SESSION['id'] =  $data['id'];
            header('location:../index.php'); 
        }
        //Sinon mot de passe incorrect
        else {
            $message = "Mot de passe incorrect";
        }
        
    }//Sinon login inexistant
    else {
        $message = "Le nom d'utilisateur est incorrect.";
    }   
}   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <header>
    <?php
    require('php/include/header.php')
    ?>
    </header>
    <main class="main_connexion">
        <section class=connexion>        
            <h1>Connexion</h1>        
            <section>
                <form action="" method="post">
                    <div class="erreur">
                        <p>
                        <?php
                            if (isset($message)) 
                            {
                                echo $message;
                            }
                        ?>
                        </p>  
                    <div>            
                        <label for="login">Login</label><br>
                        <input type="text" name="login" id="login" required>
                    </div>
                    <div>
                        <label for="pass">Mot de passe</label><br>
                        <input type="password" id="pass" name="password" minlength="4" required>
                    </div>
                    <div class=bouton>
                        <input type="submit" name="envoyer" value="Se connecter">
                    </div>
                </form>
            </section>
        </section>
    </main>
    <footer>
    <!-- <?php require('footer.php') ?> -->
    </footer>
</body>

</html>
    


