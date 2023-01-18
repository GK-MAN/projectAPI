<?php
class Activity
{
    // DB Related
    private $conn;
    private $table = "activity";

    // City Properties
    public $ActivityId;
    public $ActivityName;
    public $Description;
    public $FileName;
    public $LogName;

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
        $query = "SELECT * FROM {$this->table} WHERE ActivityId = ? LIMIT 0,1;";

        // Prepare Statement
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->CityId);

        if ($stmt->execute()) {
            // Get the category
            $post = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->ActivityId = $post["ActivityId"];
            $this->ActivityName = $post["ActivityName"];
            $this->Description = $post["Description"];
            $this->FileName = $post["FileName"];
            $this->LogName = $post["LogName"];
            return true;
        } else {
            printf("Database Error: %s\n", $stmt->error);
            return false;
        }
    }
}
