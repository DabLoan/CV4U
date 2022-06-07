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
=======
>>>>>>> Update-03/05
                    <li><a href="inscription.php">Nous rejoindre</a></li>
                    <li><a href="connexion.php">Se connecter</a></li>
                </ul>
            </nav>
        </header>
        <section>
<<<<<<< HEAD
            <form action="conBack.php" method="POST">
                <input type="text" name="mail" Placeholder="Mail">
                <input type="password" name="mdp" Placeholder="Mot de passe">
                <input type="submit" value="Se Connecter">
                <?php
                    if($_GET['erreur'] == 1){
                        echo "<p style= color:red;>Veuillez renseigner correctement les champs.</p>";
                    }
                    elseif($_GET['erreur'] == 2){
                        echo "<p style= color:red;>Mail ou mot de passe incorrects veuillez réessayer.</p>";
=======
            <form action="conBack.php" method="POST" class="block">
                <input type="text" name="mail" Placeholder="Mail" class="top">
                <input type="password" name="mdp" Placeholder="Mot de passe">
                <input type="submit" value="Se Connecter" class="submit">
                <?php
                    if(isset($_GET['erreur'])){
                        if($_GET['erreur'] == 1){
                            echo "<p style= color:red;>Veuillez renseigner correctement les champs.</p>";
                        }
                        elseif($_GET['erreur'] == 2){
                            echo "<p style= color:red;>Mail ou mot de passe incorrects veuillez réessayer.</p>";
                        }
>>>>>>> Update-03/05
                    }
                ?>
            </form>
        </section>
    </body>
</html>