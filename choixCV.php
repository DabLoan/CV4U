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
                    <li><a href="choixCV.php">Créer son CV</a></li>
                    <li><a href="inscription.php">Nous rejoindre</a></li>
                    <li><a href="connexion.php">Se connecter</a></li>
                </ul>
            </nav>
        </header>
        <form action="poc.php" method="POST" enctype="multipart/form-data">
            <select name="nomTemplate" id="templates">
                <option value="suisse">Suisse</option>
                <option value="serif">Serif</option>
                <option value="corail">Corail</option>
                <option value="vert-menthe">Vert Menthe</option>
            </select>
            <input type="text" name="nom" placeholder="Votre nom">
            <input type="file" name="photo">
            <input type="text" name="nomFichier" placeholder="Nom du fichier">
            <input type="submit" value="Valider mon choix">
        </form>
    </body>
</html>