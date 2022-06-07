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
        <form action="remplirCv.php" method="GET" enctype="multipart/form-data">
            <select name="nomTemplate" id="templates" class="select-box">
                <option value="suisse">Suisse</option>
                <option value="serif">Serif</option>
                <option value="corail">Corail</option>
                <option value="vert-menthe">Vert Menthe</option>
            </select>
            <img id="image" src="http://localhost/CV4U/templateCV/suisse.png" height="600px"/>
            <br>
            <input type="submit" value="Valider mon choix" class="template">
        </form>
    </body>
</html>

<script>
    function getImg(){
        document.getElementById("image").src = "http://localhost/CV4U/templateCV/" + this.options[this.selectedIndex].value + ".png"
    }
    var templates = document.getElementById('templates');
    templates.addEventListener('change', getImg, false);
</script>