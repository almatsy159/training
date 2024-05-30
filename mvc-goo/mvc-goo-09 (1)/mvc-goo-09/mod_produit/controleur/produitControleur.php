<?php

/**
 * Class ProduitControleur
 */
class ProduitControleur
{

    private $parametre = array();
    private $oModele; // Instance de la classe AccueilModele
    private $oVue; // Instance de la classe AccueilVue

    public function __construct($parametre)
    {
        //Initialisation des paramètres reçus
        $this->parametre = $parametre;
        // Création d'une instance sur la classe AccueilVue
        $this->oModele = new ProduitModele($parametre);
        // Création d'une instance sur la classe AccueilVue
        $this->oVue = new ProduitVue($parametre);
    }

    public function lister()
    {
        // Relation avec le modèle
        $valeurs = $this->oModele->getListeProduits();
        //var_dump($valeurs);
        // puis une réponse : la vue
        $this->oVue->genererAffichageListe($valeurs);
    }



    public function form_consulter(){

        $valeurs = $this->oModele->getUnProduit();

        $this->oModele->stat01($valeurs);

        // var_dump($valeurs);

        $this->oVue->genererAffichageFiche($valeurs);
    }

    public function form_ajouter(){
        //initialisation à blanc
        $prepareProduit = new ProduitTable();

        // var_dump($prepareProduit);

        $this->oVue->genererAffichageFiche($prepareProduit);
    }

    public function ajouter(){

        // Quel Algo ?
        // Il faut controler les données en provenance du formulaire
        $controleProduit = new ProduitTable($this->parametre);

        // Si une erreur survient
        //   retourner au formulaire en ajout et reproposer les valeurs saisies
        //   afficher le message d'erreur
        // sinon
        //   ecriture en BD (INSERT) - un nouvel enregistrement
        //   retour à la liste des produits avec le message associé (succès)
        // finsi

        if($controleProduit->getAutorisationBd() == false){

            $this->oVue->genererAffichageFiche($controleProduit);

        }else{

            $this->oModele->addProduit($controleProduit);

            $this->lister();

        }
    }

    public function form_modifier(){

        $valeurs = $this->oModele->getUnProduit();

        $this->oModele->stat01($valeurs);

        $this->oVue->genererAffichageFiche($valeurs);


    }

    public function modifier(){

        // Quel Algo ?
        // Il faut controler les données en provenance du formulaire
        $controleProduit = new ProduitTable($this->parametre);

        // Si une erreur survient
        //   retourner au formulaire en mofication et reproposer les valeurs saisies
        //   afficher le message d'erreur
        // sinon
        //   ecriture en BD (UPDATE) - modification d'un enregistrement
        //   retour à la liste des clients avec le message associé (succès)
        // finsi

        if($controleProduit->getAutorisationBd() == false){

            $this->oVue->genererAffichageFiche($controleProduit);

        }else{

            $this->oModele->editProduit($controleProduit);

            $this->lister();

        }
    }

    public function form_supprimer(){

        $valeurs = $this->oModele->getUnProduit();

        $this->oModele->stat01($valeurs);

        $this->oVue->genererAffichageFiche($valeurs);
    }

    public function supprimer(){

        // Quel Algo ?
        // Il faut regarder si le client existe grace a son id dans la base de donnée
        $controleSuppression = $this->oModele->suppressionPossible();

        // Si une erreur survient
        //   retourner au formulaire en mofication et reproposer les valeurs saisies
        //   afficher le message d'erreur
        // sinon
        //   ecriture en BD (UPDATE) - modification d'un enregistrement
        //   retour à la liste des clients avec le message associé (succès)
        // finsi

        if ($controleSuppression == false) {

            ProduitTable::setMessageErreur("Le produit apparait dans au moins une commande");

            $valeurs = $this->oModele->getUnProduit();

            $this->oModele->stat01($valeurs);

            $this->oVue->genererAffichageFiche($valeurs);

        }else{

            $this->oModele->deleteProduit();

            $this->lister();
        }
    }
}