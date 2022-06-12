<?php 
session_start();

include_once __DIR__ .'/vendor/tinybutstrong/opentbs/demo/tbs_class.php';
include_once __DIR__ .'/vendor/tinybutstrong/opentbs/tbs_plugin_opentbs.php';
include_once __DIR__ .'/ClasseTableau.php';
include_once __DIR__ .'/CvGenerator.php';

$_POST['nomTemplate'] = $_SESSION['nomTemplate'];
$donnees = new Tableau($_POST,$_FILES);
$cv = new CvGenerator();
$cv->startCv($donnees->transmettreDonnees());
header('Location: index.php');
