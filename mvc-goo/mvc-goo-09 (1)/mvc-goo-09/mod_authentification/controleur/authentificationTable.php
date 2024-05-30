<?php

class AuthentificationTable{

    private $login = "";
    private $motdepasse = "";
    private $autorisationSession = true;

    private static $messageErreur = "";

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
        if($data != null) {

            $this->hydrater($data);
        }
    }

    public function setLogin($login){

        if (empty($login) || ctype_space($login)){

            self::setMessageErreur("Vous devez saisir votre login."."<br>");
            $this->setAutorisationSession(false);
        }

        $this->login = $login;

    }

    public function setMotDePasse($motdepasse){

        if (!ctype_space($motdepasse) && !empty($motdepasse)){
            // Methode de chiffrage

            $gauche = "ar30&y%";
            $droite = "tk!@";

            // Hash attend 2 arguments : l'alogorytme, le mot de passe

            $this->motdepasse = hash('ripemd128', "$gauche$motdepasse$droite");

        }else{

            self::setMessageErreur("Vous devez saisir un mot de passe.");
            $this->setAutorisationSession(false);
            $this->motdepasse = "";
        }
    }

    public function setAutorisationSession($bool){

        $this->autorisationSession = $bool;
    }

    public static function setMessageErreur($messageErreur){

        self::$messageErreur = self::$messageErreur . $messageErreur;
    }

    public static function getMessageErreur(){

        return self::$messageErreur;
    }

    public function getLogin(){

        return $this->login;
    }

    public function getMotDePasse(){

        return $this->motdepasse;
    }

    public function getAutorisationSession(){

        return $this->autorisationSession;
    }
}