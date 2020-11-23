<?php require_once 'inc/header.inc.php'; ?>
<?php

//DECONNEXION :
if( isset( $_GET['action'] ) && $_GET['action'] == 'deconnexion' ){
//Si il y a une 'action' dans l'URL ET que cette 'action est égale à 'deconnexion, alors on détruit la session

	session_destroy();
}

//---------------------------------------------------------------------------------

if( userConnect() ){ //si l'internaute est connecté :

	header('location:profil.php');  //redirection vers la page profil
	exit();
}

//---------------------------------------------------------------------------------
if( $_POST ){ //si on clique sur "connexion"

	//debug( $_POST );

	$r = execute_requete(" SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]' ");
	//$r = execute_requete(' SELECT * FROM membre WHERE pseudo = '.$_POST['pseudo'].'');

	//Si il y a une correpondante dans la table 'membre', $r renverra 1 ligne de résultat
	if( $r->rowCount() >= 1 ){

		//je récupère les données pour les exploiter
		$membre = $r->fetch( PDO::FETCH_ASSOC );
		debug( $membre );

		//verification du mdp : si le mdp est correct, on va renseigner des informations dans notre fichier de session
		if( password_verify( $_POST['mdp'], $membre['mdp'] ) ){

			$_SESSION['membre']['id_membre'] = $membre['id_membre'];
			$_SESSION['membre']['pseudo'] = $membre['pseudo'];
			$_SESSION['membre']['mdp'] = $membre['mdp'];
			$_SESSION['membre']['prenom'] = $membre['prenom'];
			$_SESSION['membre']['nom'] = $membre['nom'];
			$_SESSION['membre']['email'] = $membre['email'];
			$_SESSION['membre']['sexe'] = $membre['sexe'];
			$_SESSION['membre']['ville'] = $membre['ville'];
			$_SESSION['membre']['cp'] = $membre['cp'];
			$_SESSION['membre']['adresse'] = $membre['adresse'];
			$_SESSION['membre']['statut'] = $membre['statut'];

			//debug( $_SESSION );
			//redirection vers la page profil
			header('location:profil.php');
		}
		else{

			$error .= 'div class="alert alert-danger col-md-3 mb-2">Erreur mdp</div>';
		}
	}
	else{

		$error .= 'div class="alert alert-danger col-md-3 mb-2">Erreur pseudo</div>';
	}

}

//---------------------------------------------------------------------------------------
?>
<h1>Connexion</h1>

<?= $error; //Affichage des erreurs ?>

<form method="post">
<div class="form-row">
    <div class="col-md-4 mb-3">
	<label for="pseudo">Pseudo</label><br>
	<input type="text" id="pseudo" name="pseudo" class="form-control"><br>

	<label for="mdp">Mot de passe</label><br>
	<input type="text" id="mdp" name="mdp" class="form-control"><br>

	<input type="submit" value="Connexion" class="btn btn-success">
</div>
</div>
</form>


<?php require_once 'inc/footer.inc.php'; ?>


<style>
	
	.form-row{
		margin-left: 10px;
		width: 100%;
		border-radius: 8px;
	}
	.col-md-4{
		background:#EAEDED;
		border-radius: 8px;
	}
	.alert{
        margin-left: 10px;
    }
	.btn:hover{
        font-size: 1.5em;
    }
	</style>