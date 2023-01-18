<?php
// Headers for GET Request
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json");

include_once("../../config/Database.php");
include_once("../../models/Administrator_Type.php");

// Instantiate DB and Connect to It
$database = new Database();
$db = $database->connect();

// Instantiate Activity object
$post = new Administrator_Type($db);

// Get the AdministratorTypeId
$post->AdministratorTypeId = isset($_GET["id"]) ? htmlspecialchars($_GET["id"]) : die();

// Get Single Post
$post->single();


// Create the Post Array
$single = [
    "AdministratorTypeId" => $AdministratorTypeId,
    "Description" => $Description,
];

// Convert Single post to JSON
echo json_encode($single, JSON_PRETTY_PRINT);
