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

//admin Query
$posts = $post->read();

// Get Rows Count
$rows = $posts->rowCount();



/* IMPORTANT PART: THIS IS WHERE I'M PROCESSING THE DB DATA INTO JSON */

// Check For Administrator_Type in The Database
if ($rows > 0) {
    // Administrator_Type Available
    $postsArr = [];

    while ($row = $posts->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $postItem = [
            "AdministratorTypeId" => $AdministratorTypeId,
            "Description" => $Description,
        ];

        // Push city item to data
        array_push($postsArr, $postItem);
    }

    // Turn cities array into JSON and display it
    echo json_encode($postsArr, JSON_PRETTY_PRINT);
} else {
    // No cities in the DB
    echo json_encode(["error" => "No Post Found"]);
}
