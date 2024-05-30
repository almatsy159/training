<?php

class ClientVue
{

    private $parametre = array();
    private $tpl; // Objet Smarty

    public function __construct($parametre)
    {
        //Initialisation des paramètres reçus
        $this->parametre = $parametre;

        $this->tpl = new Smarty();

    }

    public function chargementValeurs()
    {

        $this->tpl->assign('titreOnglet', 'GOURMANDISE SARL');
        $this->tpl->assign('deconnexion', 'Déconnexion');
        $this->tpl->assign('login', $_SESSION['prenomNom']);
    }

    public function genererAffichageListe($valeurs)
    {

        $this->chargementValeurs();

        $this->tpl->assign('titrePage', 'Liste des clients');

        $this->tpl->assign('message', ClientTable::getMessageSucces());

        $this->tpl->assign('listeClients', $valeurs);

        $this->tpl->assign('login', $_SESSION['prenomNom']);

        $this->tpl->display('mod_client/vue/clientListeVue.tpl');
    }

    public function genererAffichageFiche($valeurs)
    {

//        var_dump($valeurs);

        $this->chargementValeurs();

        switch( $this->parametre['action']){

            case 'form_consulter':

                $this->tpl->assign('action', 'consulter');

                $this->tpl->assign('titrePage', 'Fiche Client : Consultation');

                $this->tpl->assign('unClient', $valeurs);

                $this->tpl->assign('readonly', 'disabled');

                break;


            case 'form_ajouter':
            case 'ajouter':

                $this->tpl->assign('action', 'ajouter');

                $this->tpl->assign('titrePage', 'Fiche Client : Création');

                $this->tpl->assign('unClient', $valeurs);

                $this->tpl->assign('readonly', '');

                break;

            case 'form_modifier' :
            case 'modifier' :

                $this->tpl->assign('action', 'modifier');

                $this->tpl->assign('titrePage', 'Fiche Client : Modification');

                $this->tpl->assign('unClient', $valeurs);

                $this->tpl->assign('readonly', '');

                break;

            case 'form_supprimer':
            case 'supprimer' :

                $this->tpl->assign('action', 'supprimer');

                $this->tpl->assign('titrePage', 'Fiche Client : Suppression');

                $this->tpl->assign('unClient', $valeurs);

                $this->tpl->assign('readonly', 'disable');

        }


        $this->tpl->display('mod_client/vue/clientFicheVue.tpl');
    }
}
