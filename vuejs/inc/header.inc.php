<?php require_once "init.inc.php"; ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Vue.Js Hicham Hadjaj</title>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<!------------- Logo du site ------------------->
    <link rel="icon" href="./assets/img/Vue.js.png" type="image/png" />
	<!-- CDN CSS BOOTSTRAP -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	  <!-- CDN FONT AWESOME-->
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

	<!-- Lien vers le fichier du style css  en derniere position-->
    <link href="./assets/style/style.css" rel="stylesheet" />
</head>
<body>		  
        

	<nav class="navbar navbar-expand-lg navbar" style="background-color: #3FB27F;">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse " id="navbarSupportedContent" style= "justify-content: space-between; margin: 0;">
	    <ul class="navbar-nav mr-auto">
		<li class="nav-item">
	        <a class="navbar-brand mb-0 h1" href="<?php echo URL; ?>index2.php">Accueil</a>
	      </li>
		  

	  <?php if( userConnect() ) : //Si l'utilisateur est connecté, on affiche les liens 'profil' et 'deconnexion' ?>  

	      <li class="nav-item">
	        <a class="navbar-brand mb-0 h1" href="<?= URL ?>profil.php">Profil</a>
	      </li>

	      <li class="nav-item">
	        <a class="navbar-brand mb-0 h1" href="<?= URL ?>connexion.php?action=deconnexion">Deconnexion</a>
	      </li>

	  <?php else : //sinon, c'est que l'on est pas connecté, on affiche les liens 'inscription' et 'connexion'?>

	      <li class="nav-item">
	        <a class="navbar-brand mb-0 h1" href="<?= URL ?>inscription.php">Inscription</a>
	      </li>

	      <li class="nav-item">
	        <a class="navbar-brand mb-0 h1" href="<?= URL ?>connexion.php">Connexion</a>
	      </li>

		  
	      <li class="nav-item">
	        <a class="navbar-brand mb-0 h1" href="<?= URL ?>contact.php">Contact</a>
	      </li>

	  <?php endif; ?>

	 

	    </ul>
	  </div>
	</nav>

	<style>
		.navbar-nav{
    width: 80% !important;
    margin: 0 auto;
    justify-content: space-around;
}
a:hover{
	background:#3FB27F;
	font-size: 1.5em;
}
		</style>