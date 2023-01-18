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

//$post->PartnerId = isset($_GET["id"]) ? htmlspecialchars($_GET["id"]) : die();
$id = isset($_GET["id"]) ? htmlspecialchars($_GET["id"]) : die();
// Get getByPartner
$posts = $post->getByPartner($id);

// Get Rows Count
$rows = $posts->rowCount();


/* IMPORTANT PART: THIS IS WHERE I'M PROCESSING THE DB DATA INTO JSON */

// Check For Blog Posts in The Database
if ($rows > 0) {
    // Posts Available
    $postsArr = [];

    while ($row = $posts->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $postItem = [
            "AdministratorId" => $AdministratorId,
            "FirstName" => $FirstName,
            "LastName" => $LastName,
            "IdNumber" => $IdNumber,
            "PictureFileName" => $PictureFileName,
            "ContactNumber" => $ContactNumber,
            "WhatsApp" => $WhatsApp,
            "IdFileName" => $IdFileName,
            "PartnerId" => $PartnerId,
            "AdministratorTypeId" => $AdministratorTypeId,
            "Email" => $Email,
        ];

        // Push post item to data
        array_push($postsArr, $postItem);
    }

    // Turn posts array into JSON and display it
    echo json_encode($postsArr, JSON_PRETTY_PRINT);
} else {
    // No Posts in the DB
    echo json_encode(["error" => "No Post Found"]);
}