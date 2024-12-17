<?php

/**
 * Class Produit - produit.php => routeur du module produit
 */
class Produit
{

    private $parametre = array(); //ensemble d'informations champs cachés, info en provenance des formulaires ...
    private $oControleur; // propriété de type objet

    public function __construct($parametre)
    {

        //Initialisation des paramètres reçus
        $this->parametre = $parametre;

        //Création d'une instance controleur
        $this->oControleur = new ProduitControleur($parametre);

    }

    //Ici on aura le traitement des actions
    public function choixAction(){

        // switch en fonction des différentes actions demandées.
        if(isset($this->parametre['action'])){

            switch($this->parametre['action']){

                //Second objectif : consultation
                case 'form_consulter' :

                    $this->oControleur->form_consulter();
                    break;


                case 'form_ajouter' :

                    $this->oControleur->form_ajouter();
                    break;


                case 'ajouter' :

                    $this->oControleur->ajouter();
                    break;

                case 'form_modifier' :

                    $this->oControleur->form_modifier();
                    break;

                case 'modifier' :

                    $this->oControleur->modifier();
                    break;

                case 'form_supprimer' :

                    $this->oControleur->form_supprimer();
                    break;

                case 'supprimer' :

                    $this->oControleur->supprimer();
                    break;
            }

        }else{

            // Action par défaut lister()

            $this->oControleur->lister();

        }
    }
}
