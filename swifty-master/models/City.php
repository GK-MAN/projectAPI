<?php
class City
{
    // DB Related
    private $conn;
    private $table = "city";

    // City Properties
    public $CityId;
    public $Description;
    public $ProvinceId;

    // Construct with Database
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Get All City
    public function read()
    {
        $query = "SELECT * FROM {$this->table};";

        // Prepare Statement
        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    // Get a Single Post
    public function single()
    {
        //$query = "SELECT * FROM {$this->table} WHERE CityId = ? LIMIT 0,1";
        $query = " SELECT * FROM {$this->table} WHERE CityId = ? LIMIT 0,1; ";

        // Prepare Statement
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->CityId);

        if ($stmt->execute()) {
            // Get the category
            $post = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->CityId = $post["CityId"];
            $this->Description = $post["Description"];
            $this->ProvinceId = $post["ProvinceId"];
            return true;
        } else {
            printf("Database Error: %s\n", $stmt->error);
            return false;
        }
    }
}
