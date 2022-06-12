<?php

$db = new PDO('mysql:host=localhost;dbname=cv4u', 'root_con', 'root_connexion'); 

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mail = $_POST['mail'];
$mdp = $_POST['mdp'];
$confmdp = $_POST['confmdp'];

if(!empty($nom) && !empty($prenom) && !empty($mail) && !empty($mdp) && !empty($confmdp)){
    if($mdp == $confmdp){
        $mdp = password_hash($mdp, PASSWORD_DEFAULT);
        $req = $db->prepare('INSERT INTO utilisateurs (prenom,nom,mail,pwd) VALUES (:prenom,:nom,:$mail, :$mdp);');
        $req->bindParam(":prenom",$prenom);
        $req->bindParam(":nom",$nom);
        $req->bindParam(":mail",$mail);
        $req->bindParam(":mdp",$mdp);
        if($req->execute()){
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