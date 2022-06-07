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
                    <?php
                    if(!empty($_SESSION['prenom'])){
                        echo "<li><a href=\"choixTemplate.php\">Créer son CV</a></li>".
                             "<li><a href=\"deconnexion.php\">Se déconnecter</a></li>";
                    }else{
                        echo "<li><a href=\"inscription.php\">Nous rejoindre</a></li>
                            <li><a href=\"connexion.php\">Se connecter</a></li>";
                    }
                    ?>
                </ul>
            </nav>
        </header>
        <form action="poc.php" method="POST" enctype="multipart/form-data">
            <div class="enligne">
                <div class="info-perso">
                    <p>Informations personnelles</p>
                    <input type="text" name="nom" placeholder="Votre nom" class="notfile">
                    <input type="text" name="adresse" placeholder="Votre adresse" class="notfile">
                    <input type="text" name="mail" placeholder="Votre mail" class="notfile">
                    <input type="text" name="numtel" placeholder="Votre numéro de téléphone" class="notfile">
                    <label>Choissisez votre photo :</label>
                    <br>
                    <input type="file" name="photo">
                </div>
                <div class="info-perso">
                    <p>Compétences</p>
                    <p>Veillez à séparer chaque compétence d'une virgule</p>
                    <input type="text" name="competences" placeholder="Vos compétences" class="notfile">
                </div>
            </div>
            <br>
            <div class="choix-final">
                <input type="text" name="nomFichier" placeholder="Nom du fichier">
                <input type="submit" value="Valider mon choix" class="cv">
            </div>
            <?php
            $_SESSION['nomTemplate'] = $_GET['nomTemplate'];
            ?>
        </form>
    </body>
</html>