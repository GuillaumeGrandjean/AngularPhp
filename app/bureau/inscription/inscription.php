<?php

$post_date = file_get_contents("php://input");
$data = json_decode($post_date);


//saving to database
//save query

//now i am just printing the values
echo "Name : ".$data->nom."n";
echo "Email : ".$data->email."n";

?>
