<?php require_once 'inc/header.inc.php'; ?>
<?php

if( $_POST ){ //Si on clique sur le bouton "submit" (validation du formulaire)

	// debug( $_POST );

	if( strlen( $_POST['pseudo'] ) <= 3 || strlen( $_POST['pseudo'] ) >= 20 ){
		//strlen( $arg ) : retourne la taille de l'argument 
		//SI la taille du speudo est inférieure ou égale à 3 OU que la taille est supérieure ou égale à 20 => on affiche un message d'erreur

		$error .= '<div class="alert alert-danger col-md-3 mb-2"> Veuillez entrer un pseuso entre 6 et 20 caracteres</div>';
	}
	if( strlen( $_POST['mdp'] ) != 6 ){
        
		$error .= '<div class="alert alert-danger col-md-3 mb-2"> Veuillez entrer un mots de passe 6 caracteres</div>';
	}
	if( empty( $_POST['prenom'] ) ){ 

		$error .= '<div class="alert alert-danger col-md-3 mb-2"> Veuillez entrer un prenom</div>';
	}
	if( empty( $_POST['nom'] ) ){ 

		$error .= '<div class="alert alert-danger col-md-3 mb-2"> Veuillez entrer un nom</div>';
	}
	if( empty( $_POST['email'] ) ){ 

		$error .= '<div class="alert alert-danger col-md-3 mb-2"> Veuillez entrer un mail</div>';
	}
	if( empty( $_POST['ville'] ) ){ 

		$error .= '<div class="alert alert-danger col-md-3 mb-2"> Veuillez entrer une ville</div>';
	}
	if( strlen( $_POST['cp'] ) != 5 ){
        
        $error .= '<div class="alert alert-danger col-md-3 mb-2"> Veuillez entrer un code postal de 5 chiffres</div>';
     }
    if( !is_numeric( $_POST['cp'] ) ){ 
 
        $error .= '<div class="alert alert-danger col-md-3 mb-2"> Veuillez entrer un code postal </div>';
     }
	
	if( empty( $_POST['adresse'] ) ){

			$error .= '<div class="alert alert-danger col-md-3 mb-2"> Veuillez entrer une adresse</div>';	
    	}
	

	//Teste si le pseudo est disponible : 
	$r = execute_requete(" SELECT pseudo FROM membre WHERE pseudo = '$_POST[pseudo]' ");
	//le '$r' représente le PDOStatement => voir fonction execute_requete()

	if( $r->rowCount() >= 1 ){
	//Si le resultat est supérieur ou égal à 1, c'est que le pseudo est déjà attribué (car il aura trouvé une correspondance dans la table 'membre' et donc renverra une ligne de résultat) 		
		$error .= '<div class="alert alert-danger col-md-3 mb-2""> Pseudo indisponible </div>';
	}

	//Boucle sur les saisies afin de les passer dans la fonction addslashes
	foreach ($_POST as $key => $value) {

		$_POST[$key] = addslashes( $value );
		//addslashes() : permet d'accepter les apostrophes 
	}

	//Cryptage du mot de passe : 
	$_POST['mdp'] = password_hash( $_POST['mdp'] , PASSWORD_DEFAULT);
	//password_hash() : permet de créer une clé de hachage

	if( empty( $error ) ){ //SI la variable $error est vide (donc que j'ai bien rempli le formulaire) on fait notre insertion

		execute_requete(" INSERT INTO membre(pseudo, mdp, prenom, nom, email, sexe, ville, cp, adresse) VALUES( 
							'$_POST[pseudo]',
							'$_POST[mdp]',
							'$_POST[prenom]',
							'$_POST[nom]',
							'$_POST[email]',
							'$_POST[sexe]',
							'$_POST[ville]',
							'$_POST[cp]',
							'$_POST[adresse]'
						) ");

		echo '<div class="alert alert-success"> Inscription validée.
					<a href="'. URL .'connexion.php">Cliquez ici pour vous connecter</a>
				</div>';
	}
}

//-------------------------------------------------------------------------------------
?>
<h1>Inscription</h1>

<?= $error; //affichage des erreurs ?>

<form method="post">
<div class="form-row">
    <div class="col-md-4 mb-3">
	<label for="pseudo">Pseudo</label><br>
	<input type="text" id="pseudo" name="pseudo" class="form-control"><br>

	<label for="mdp">Mot de passe</label><br>
	<input type="text" id="mdp" name="mdp" class="form-control"><br>

	<label for="prenom">Prénom</label><br>
	<input type="text" id="prenom" name="prenom" class="form-control"><br>

	<label for="nom">Nom</label><br>
	<input type="text" id="nom" name="nom" class="form-control"><br>

	<label for="email">Email</label><br>
	<input type="text" id="email" name="email" class="form-control"><br>

	<label>Civilite</label><br>
	<input type="radio" name="sexe" value="m" checked> Homme <br>
	<input type="radio" name="sexe" value="f"> Femme <br><br>

	<label for="ville">Ville</label><br>
	<input type="text" id="ville" name="ville" class="form-control"><br>

	<label for="cp">Code postal</label><br>
	<input type="text" id="cp" name="cp" class="form-control"><br>

	<label for="adresse">Adresse</label><br>
	<input type="text" id="adresse" name="adresse" class="form-control"><br>

	<input type="submit" value="S'inscrire" class="btn btn-success">
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