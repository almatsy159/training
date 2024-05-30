<?php

class Autoloader{

    public static function chargerClasse(){

        spl_autoload_register(array(__CLASS__,'autoload'));

    }


    public static function autoload($maClasse){
        // $maClasse accepte au moment de l'instanciation d'un objet
        // des valeurs comme : 'AccueilControleur', 'ClientModele', ...

        // lcfirst() met en minuscule la première lettre de la valeur passée
        // en argument.
        $maClasse = lcfirst($maClasse);

        // Chargement dans une variable (tableau) la liste des répertoires
        // qui peuvent contenir une classe
        $repertoires = array(
            'mod_accueil/',
            'mod_accueil/controleur/',
            'mod_accueil/modele/',
            'mod_accueil/vue/',
            'mod_client/',
            'mod_client/controleur/',
            'mod_client/modele/',
            'mod_client/vue/',
            'mod_authentification/',
            'mod_authentification/controleur/',
            'mod_authentification/modele/',
            'mod_authentification/vue/',
            'mod_produit/',
            'mod_produit/controleur/',
            'mod_produit/modele/',
            'mod_produit/vue/'
        );

        foreach($repertoires as $repertoire){
            //vérifier si le fichier existe
            if(file_exists($repertoire.$maClasse.'.php')){
                require_once($repertoire.$maClasse.'.php');
                return;
            }
        }
    }


}
