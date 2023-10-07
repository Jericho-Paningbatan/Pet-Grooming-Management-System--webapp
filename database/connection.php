<?php

$mongoClient = new MongoDB\Client("mongodb+srv://echoo:09611584813@group7.9lwukou.mongodb.net/");

$database = $mongoClient->pet_grooming_system;
$collection = $database->client_account;

?>