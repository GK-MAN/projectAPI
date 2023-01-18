<?php
// Headers for GET Request
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods,Content-type,Access-Control-Allow-Origin, Authorization, X-Requested-With");

include_once("../../config/Database.php");
include_once("../../models/Owner.php");


// Instantiate DB and Connect to It
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$post = new Owner($db);

// Get raw POSTed data
$data = file_get_contents("php://input") != null ? json_decode(file_get_contents("php://input")) : die();

$post->OwnerId = $data->OwnerId;
$post->FirstName = $data->FirstName;
$post->LastName = $data->LastName;
$post->IdNumber = $data->IdNumber;
$post->PictureFileName = $data->PictureFileName;
$post->IdFileName = $data->IdFileName;
$post->ContactNumber = $data->ContactNumber;
$post->Email = $data->Email;
$post->WhatsApp = $data->WhatsApp;
$post->GenderId = $data->GenderId;

if ($post->create()) {
    echo json_encode(["message" => "Post Created Successfully"]);
} else {
    echo json_encode(["message" => "Cannot Create Post"]);
}
