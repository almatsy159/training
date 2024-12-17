<?php

/**
 * Fichier de mappage php <=> html (à l'aide prochainement d'un moteur de template : SMARTY)
 * Class AccueilVue
 */
class AccueilVue{

    private $parametre = array();
    private $tpl; // Objet Smarty

    public function __construct($parametre)
    {
        //Initialisation des paramètres reçus
        $this->parametre = $parametre;

        $this->tpl = new Smarty();

    }

    public function genererAffichageListe(){

        $this->tpl->assign('titreOnglet', 'GOURMANDISE SARL');
        $this->tpl->assign('deconnexion', 'Déconnexion');
        $this->tpl->assign('login', $_SESSION['prenomNom']);
        $this->tpl->assign('tabBord', 'Ici le tableau de bord');

        $this->tpl->display('mod_accueil/vue/accueilVue.tpl');
    }

}
