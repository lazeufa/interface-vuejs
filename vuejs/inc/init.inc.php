<?php
session_start(); //Se positionne TOUJOURS en haut et en premier avant tout traitements php !!

//-------------------------------------------------------
//Connexion à la BDD :
$pdo = new PDO('mysql:host=localhost;dbname=vuejs', 'root', '' , array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES UTF8") );
//var_dump( $pdo );

//-------------------------------------------------------
//Definition d'une constante : 
define('URL', 'http://localhost/cours_php_wf3/vuejs/');

//-------------------------------------------------------
//Definition de variables :
$content = '';
$error = '';

require_once 'fonction.inc.php';
