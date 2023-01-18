<?php
// Headers for GET Request
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json");

include_once("../../config/Database.php");
include_once("../../models/Service.php");


// Instantiate DB and Connect to It
$database = new Database();
$db = $database->connect();


// Instantiate blog post object
$post = new Service($db);

// Get the Admin ID
$post->ServiceId = isset($_GET["id"]) ? htmlspecialchars($_GET["id"]) : die();

// Get Single Post
$post->single();


// Create the Post Array
$single = [
    "ServiceId" => $post->ServiceId,
    "ActivityId" => $post->ActivityId,
    "PartnerId" => $post->PartnerId,
    "PricePerBook" => $post->PricePerBook,
    "AddressLine1" => $post->AddressLine1,
    "AddressLine2" => $post->AddressLine2,
    "SuburbId" => $post->SuburbId,
    "CityId" => $post->CityId,
    "Description" => $post->Description,
    "AdminToContact" => $post->AdminToContact,
];

// Convert Single post to JSON
echo json_encode($single, JSON_PRETTY_PRINT);
