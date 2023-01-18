<?php
class Administrator_Type
{
    // DB Related
    private $conn;
    private $table = "administrator_type";

    // Administrator_Type Properties
    public $AdministratorTypeId;
    public $Description;

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
        $query = " SELECT * FROM {$this->table} WHERE ActivityId = ? LIMIT 0,1; ";

        // Prepare Statement
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->CityId);

        if ($stmt->execute()) {
            // Get the category
            $post = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->AdministratorTypeId = $post["AdministratorTypeId"];
            $this->Description = $post["Description"];
            return true;
        } else {
            printf("Database Error: %s\n", $stmt->error);
            return false;
        }
    }
}
