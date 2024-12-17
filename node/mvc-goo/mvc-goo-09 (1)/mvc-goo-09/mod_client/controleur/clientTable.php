<?php
class ClientTable
{

    // 1 Déclaration des propriétés
    private $codec = "";
    private $nom = "";
    private $adresse = "";
    private $cp = "";
    private $ville = "";
    private $telephone = "";

    private $autorisationBd = true;

    private static $messageErreur = "";
    private static $messageSucces = "";

    private $stat01 = 0; // CA du client
    private $stat02 = 0; // le pourcentage que représente ce CA par rapport au CA global de Gourmandise SARL
    private $stat03 = 0; // les 5 articles les plus achetés par ce client

    // 2 Importer la méthode hydrater()
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

    // 3 définir le constructeur
    public function __construct($data = null)
    {
        if ($data != null) {

            $this->hydrater($data);
        }
    }


    // 4 Générer les getters et les setters

    /**
     * @return string
     */
    public function getCodec()
    {
        return $this->codec;
    }

    /**
     * @param string $codec
     */
    public function setCodec(string $codec)
    {
        $this->codec = $codec;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom)
    {
        if (empty($nom) || ctype_space($nom)) {
            $this->setAutorisationBd(false);
            self::setMessageErreur("Le nom du client est obligatoire. <br>");
        }

        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     */
    public function setAdresse(string $adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return string
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * @param string $cp
     */
    public function setCp(string $cp)
    {
        if (empty($cp) || ctype_space($cp)) {
            $this->setAutorisationBd(false);
            self::setMessageErreur("Le code postal est obligatoire. <br>");
        }
        $this->cp = $cp;
    }

    /**
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param string $ville
     */
    public function setVille(string $ville)
    {
        if (empty($ville) || ctype_space($ville)) {
            $this->setAutorisationBd(false);
            self::setMessageErreur("La ville est obligatoire. <br>");
        }

        $this->ville = $ville;
    }

    /**
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     */
    public function setTelephone(string $telephone)
    {
        $this->telephone = $telephone;
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
     * @return string
     */
    public static function getMessageSucces()
    {

        return self::$messageSucces;
    }

    /**
     * @param string $messageErreur
     */
    public static function setMessageErreur($messageErreur)
    {

        self::$messageErreur = self::$messageErreur . $messageErreur;
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

    public function setStat02($stat02){

        $this->stat02 = $stat02;
    }

    public function getStat02(){

        return $this->stat02;
    }

    public function setStat03($stat03){

        $this->stat03 = $stat03;
    }

    public function getStat03(){

        return $this->stat03;
    }
}
