<?php

/**
 * Classe héritée de modele.php
 * Class ClientModele
 */
class ClientModele extends Modele{

    private $parametre = array();

    public function __construct($parametre){

        //Initialisation des paramètres reçus
        $this->parametre = $parametre;

    }

    public function getListeClients(){

        // Requête simple attendue de type SELECT
        $sql = 'SELECT * FROM client';
        $resultat = $this->executeRequete($sql);
        return $resultat->fetchall(PDO::FETCH_ASSOC);

    }

    public function getUnClient(){

        $sql = 'SELECT * FROM client WHERE codec = ?';

        $resultat = $this->executeRequete($sql, array($this->parametre['codec']));

        return new ClientTable($resultat->fetch(PDO::FETCH_ASSOC));
    }

    public function addClient(ClientTable $client){

        //Requête de type INSERT
        $sql = 'INSERT INTO client (nom, adresse, cp, ville, telephone) '
             . 'VALUES (?,?,?,?,?)';

        $resultat = $this->executeRequete($sql, array(
            $client->getNom(),
            $client->getAdresse(),
            $client->getCp(),
            $client->getVille(),
            $client->getTelephone()
        ));

        if($resultat) {

            ClientTable::setMessageSucces("Client enregistré avec succès.");

        }

    }

    public function editClient(ClientTable $client){

        $sql ='UPDATE client SET nom = ?, adresse = ?, cp = ?, ville = ?, telephone = ? WHERE codec = ?';

        $resultat = $this->executeRequete($sql, array(
            $client->getNom(),
            $client->getAdresse(),
            $client->getCp(),
            $client->getVille(),
            $client->getTelephone(),
            $client->getCodec()
        ));

        if($resultat) {

            ClientTable::setMessageSucces("Client enregistré avec succès.");

        }
    }

    public function suppressionPossible(){

        $sql = 'SELECT COUNT(codec) as nombre FROM commande WHERE codec = ?';

        $resultat = $this->executeRequete($sql, array($this->parametre['codec']));

        $row = $resultat->fetch(PDO::FETCH_ASSOC);

        if ($row['nombre'] > 0){

            return false;

        }else{

            return true;
        }
    }

    public function deleteClient(){

        $sql = 'DELETE FROM client WHERE codec = ?';
        $resultat = $this->executeRequete($sql, array($this->parametre['codec']));

        if($resultat) {

            ClientTable::setMessageSucces("Client supprimé avec succès.");

        }
    }

    public function stat01(ClientTable $valeurs){

        $sql = "SELECT SUM(total_ht) as st01 FROM commande WHERE codec = ?";
        $idRequete = $this->executeRequete($sql,array($this->parametre['codec']));

        $row = $idRequete->fetch(PDO::FETCH_ASSOC);

        if($row['st01'] != null){

            $valeurs->setStat01($row['st01']);

        }else{

            $valeurs->setStat01(0);

        }
    }

    public function stat02(ClientTable  $valeurs){

        $sql = "SELECT ROUND(100*((SELECT SUM(total_ht) FROM commande WHERE codec = ? )/SUM(total_ht)),2) AS st02 FROM commande";
        $idRequete = $this->executeRequete($sql,array($this->parametre['codec']));

        $row = $idRequete->fetch(PDO::FETCH_ASSOC);

        if($row['st02'] != null){

            $valeurs->setStat02($row['st02']);

        }else{

            $valeurs->setStat02(0);

        }
    }

    public function stat03(ClientTable  $valeurs){

        $sql = "SELECT designation, SUM(quantite_demandee) AS 'st03' FROM produit, commande, ligne_commande WHERE produit.reference = ligne_commande.reference 
                    AND commande.numero = ligne_commande.numero AND commande.codec = ? GROUP BY designation ORDER BY 2 DESC LIMIT 5";
        $idRequete = $this->executeRequete($sql,array($this->parametre['codec']));

        $row = $idRequete->fetchall(PDO::FETCH_ASSOC);
        // var_dump($row);
        if($row != null){

            $valeurs->setStat03($row);

        }else{

            $valeurs->setMessageErreur("Aucun produit acheté");

        }
    }
}


