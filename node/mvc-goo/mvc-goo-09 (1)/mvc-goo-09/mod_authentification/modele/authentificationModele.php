<?php
class AuthentificationModele extends modele {

    private $parametre = array();

    public function __construct($parametre){

        $this->parametre = $parametre;
    }

    public function rechercherVendeur(AuthentificationTable $vendeur){

        // Requete :
        $sql = 'SELECT * FROM vendeur WHERE login = ?';
        $idRequete =  $this->executeRequete($sql, array($vendeur->getLogin()));

        $vendeurExistant = $idRequete->fetch(PDO::FETCH_ASSOC);

        if($idRequete->rowCount() == 1 && $vendeur->getLogin() == $vendeurExistant['login']
            && $vendeur->getMotDePasse() == $vendeurExistant['motdepasse']){

            // CREATION DE LA SESSION
            $_SESSION['login'] = $vendeur->getLogin();
            $_SESSION['prenomNom'] = $vendeurExistant['prenom'] . ' ' . $vendeurExistant['nom'];
            return true;
        }

        AuthentificationTable::setMessageErreur("Authentification invalide.");
        return false;
    }
}