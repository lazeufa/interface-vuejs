<?php require_once 'inc/header.inc.php'; ?>
<?php

if( $_POST ){ //Si on clique sur le bouton "submit" (validation du formulaire)

	// debug( $_POST );

	if( empty( $_POST['prenom'] ) ){ 

		$error .= '<div class="alert alert-danger col-md-3 mb-2"> Veuillez entrer un prenom</div>';
	}
	if( empty( $_POST['nom'] ) ){ 

		$error .= '<div class="alert alert-danger col-md-3 mb-2"> Veuillez entrer un nom</div>';
	}
	if( empty( $_POST['email'] ) ){ 

		$error .= '<div class="alert alert-danger col-md-3 mb-2"> Veuillez entrer un mail</div>';
    }
    if( strlen( $_POST['tel'] ) != 10 ){
        
		$error .= '<div class="alert alert-danger col-md-3 mb-2"> Veuillez entrer un numéro a 10 chiffres</div>';
    }
    if( empty( $_POST['msg'] ) ){ 

		$error .= '<div class="alert alert-danger col-md-3 mb-2"> Veuillez entrer un message</div>';
    }


	if( empty( $error ) ){ //SI la variable $error est vide (donc que j'ai bien rempli le formulaire) on fait notre insertion

		

		echo '<div class="alert alert-success"> Message validée.
					<a href="'. URL .'connexion.php">Cliquez ici pour vous connecter</a>
				</div>';
	}
}

//-------------------------------------------------------------------------------------
?><h1>Contact</h1>

<?= $error; //affichage des erreurs ?>

<form method="post">
<div class="form-row">
    <div class="col-md-4 mb-3">
	<label for="prenom">Prénom</label><br>
	<input type="text" id="prenom" name="prenom" class="form-control"><br>
  
	<label for="nom">Nom</label><br>
	<input type="text" id="nom" name="nom" class="form-control"><br>

	<label for="email">Email</label><br>
	<input type="text" id="email" name="email" class="form-control"><br>

    <label for="mdp">Numero de telephone</label><br>
	<input type="text" id="tel" name="tel" class="form-control"><br>

    <div class="form-group">
    <label for="exampleFormControlTextarea1">Message</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div> 
  <input type="submit" value="Envoyer" class="btn btn-success">
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