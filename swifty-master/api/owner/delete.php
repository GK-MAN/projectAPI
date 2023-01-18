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

//$post->PartnerId = isset($_GET["id"]) ? htmlspecialchars($_GET["id"]) : die();
$id = isset($_GET["id"]) ? htmlspecialchars($_GET["id"]) : die();
//  delete
$posts = $post->delete($id);

if ($posts == true) {
    echo json_encode(["message" => "✅ Post Deleted!"]);
} else {
    echo json_encode(["message" => "❌ Cannot Delete!"]);
}
