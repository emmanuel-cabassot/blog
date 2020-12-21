<?php
require '../traitement/traitement-index.php';



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>blog voyage</title>
</head>
<body>
<header>



</header>
<main>
<section>
<div>

    <h1>ENVOLE-TOI vers le monde</h1>
    <p>on te souhaite la bienvenu sur notre blog voyage</p>
    <p>on s'appelle emmanuelle et jérome nous sommes des passionées de voyage et d'aventure.suite a un long tour du monde,nous</p>
    <p>nous avons radicalement changé de vie.Et notre passion passion et devenu notre métier.</p>
    <p>Notre but?t'aider a préparer tes prochain voyage et t'inspirer au quotidien</p>
</div>


</section>
<h2>carnet de voyage</h2>
<p>nos dernier voyage autour du monde</p>
<?php
    for ($i=0; $i<3; $i++) {
        echo '<div>';
        echo 'Posté le : '.date("d-m-Y H:m",strtotime($resultat[$i]['date']));
        echo '<p>' .$resultat[$i][ 'article' ] .'</p>';
        echo '</div>';
    }




?>
<section>
    <div>
   
        <img src="../img/strasbourg.jpg" alt="photo">
        <a href="https://oiseaurose.com/que-faire-a-strasbourg-visiter/">que faire a strasbourg?visiter la ville</a>
    </div>
    <div>
        <img src="../img/crete.jpg" alt="photo">
        <a href="https://oiseaurose.com/que-faire-visiter-crete/">que faire en créte?visiter ile</a>
    </div>
    <div>

        <img src="../img/plage.jpg" alt="photo">
        <a href="https://oiseaurose.com/plus-belles-plages-crete/">quel sont les plus belle page de crete?</a>
        
    </div>
</section>
<section>
    <div>
        <img src="../img/cb.jpg" alt="photo">
        <a href="https://oiseaurose.com/avis-carte-fosfo-fortuneo/">mon avie sur la carte foso</a>
    </div>
    <div>
    <img src="../img/bouteille.jpg" alt="photo">
    <a href="https://oiseaurose.com/voyager-responsable/">comment voyager responsable,ou du moin <br>essayer?</a>
    
    </div>
    <div>
        <img src="../img/holafy.jpg" alt="photo">
        <a href="https://oiseaurose.com/cartes-sim-holafly-avis/">les cartes sim holafly,pour rester<br>  connecté au voyage</a>
    </div>
</section>
<section>
    <a href="https://oiseaurose.com/conseils-aux-voyageurs/">lire tout les conseille utile au voyageurs</a>

</section>

  




</main>
<footer>

<h2>lifestyle</h2>
<p>style de vie,test de produit</p>
<section>
    <div>
        <img src="../img/calendrier.jpg" alt="photo">
        <a href="https://oiseaurose.com/cheerz-avis-calendriers-photos/">Mon aviss sur les calendriers photo<br>personnalisés cheerz</a>
    </div>
        <div>
            <img src="../img/appareil.jpg" alt="photo">
            <a href="https://oiseaurose.com/cadeaux-voyage-idee/">Les cadeaux de voyage pour faire plaisir en<br> 2020</a>
    
        </div>
                <div>
                <img src="../img/revue.jpg" alt="photo">
                <a href="https://oiseaurose.com/monalbumphoto-avis/">Mon albumphoto,pour créer des livres<br>photo souvenir de vacance</a>
                </div>
</section>
<a href="https://oiseaurose.com/reflexion-sur-le-voyage/">découvrire d'autres produit et services</a>
<h2>Vivre de son blog de voyage</h2>
<p>Afin de partager  vos propres expérience</p>
</footer>




    
</body>
</html>







