<?php

/**
 * Class AccueilControleur
 */
class AccueilControleur
{

    private $parametre = array();
    private $oModele; // Instance de la classe AccueilModele
    private $oVue; // Instance de la classe AccueilVue

    public function __construct($parametre)
    {
        //Initialisation des paramètres reçus
        $this->parametre = $parametre;
        // Création d'une instance sur la classe AccueilVue
        $this->oVue = new AccueilVue($parametre);
    }

    public function lister(){
        // Relation avec le modèle
        // puis une réponse : la vue
        $this->oVue->genererAffichageListe();
    }

}
