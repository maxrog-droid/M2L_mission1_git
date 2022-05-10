<?php
session_start();
if(isset($_POST['Submit'])){ 
$id=  $_SESSION['id'];
$demande= $_POST['demande'];
include_once("config.php");
mysqli_query($mysqli,"INSERT INTO `demande` (`id_demande`, `type_demande`, `id_user`, `id_responsable`, `statut`, `etat`, `commentaire`, `id_employe`, `dateDemande`) VALUES (NULL, '$demande', '$id', NULL, 'non affecte', NULL, NULL, NULL, NOW())");
 }

?>	