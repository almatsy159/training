<?php

class AuthentificationControleur{

    private $parametre = array();
    private $oModele; // Instance de la classe AccueilModele
    private $oVue; // Instance de la classe AccueilVue

    public function __construct($parametre)
    {
        //Initialisation des paramètres reçus
        $this->parametre = $parametre;
        // Création d'une instance sur la classe AccueilVue
        $this->oModele = new AuthentificationModele($parametre);

        $this->oVue = new AuthentificationVue($parametre);
    }

    public function form_authentifier()
    {
        //var_dump($this->parametre);
        $prepareAuthentification = new AuthentificationTable($this->parametre);
        $this->oVue->genererAffichage($prepareAuthentification);
    }

    public function authentifier(){

        $controleAuthentification= new AuthentificationTable($this->parametre);

        // 2 Controles : saisie utilisateur (getAutorisationSession())
        // Login ET Pw trouvés en bd (Accord entre saisie utilisateur et donnée mémorisées)
        if($controleAuthentification->getAutorisationSession() == false ||
            $this->oModele->rechercherVendeur($controleAuthentification) == false){

            // Retour au formulaire

            $this->oVue->genererAffichage($controleAuthentification);

        }else{

            header('Location:index.php');
        }
    }

    public function deconnecter(){

        session_destroy();
        $_SESSION = array();
        header('Location:index.php');
    }
}