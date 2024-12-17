<?php

/**
 * Class Accueil - accueil.php => routeur du module accueil
 */
class Accueil{

    private $parametre = array(); //ensemble d'informations champs cachés, info en provenance des formulaires ...
    private $oControleur; // propriété de type objet

    public function __construct($parametre){

        //Initialisation des paramètres reçus
        $this->parametre = $parametre;

        //Création d'une instance controleur
        $this->oControleur = new AccueilControleur($parametre);

    }

    //Ici on aura le traitement des actions
    public function choixAction(){

        // switch en fonction des différentes actions demandées.
        // Par défaut lister()

        $this->oControleur->lister();

    }
}