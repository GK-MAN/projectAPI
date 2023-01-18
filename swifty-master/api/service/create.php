<?php
// Headers for GET Request
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods,Content-type,Access-Control-Allow-Origin, Authorization, X-Requested-With");

include_once("../../config/Database.php");
include_once("../../models/Service.php");


// Instantiate DB and Connect to It
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$post = new Service($db);

// Get raw POSTed data
$data = file_get_contents("php://input") != null ? json_decode(file_get_contents("php://input")) : die();

$post->ServiceId = $data->ServiceId;
$post->ActivityId = $data->ActivityId;
$post->PartnerId = $data->PartnerId;
$post->PricePerBook = $data->PricePerBook;
$post->AddressLine1 = $data->AddressLine1;
$post->AddressLine2 = $data->AddressLine2;
$post->SuburbId = $data->SuburbId;
$post->CityId = $data->CityId;
$post->Description = $data->Description;
$post->AdminToContact = $data->AdminToContact;

if ($post->create()) {
    echo json_encode(["message" => "Post Created Successfully"]);
} else {
    echo json_encode(["message" => "Cannot Create Post"]);
}
