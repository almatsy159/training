<?php

class AuthentificationVue{

    private $parametre = array();
    private $tpl; // Objet smaarty

    public function __construct($parametre0){

        $this->parametre = $parametre0;
        $this->tpl = new Smarty();
    }

    public function genererAffichage($valeurs){

        $this->valeurs = $valeurs;
        $this->tpl->assign('titreOnglet','GOURMANDISE SARL');
        $this->tpl->assign('titrePage','Authentification Intranet <br> GOURMANDISE SARL');
        $this->tpl->assign('action','authentifier');
        $this->tpl->assign('unVendeur',$this->valeurs);

        // Générer l'affichage (template)

        $this->tpl->display('mod_authentification/vue/authentificationVue.tpl');

    }
}
