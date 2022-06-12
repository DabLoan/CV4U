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
                    <input type="text" name="nom1" placeholder="Votre nom" class="notfile">
                    <input type="text" name="adresse1" placeholder="Votre adresse" class="notfile">
                    <input type="text" name="mail" placeholder="Votre mail" class="notfile">
                    <input type="text" name="numtel" placeholder="Votre numéro de téléphone" class="notfile">
                    <label>Choissisez votre photo :</label>
                    <br>
                    <input type="file" name="photo">
                </div>
                <div class="experiencespro">
                    <span>Veillez à séparer chaque champ d'une virgule :</span>
                    <p>Objet du CV</p>
                    <input type="text" name="objet" placeholder="Quel poste visez-vous ?">
                    <p>Compétences</p>
                    <input type="text" name="competences" placeholder="Vos compétences" class="notfile">
                    <p>Hobbies</p>
                    <input type="text" name="hobbies" placeholder="Vos hobbies" class="notfile">
                    <p>Langues</p>
                    <input type="text" name="langues" placeholder="Les langues que vous parlez" class="notfile">
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
                        <input type="text" name="adresse2" placeholder="Adresse de l'entreprise">
                        <input type="text" name="duree1" placeholder="Durée">
                        <input type="text" name="resume1" placeholder="Résumé de l'expérience">
                    </div>
                    <div id="exp2" style="display:none;">
                        <p>Entreprise 2</p>
                        <input type="text" name="titre2" placeholder="Nom de l'entreprise">
                        <input type="text" name="adresse3" placeholder="Adresse de l'entreprise">
                        <input type="text" name="duree2" placeholder="Durée">
                        <input type="text" name="resume2" placeholder="Résumé de l'expérience">
                    </div>
                    <div id="exp3" style="display:none;">
                        <p>Entreprise 3</p>
                        <input type="text" name="titre3" placeholder="Nom de l'entreprise">
                        <input type="text" name="adresse4" placeholder="Adresse de l'entreprise">
                        <input type="text" name="duree3" placeholder="Durée">
                        <input type="text" name="resume3" placeholder="Résumé de l'expérience">
                    </div>
                </div>
                <div class="info-perso">
                    <p>Diplômes obtenus/en cours d'obtention</p>
                    <select name="nbecole" id="nbecole" onchange="getNbEcole();">
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                    <div id="ecole1">
                        <p>École numéro 1</p>
                        <input type="text" name="nom2" placeholder="Nom de l'école">
                        <input type="text" name="adresse5" placeholder="Adresse de l'école">
                        <input type="text" name="annee1" placeholder="Années d'études">
                        <input type="text" name="diplome1" placeholder="Diplôme obtenu">
                    </div>
                    <div id="ecole2" style="display:none;">
                        <p>École numéro 2</p>
                        <input type="text" name="nom3" placeholder="Nom de l'école">
                        <input type="text" name="adresse6" placeholder="Adresse de l'école">
                        <input type="text" name="annee2" placeholder="Années d'études">
                        <input type="text" name="diplome2" placeholder="Diplôme obtenu">
                    </div>
                </div>
                <div class="info-perso">
                    <p>Un projet à partager ?</p>
                    <input type="text" name="nomprojet" placeholder="Son nom ?" class="notfile">
                    <input type="text" name="descprojet" placeholder="En quoi consiste-t-il ?" class="notfile">
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
            document.getElementById("exp3").style.display="none";
        }
        else if(nbexp== "3"){
            document.getElementById("exp2").style.display="block";
            document.getElementById("exp3").style.display="block";
        }else{
            
            document.getElementById("exp2").style.display="none";
            document.getElementById("exp3").style.display="none";
        }
    }
    function getNbEcole(){
        let nbecole = document.getElementById("nbecole").value
        if(nbecole == "2"){
            document.getElementById("ecole2").style.display="block";
        }else{
            document.getElementById("ecole2").style.display="none";
        }
    }
</script>