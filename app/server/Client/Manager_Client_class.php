<?php

/**
 * Created by PhpStorm.
 * User: PC
 * Date: 13/10/2016
 * Time: 13:54
 */
class Manager_Client_class
{
    private $_BDD;

    public function __construct()
    {
        $this->_BDD = new PDO('mysql:host=localhost;dbname=db_dentiste;charset=utf8','root','root');;
    }

    public function AjouterRdv($Client)
    {
        $req = $this->_BDD->prepare('INSERT INTO client (Nom, Prenom, DateNaissance, Adresse, CodePostal, Ville, Email, TelFixe, TelPortable, RendezVous)
              VALUES (:Nom, :Prenom, :DateNaissance, :Adresse, :CodePostal, :Ville, :Email, :TelFixe, :TelPortable, :RendezVous)');
        $req->execute(array(
            'Nom' => strtoupper(trim($Client->__get('_Nom'))),
            'Prenom' => ucfirst(trim($Client->__get('_Prenom'))),
            'DateNaissance' => $Client->__get('_DateNaissance'),
            'Adresse' => $Client->__get('_Adresse'),
            'CodePostal' => $Client->__get('_CodePostal'),
            'Ville' => $Client->__get('_Ville'),
            'Email' => $Client->__get('_Email'),
            'TelFixe' => $Client->__get('_TelFixe'),
            'TelPortable' => $Client->__get('_TelPortable'),
            'RendezVous' => $Client->__get('_RendezVous')
        ));
        $req->closeCursor();
    }

    public function getClient($Id)
    {
        $req = $this->_BDD->prepare('SELECT * from client where Id = ?');
        $req->execute(array($Id));
        $argument = $req->fetch();

        if ($argument['Id'] == $Id)
        {
            return new Client_class($argument['Id'], $argument['Nom'], $argument['Prenom'], $argument['DateNaissance'],$argument['Adresse'], $argument['CodePostal'], $argument['Ville'],
                $argument['Email'], $argument['TelFixe'], $argument['TelPortable'], $argument['RendezVous']);
        }
        else
        {
            throw new Exception("Client Introuvable !");
        }
        //$req->closeCursor();
    }

    public function getRdv()
    {
        $req = $this->_BDD->prepare('SELECT * from client where DATE(rendezVous) = CURRENT_DATE ');
        $req->execute();

        $Tableau_Client = array();

        $output = "";
        while ($argument = $req->fetch())
        {
            try
            {
                if ($output != "") {$output .= ",";}
                $Client = $this->getClient($argument['Id']);
                //$Tableau_Client[] = $Client;
                $output .= '{"Nom":"' .$Client->__get('_Nom') . '",';
                $output .= '"Prenom":"' .$Client->__get('_Prenom') . '",';
                $output .= '"DateNaissance":"' .$Client->__get('_DateNaissance') . '",';
                $output .= '"Adresse":"' .$Client->__get('_Adresse') . '",';
                $output .= '"CodePostal":"' .$Client->__get('_CodePostal') . '",';
                $output .= '"Ville":"' .$Client->__get('_Ville') . '",';
                $output .= '"Email":"' .$Client->__get('_Email') . '",';
                $output .= '"TelFixe":"' .$Client->__get('_TelFixe') . '",';
                $output .= '"TelPortable":"' .$Client->__get('_TelPortable') . '",';
                $output .= '"RendezVous":"' .$Client->__get('_RendezVous') . '"}';
            }
            catch (Exception $e)
            {

            }
        }
        $output = '{"rendezVous":['.$output.']}';

        $req->closeCursor();
        return $output;
    }

}