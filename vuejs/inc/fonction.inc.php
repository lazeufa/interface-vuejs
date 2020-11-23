<?php
//fonction de débugage : debug() : permet  d'effectuer un print_r() "amélioré" :
function debug( $arg ){

	echo '<div style="background:#fda500; padding: 10px; z-index:1000;">';

		$trace = debug_backtrace(); //debug_backtrace() : fonction prédéfinie de php qui retourne un array contenant des infos

		echo 'Debug demandé dans le fichier : ' . $trace[0]['file'] . ' à ligne ' . $trace[0]['line'];

		print '<pre>';
			print_r( $arg );
		print '</pre>';

	echo '</div>';
}

//--------------------------------------------------------------------------------
//fonction execute_requete() : permet d'effectuer une requête 
function execute_requete( $req ){

	global $pdo; 

	$pdostatement = $pdo->query( $req );

	return $pdostatement;
}

//--------------------------------------------------------------------------------
//fonction userConnect() : si l'utilisateur est connecté
function userConnect(){

	if( !isset( $_SESSION['membre'] ) ){ //Si la session 'membre' n'existe pas, cela signifie que l'on n'est pas connecté et donc on va envoyer 'false'

		return false;
	}
	else{ //sinon, c'est que session 'membre' existe et donc que l'on est connecté, on retourne 'true'
		return true; 
	}
}

//--------------------------------------------------------------------------------

