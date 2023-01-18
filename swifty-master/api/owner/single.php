<?php
// Headers for GET Request
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json");

include_once("../../config/Database.php");
include_once("../../models/Owner.php");

// Instantiate DB and Connect to It
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$post = new Owner($db);

// Get the Admin ID
$post->OwnerId = isset($_GET["id"]) ? htmlspecialchars($_GET["id"]) : die();

// Get Single Post
$post->single();


// Create the Post Array
$single = [
    "OwnerId" => $post->OwnerId,
    "FirstName" => $post->FirstName,
    "LastName" => $post->LastName,
    "IdNumber" => $post->IdNumber,
    "PictureFileName" => $post->PictureFileName,
    "IdFileName" => $post->IdFileName,
    "ContactNumber" => $post->ContactNumber,
    "Email" => $post->Email,
    "WhatsApp" => $post->WhatsApp,
    "GenderId" => $post->GenderId,
];

// Convert Single post to JSON
echo json_encode($single, JSON_PRETTY_PRINT);
