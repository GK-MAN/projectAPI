<?php
// Headers for GET Request
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json");

include_once("../../config/Database.php");
include_once("../../models/Administrator.php");


// Instantiate DB and Connect to It
$database = new Database();
$db = $database->connect();


// Instantiate blog post object
$post = new Administrator($db);

// Get the Admin ID
$post->AdministratorId = isset($_GET["id"]) ? htmlspecialchars($_GET["id"]) : die();

// Get Single Post
$post->single();


// Create the Post Array
$single = [
    "AdministratorId" => $post->AdministratorId,
    "FirstName" => $post->FirstName,
    "LastName" => $post->LastName,
    "IdNumber" => $post->IdNumber,
    "PictureFileName" => $post->PictureFileName,
    "ContactNumber" => $post->ContactNumber,
    "WhatsApp" => $post->WhatsApp,
    "IdFileName" => $post->IdFileName,
    "PartnerId" => $post->PartnerId,
    "AdministratorTypeId" => $post->AdministratorTypeId,
    "Email" => $post->Email,
];

// Convert Single post to JSON
echo json_encode($single, JSON_PRETTY_PRINT);
