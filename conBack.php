<?php 
session_start();
$db = new PDO('mysql:host=localhost;dbname=cv4u', 'root_con', 'root_connexion'); 



$email = $_POST['mail'];
$mdp = $_POST['mdp'];
if(isset($email) && isset($mdp) && !empty($email) && !empty($mdp)){
    $req = $db->prepare('SELECT pwd FROM utilisateurs WHERE mail =:mail;');
    $req->bindParam(":mail",$email);
    $req->execute();
    $rep= $req->fetch();
    if(!empty($rep['pwd'])){
        if(password_verify($mdp, $rep['pwd'])){
            $requete = $db->prepare('SELECT prenom FROM utilisateurs WHERE mail=:mail;');
            $requete->bindParam(":mail",$email);
            $requete->execute();
            $reponse = $requete->fetch();
            if(!empty($reponse['prenom'])){
                $_SESSION['prenom'] = $reponse['prenom'];
                header('Location: index.php');
            }
        }else{
            header('Location: connexion.php?erreur=3');
        }
    }
    else
    {
        header('Location: connexion.php?erreur=2');
    }
}else{
    header('Location: connexion.php?erreur=1');
 }
mysqli_close($db);
?>