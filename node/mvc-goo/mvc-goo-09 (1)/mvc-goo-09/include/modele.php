<?php

/**
 * Class Modele : abstraite (non instanciable)
 * Elle gère la connexion à la base de données
 * et l'exécution des requêtes simples et préparées
 */
abstract class Modele
{

    /**
     * @var object cnx identifiant de connexion
     */
    private $cnx;

    /**
     * Méthode (fonction) pouvant exécuter une requête simple en l'absence de
     * paramètre ou bien une requête préparée dans le cas contraire
     *
     * @param string $sql la requête SQL
     * @param array $parametres éventuellement les valeurs pour une
     * requête préparée
     *
     * @return object jeu de résultats de la requête
     */
    protected function executeRequete($sql, $parametres = NULL)
    {
        if ($parametres == NULL) {

            $resultat = $this->getCnx()->query($sql); //Requête simple

        } else {

            $resultat = $this->getCnx()->prepare($sql); // Requête préparée
            $resultat->execute($parametres);
        }

        return $resultat;
    }


    /**
     * @return object|PDO (identifiant de connexion à MySQL)
     */
    private function getCnx()
    {

        if ($this->cnx == null) {

            $this->cnx = new PDO('mysql:host=' . SERVEUR . ';dbname=' . BASEDEDONNEES,
                UTILISATEUR, MOTDEPASSE, array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }

        return $this->cnx;
    }

}
