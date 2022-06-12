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
                <div class="experiencespro">
                    <p>Expériences professionnelles</p>
                    <select name="nbexp" id="nbexp" onchange="getNbExpe();">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    <div id="exp1">
                        <p>Entreprise 1</p>
                        <input type="text" name="titre1" placeholder="Nom de l'entreprise">
                        <input type="text" name="adresse1" placeholder="Adresse de l'entreprise">
                        <input type="text" name="resume1" placeholder="Résumé de l'expérience">
                    </div>
                    <div id="exp2" style="display:none;">
                        <p>Entreprise 2</p>
                        <input type="text" name="titre2" placeholder="Nom de l'entreprise">
                        <input type="text" name="adresse2" placeholder="Adresse de l'entreprise">
                        <input type="text" name="resume2" placeholder="Résumé de l'expérience">
                    </div>
                    <div id="exp3" style="display:none;">
                        <p>Entreprise 3</p>
                        <input type="text" name="titre3" placeholder="Nom de l'entreprise">
                        <input type="text" name="adresse3" placeholder="Adresse de l'entreprise">
                        <input type="text" name="resume3" placeholder="Résumé de l'expérience">
                    </div>
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

<script>
    function getNbExpe(){
        let nbexp = document.getElementById("nbexp").value
        if(nbexp == "2"){
            document.getElementById("exp2").style.display="block";
        }
        else if(nbexp== "3"){
            document.getElementById("exp2").style.display="block";
            document.getElementById("exp3").style.display="block";
        }
    }
</script>