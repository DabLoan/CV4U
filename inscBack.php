<?php

$db = mysqli_connect("localhost", "root_con", "root_connexion","cv4u")
or die('could not connect to database');

$nom = mysqli_real_escape_string($db,htmlspecialchars($_POST['nom']));
$prenom = mysqli_real_escape_string($db,htmlspecialchars($_POST['prenom']));
$mail = mysqli_real_escape_string($db,htmlspecialchars($_POST['mail']));
$mdp = mysqli_real_escape_string($db,htmlspecialchars($_POST['mdp']));
$confmdp = mysqli_real_escape_string($db,htmlspecialchars($_POST['confmdp']));

if(!empty($nom) && !empty($prenom) && !empty($mail) && !empty($mdp) && !empty($confmdp)){
    if($mdp == $confmdp){
        $mdp = password_hash($mdp, PASSWORD_DEFAULT);
        $req = 'INSERT INTO utilisateurs (prenom,nom,mail,pwd) VALUES ("'.$prenom.'","'.$nom.'","'.$mail.'", "'.$mdp.'");';
        $exe_req = mysqli_query($db,$req);
        if($exe_req){
            header('Location: index.php?reussite=1');
        }
        else
        {
            header('Location: inscription.php?erreur=3');
        }
    }else{
        header('Location: inscription.php?erreur=2');
    }
}else{
    header('Location: inscription.php?erreur=1');
}
?>