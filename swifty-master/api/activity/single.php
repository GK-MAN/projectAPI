<?php
// Headers for GET Request
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json");

include_once("../../config/Database.php");
include_once("../../models/Activity.php");


// Instantiate DB and Connect to It
$database = new Database();
$db = $database->connect();


// Instantiate city object
$post = new Activity($db);

// Get the City ID
$post->ActivityId = isset($_GET["id"]) ? htmlspecialchars($_GET["id"]) : die();

// Get Single Post
$post->single();


// Create the Post Array
$single = [
    "ActivityId" => $ActivityId,
            "ActivityName" => $ActivityName,
            "Description" => $Description,
            "FileName" => $FileName,
            "LogName" => $LogName
];

// Convert Single post to JSON
echo json_encode($single, JSON_PRETTY_PRINT);
