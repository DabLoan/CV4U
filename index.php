<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CV4U</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header class="header">
            <nav>
                <ul class="lheader">
                    <li><a href="index.php">Accueil</a></li>
<<<<<<< HEAD
                    <li><a href="choixCV.php">Créer son CV</a></li>
                    <li><a href="inscription.php">Nous rejoindre</a></li>
                    <li><a href="connexion.php">Se connecter</a></li>
                    <?php
                    if(!empty($_SESSION['prenom'])){
                        echo "<li><a href=\"deconnexion.php\">Se déconnecter</a></li>";
=======
                    <?php
                    if(!empty($_SESSION['prenom']) && !isset($_GET['deco'])){
                        echo "<li><a href=\"choixTemplate.php\">Créer son CV</a></li>".
                             "<li><a href=\"deconnexion.php\">Se déconnecter</a></li>";
                    }else{
                        echo "<li><a href=\"inscription.php\">Nous rejoindre</a></li>
                            <li><a href=\"connexion.php\">Se connecter</a></li>";
>>>>>>> Update-03/05
                    }
                    ?>
                </ul>
            </nav>
        </header>
        <section>
<<<<<<< HEAD
            <p>Bienvenue sur CV4U la plateforme d'aide à la création de CV</p>
            <?php
                if(!empty($_SESSION['prenom'])){
                    echo "C'est un plaisir de vous voir ".$_SESSION['prenom'];
=======
            <p style="text-align:center; font-size:xx-large;">Bienvenue sur CV4U la plateforme d'aide à la création de CV</p>
            <?php
                if(!empty($_SESSION['prenom']) && !isset($_GET['deco'])){
                    echo "<p style=\" text-align: center;\">C'est un plaisir de vous voir ".$_SESSION['prenom']."</p>";
                }
                if(isset($_GET['reussite']) && $_GET['reussite']==1){
                    echo "<p style=\" text-align: center;\">Votre inscription a été mené à bien</p>";
                }
                if(isset($_GET['deco']) && $_GET['deco']){
                    session_destroy();
                    echo "<p style=\" text-align: center;\">Votre déconnexion a été mené à bien</p>";
>>>>>>> Update-03/05
                }
            ?>
        </section>
    </body>
</html>