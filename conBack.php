<?php 
session_start();
$db = mysqli_connect("localhost", "root_con", "root_connexion","cv4u")
or die('could not connect to database');

$email = mysqli_real_escape_string($db,htmlspecialchars($_POST['mail']));
$mdp = mysqli_real_escape_string($db,htmlspecialchars($_POST['mdp']));
if(isset($email) && isset($mdp) && !empty($email) && !empty($mdp)){
    $req = 'SELECT pwd FROM utilisateurs WHERE mail ="'.$email.'";';
    $exe_req = mysqli_query($db,$req);
    $rep = mysqli_fetch_array($exe_req);
    if(!empty($rep)){
        if(password_verify($mdp, $rep['pwd'])){
            $requete = 'SELECT prenom FROM utilisateurs WHERE mail="'.$email.'";';
            $exe_requete = mysqli_query($db,$requete);
            $reponse = mysqli_fetch_array($exe_requete);
            if(!empty($reponse)){
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