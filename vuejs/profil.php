<?php require_once "inc/header.inc.php"; ?>
<?php

if( !userConnect() ){ //Si l'internaute N'EST PAS connecté

	//redirection vers connexion.php
	header('location:connexion.php');

	exit(); //exit() : permet de terminer le script courant 
}
//-------------------------------------------------
if( userConnect() ){

	$content .= '<h3 style="color:red;">Adminstrateur</h3>';
}
//-------------------------------------------------
//debug( $_SESSION );

$pseudo = $_SESSION['membre']['pseudo'];

$content .= '<p>Vos informations personnel :</p>';

$content .= '<p>Votre prénom : '. $_SESSION['membre']['prenom'] .'</p>';
$content .= '<p>Votre nom : '. $_SESSION['membre']['nom'] .'</p>';
$content .= '<p>Votre email : '. $_SESSION['membre']['email'] .'</p>';

$content .= '<p>Votre adresse : '. $_SESSION['membre']['adresse'] .' - '. $_SESSION['membre']['cp'] .' à '. $_SESSION['membre']['ville'] .'</p>';

?>

<h1>Page profil</h1>

<h2><?= $pseudo?></h2>

<?= $content //affichage ?>

<?php require_once "inc/footer.inc.php"; ?>