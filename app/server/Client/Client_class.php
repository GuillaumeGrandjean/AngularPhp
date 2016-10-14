<?php

/**
 * Created by PhpStorm.
 * User: PC
 * Date: 12/10/2016
 * Time: 18:22
 */
class Client_class
{
    private $_IdClient;
    private $_Nom;
    private $_Prenom;
    private $_DateNaissance;
    private $_Adresse;
    private $_CodePostal;
    private $_Ville;
    private $_Email;
    private $_TelFixe;
    private $_TelPortable;
    private $_RendezVous;

    /**
     * Client_Class constructor.
     * @param $_nom
     * @param $_prenom
     * @param $_dateNaissance
     * @param $_adresse
     * @param $_codePostal
     * @param $_ville
     * @param $_email
     * @param $_telFixe
     * @param $_telPortable
     * @param $_nouveauClient
     */
    public function __construct($_idClient, $_nom, $_prenom, $_dateNaissance, $_adresse, $_codePostal, $_ville, $_email, $_telFixe, $_telPortable, $_rendezVous)
    {
        $this->_IdClient = $_idClient;
        $this->_Nom = $_nom;
        $this->_Prenom = $_prenom;
        $this->_DateNaissance = $_dateNaissance;
        $this->_Adresse = $_adresse;
        $this->_CodePostal = $_codePostal;
        $this->_Ville = $_ville;
        $this->_Email = $_email;
        $this->_TelFixe = $_telFixe;
        $this->_TelPortable = $_telPortable;
        $this->_RendezVous = $_rendezVous;
    }


    private function Attribut_Existe($name)
    {
        if (isset($this->$name))
        {
            return true;
        }
        else
        {
            throw new Exception("Attribut Introuvable !", 1);
        }
    }

    public function __get($name)
    {
        try
        {
            if ($this->Attribut_Existe($name))
            {
                return $this->$name;
            }
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
    }



   /* public function updateClient() {
        return "INSERT INTO client (nom, prenom, dateNaissance, adresse, codePostal, ville, email, telFixe, telPortable, rendezVous)
              VALUES (:nom, :prenom, :dateNaissance, :adresse, :codePostal, :ville, :email, :telFixe, :telPortable, :rendezVous)";
    }

    public function selectClient($rendezVous) {
        return "SELECT * from client where rendezVous = ".$rendezVous;
    }*/


}