<?php

/**
 * Classe héritée de modele.php
 * Class ProduitModele
 */
class ProduitModele extends Modele
{

    private $parametre = array();

    public function __construct($parametre)
    {

        //Initialisation des paramètres reçus
        $this->parametre = $parametre;

    }

    public function getListeProduits()
    {

        // Requête simple attendue de type SELECT
        $sql = 'SELECT * FROM produit';
        $resultat = $this->executeRequete($sql);
        return $resultat->fetchall(PDO::FETCH_ASSOC);

    }

    public function getUnProduit(){

        $sql = 'SELECT * FROM produit WHERE reference = ?';

        $resultat = $this->executeRequete($sql, array($this->parametre['reference']));

        return new ProduitTable($resultat->fetch(PDO::FETCH_ASSOC));
    }

    public function addProduit(ProduitTable $produit){

        //Requête de type INSERT
        $sql = 'INSERT INTO produit (designation, quantite, descriptif, prix_unitaire_HT, stock, poids_piece) '
            . 'VALUES (?,?,?,?,?,?)';

        $resultat = $this->executeRequete($sql, array(
            $produit->getDesignation(),
            $produit->getQuantite(),
            $produit->getDescriptif(),
            $produit->getPrix_unitaire_HT(),
            $produit->getStock(),
            $produit->getPoids_piece()
        ));

        if($resultat) {

            ProduitTable::setMessageSucces("Produit enregistré avec succès.");

        }

    }

    public function editProduit(ProduitTable $produit){

        $sql ='UPDATE produit SET designation = ?, quantite = ?, descriptif = ?, prix_unitaire_HT = ?, stock = ?, poids_piece = ? WHERE reference = ?';

        $resultat = $this->executeRequete($sql, array(
            $produit->getDesignation(),
            $produit->getQuantite(),
            $produit->getDescriptif(),
            $produit->getPrix_unitaire_HT(),
            $produit->getStock(),
            $produit->getPoids_piece(),
            $produit->getReference()
        ));

        if($resultat) {

            ProduitTable::setMessageSucces("Produit enregistré avec succès.");

        }
    }

    public function suppressionPossible(){

        $sql = 'SELECT COUNT(reference) as nombre FROM ligne_commande WHERE reference = ?';

        $resultat = $this->executeRequete($sql, array($this->parametre['reference']));

        $row = $resultat->fetch(PDO::FETCH_ASSOC);

        if ($row['nombre'] > 0){

            return false;

        }else{

            return true;
        }
    }

    public function deleteProduit(){

        $sql = 'DELETE FROM produit WHERE reference = ?';
        $resultat = $this->executeRequete($sql, array($this->parametre['reference']));

        if($resultat) {

            ProduitTable::setMessageSucces("Produit supprimé avec succès.");

        }
    }

    public function stat01(ProduitTable $valeurs){

        $sql = "SELECT CASE WHEN descriptif = 'G' THEN ((prix_unitaire_HT * 1000) / quantite) WHEN descriptif = 'P' THEN ((prix_unitaire_HT * 1000) / (quantite * poids_piece))END as 'st01'
                    FROM produit WHERE reference = ? ";
        $idRequete = $this->executeRequete($sql,array($this->parametre['reference']));

        $row = $idRequete->fetch(PDO::FETCH_ASSOC);

        if($row['st01'] != null){

            $valeurs->setStat01($row['st01']);

        }else{

            $valeurs->setStat01(0);
        }
    }
}