<?php

require 'bdd.php';
require 'Client/Client_class.php';

require 'Client/Manager_Client_class.php';

$post_date = file_get_contents("php://input");
$data = json_decode($post_date);

$dateNaissance = date('Y-m-d H:i:s', strtotime($data->dateNaissance));
$rendezVous = date('Y-m-d H:i:s', strtotime($data->rendezVous));

$client = new Client_Class(0, $data->nom, $data->prenom, $dateNaissance, $data->adresse, $data->codePostal, $data->ville, $data->email, $data->telFixe, $data->telPortable, $rendezVous);

$manager_client = new Manager_Client_class();

$manager_client->AjouterRdv($client);

/*

    $dateNaissance = date('Y-m-d H:i:s', strtotime($data->dateNaissance));
    $rendezVous = date('Y-m-d H:i:s', strtotime($data->rendezVous));

    $client = new Client_Class(0, $data->nom, $data->prenom, $dateNaissance, $data->adresse, $data->codePostal, $data->ville, $data->email, $data->telFixe, $data->telPortable, $rendezVous);


    $req = $client->updateClient();

    echo 'REQ : '.$req;
    $stmt = $pdo->requete($req);



    $val = array(':nom'=> $client->getNom(),
                 ':prenom'=>$client->getPrenom(),
                 ':dateNaissance'=>$client->getDateNaissance(),
                 ':adresse'=>$client->getAdresse(),
                 ':codePostal'=>$client->getCodePostal(),
                 ':ville'=>$client->getVille(),
                 ':email'=>$client->getEmail(),
                 ':telFixe'=>$client->getTelFixe(),
                 ':telPortable'=>$client->getTelPortable(),
                 ':rendezVous'=>$client->getRendezVous());

    echo ' VALUE : '.$client->getNom()." ".$client->getPrenom()." ".$client->getDateNaissance()." ".$client->getAdresse()." ".$client->getCodePostal()." ".$client->getVille()." ".$client->getEmail()
        ." ".$client->getTelFixe()." ".$client->getTelPortable()." ".$client->getRendezVous();

    $stmt->execute($val);
} catch(PDOException $ex) {
    echo $ex->getMessage();
}*/


?>