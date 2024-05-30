<?php
/**
 * Class Authentification
 */
class Authentification{

    private $parametre = array(); //ensemble d'informations champs cachés, info en provenance des formulaires ...
    private $oControleur; // propriété de type objet

    public function __construct($parametre){

        //Initialisation des paramètres reçus
        $this->parametre = $parametre;

        //Création d'une instance controleur
        $this->oControleur = new AuthentificationControleur($parametre);

    }

    public function choixAction(){

        if(isset($this->parametre['action'])){

            switch($this->parametre['action']){

                case 'authentifier':

                    $this->oControleur->authentifier();

                    break;

                case 'deconnecter':

                    $this->oControleur->deconnecter();

                    break;
            }

        }else{

            // Par defaut, affichage du formulaire d'authentification

            $this->oControleur->form_authentifier();
        }
    }
}