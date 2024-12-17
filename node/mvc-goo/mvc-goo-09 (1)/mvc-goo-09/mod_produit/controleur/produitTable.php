<?php

class ProduitTable{

    private $reference = "";
    private $designation = "";
    private $quantite = "";
    private $descriptif = "";
    private $prix_unitaire_HT = "";
    private $stock = "";
    private $poids_piece = "";

    private $autorisationBd = true;

    private static $messageErreur = "";
    private static $messageSucces = "";

    private $stat01 = 0; // Prix au kg
    //private $stat02 = 0; // Classement du produit

    public function hydrater(array $row)
    {
        foreach ($row as $k => $v) {
            //Concaténer : nom de la méthode de type setter à appeler
            $setter = 'set' . ucfirst($k); // setDomicile
            // vérifier si la méthode de type setter existe ?
            // fonction prédéfine PHP method_exist() qui attend 2 arguments
            if (method_exists($this, $setter)) {
                $this->$setter($v); // $this->setDomicile($domicile);
            }
        }
    }

    public function __construct($data = null)
    {
        if ($data != null) {

            $this->hydrater($data);
        }
    }

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * @param string $designation
     */
    public function setDesignation($designation)
    {
        if (empty($designation) || ctype_space($designation)) {
            $this->setAutorisationBd(false);
            self::setMessageErreur("La désignation du produit est obligatoire. <br>");
        }

        $this->designation = $designation;
    }

    /**
     * @return string
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * @param string $quantite
     */
    public function setQuantite($quantite)
    {
        if (empty($quantite) || ctype_space($quantite) || $quantite == 0) {
            $this->setAutorisationBd(false);
            self::setMessageErreur("La quantité du produit est obligatoire et forcément supérieur à 0. <br>");
        }

        $this->quantite = $quantite;
    }

    /**
     * @return string
     */
    public function getDescriptif()
    {
        return $this->descriptif;
    }

    /**
     * @param string $descriptif
     */
    public function setDescriptif($descriptif)
    {
        if (empty($descriptif) || ctype_space($descriptif) || $descriptif != "G" && $descriptif != "P") {
            $this->setAutorisationBd(false);
            self::setMessageErreur("Le descriptif du produit est soit P pour pièce ou G pour gramme. <br>");
        }

        $this->descriptif = $descriptif;
    }

    /**
     * @return string
     */
    public function getPrix_unitaire_HT()
    {
        return $this->prix_unitaire_HT;
    }

    /**
     * @param string $prix_unitaire_HT
     */
    public function setPrix_unitaire_HT($prix_unitaire_HT)
    {
        if (empty($prix_unitaire_HT) || ctype_space($prix_unitaire_HT) || $prix_unitaire_HT < 0) {
            $this->setAutorisationBd(false);
            self::setMessageErreur("Le tarif HT doit ètre supérieur ou égal à 0. <br>");
        }

        $this->prix_unitaire_HT = $prix_unitaire_HT;
    }

    /**
     * @return string
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param string $stock
     */
    public function setStock($stock)
    {
        if (empty($stock) || ctype_space($stock) || $stock < 0) {
            $this->setAutorisationBd(false);
            self::setMessageErreur("Le stock doit ètre supérieur ou égal à 0. <br>");
        }

        $this->stock = $stock;
    }

    /**
     * @return string
     */
    public function getPoids_piece()
    {
        return $this->poids_piece;
    }

    /**
     * @param string $poids_piece
     */
    public function setPoids_piece($poids_piece)
    {
        if (!is_numeric($poids_piece) || $poids_piece == '' || ctype_space($poids_piece)) {
            $this->setAutorisationBd(false);
            self::setMessageErreur("Le poids pièce est obligatoire. <br>");

            // Solution Maxime
        }elseif (($this->getDescriptif() == 'P' && $poids_piece == 0) || ($this->getDescriptif() == 'G' && ($poids_piece > 0 || $poids_piece < 0))) {
            $this->setAutorisationBd(false);
            self::setMessageErreur('Si le Descriptif est égal à G, le Poids pièce doit être égal à 0 sinon il doit être supérieur à 0. ');
        }

            // Ma solution
//        }elseif ($descriptif = "G" && $poids_piece != "0"){
//            $this->setAutorisationBd(false);
//            self::setMessageErreur("Si le descriptif est G, le poids pièce doit ètre égal à 0. <br>");
//
//        }elseif ($descriptif = "P" && $poids_piece == "0"){
//            $this->setAutorisationBd(false);
//            self::setMessageErreur("Si le descriptif est P, le poids pièce doit ètre supérieur à 0. <br>");
//        }

        $this->poids_piece = $poids_piece;
    }

    /**
     * @return bool
     */
    public function getAutorisationBd()
    {
        return $this->autorisationBd;
    }

    /**
     * @param bool $autorisationBd
     */
    public function setAutorisationBd($autorisationBd)
    {
        $this->autorisationBd = $autorisationBd;
    }

    /**
     * @return string
     */
    public static function getMessageErreur()
    {
        return self::$messageErreur;
    }

    /**
     * @param string $messageErreur
     */
    public static function setMessageErreur($messageErreur)
    {
        self::$messageErreur = self::$messageErreur . $messageErreur;
    }

    /**
     * @return string
     */
    public static function getMessageSucces()
    {
        return self::$messageSucces;
    }

    /**
     * @param string $messageSucces
     */
    public static function setMessageSucces($messageSucces)
    {
        self::$messageSucces = self::$messageSucces . $messageSucces;
    }

    public function setStat01(int $stat01)
    {
        $this->stat01 = $stat01;
    }

    public function getStat01()
    {
        return $this->stat01;
    }
}