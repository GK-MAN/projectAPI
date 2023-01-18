<?php
// Headers for GET Request
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json");

include_once("../../config/Database.php");
include_once("../../models/City.php");


// Instantiate DB and Connect to It
$database = new Database();
$db = $database->connect();


// Instantiate city object
$post = new City($db);

// Get the City ID
$post->CityId = isset($_GET["id"]) ? htmlspecialchars($_GET["id"]) : die();

// Get Single Post
$post->single();


// Create the Post Array
$single = [
    "CityId" => $post->CityId,
    "Description" => $post->Description,
    "ProvinceId" => $post->ProvinceId
];

// Convert Single post to JSON
echo json_encode($single, JSON_PRETTY_PRINT);
