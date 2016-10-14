<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require 'bdd.php';
require 'Client/Client_class.php';

require 'Client/Manager_Client_class.php';

//$post_date = file_get_contents("php://input");
//$data = json_decode($post_date);


try {
    $manager_client = new Manager_Client_class();
    $Tableau_Client = $manager_client->getRdv();

    echo $Tableau_Client;
    //$req = $client->updateClient();

    //echo 'REQ : '.$req;
    //$stmt = $pdo->requete($req);

} catch(PDOException $ex) {
    echo $ex->getMessage();
}
?>