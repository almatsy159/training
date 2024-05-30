<?php
session_start();
require_once ('include/configuration.php');
/**
 * Classe static Autoloader : Permet le chargement automatique des classes
 */
Autoloader::chargerClasse();

//Ici il faudra gérer l'authentification

// variable $gestion = ? $action = ?

if(!isset($_SESSION['login'])){

    $_REQUEST['gestion'] = 'authentification';

}elseif(!isset($_REQUEST['gestion'])){

    $_REQUEST['gestion'] = 'accueil';
}


//var_dump($_REQUEST);

//Instanciation de la classe routeur (Exemple accueil)
$oRouteur = new $_REQUEST['gestion']($_REQUEST);

$oRouteur->choixAction();