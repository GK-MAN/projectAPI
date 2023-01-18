<?php
class Owner
{
    // DB Related
    private $conn;
    private $table = "owner";

    // admin Properties
    public $OwnerId;
    public $FirstName;
    public $LastName;
    public $IdNumber;
    public $PictureFileName;
    public $IdFileName;
    public $ContactNumber;
    public $Email;
    public $WhatsApp;
    public $GenderId;

    // Construct with Database
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Get a Single Post
    public function single()
    {
        $query = " SELECT * FROM {$this->table} WHERE OwnerId = ? LIMIT 0,1; ";

        // Prepare Statement
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->OwnerId);

        if ($stmt->execute()) {
            // Get the post
            $post = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->OwnerId = $post["OwnerId"];
            $this->FirstName = $post["FirstName"];
            $this->LastName = $post["LastName"];
            $this->IdNumber = $post["IdNumber"];
            $this->PictureFileName = $post["PictureFileName"];
            $this->IdFileName = $post["IdFileName"];
            $this->ContactNumber = $post["ContactNumber"];
            $this->Email = $post["Email"];
            $this->WhatsApp = $post["WhatsApp"];
            $this->GenderId = $post["GenderId"];

            return true;
        } else {
            printf("Database Error: %s\n", $stmt->error);
            return false;
        }
    }

    // Create a Post
    public function create()
    {
        $query = "INSERT INTO {$this->table} 
        SET 
            OwnerId = :OwnerId,
            FirstName= :FirstName, 
            LastName= :LastName, 
            IdNumber= :IdNumber,
            PictureFileName = :PictureFileName,
            IdFileName= :IdFileName, 
            ContactNumber= :ContactNumber,
            Email= :Email,
            WhatsApp= :WhatsApp, 
            GenderId= :GenderId ";

        // Prepare Statement
        $stmt = $this->conn->prepare($query);

        // Sanitize data
        $this->OwnerId = htmlspecialchars(strip_tags(trim($this->OwnerId)));
        $this->FirstName = htmlspecialchars(strip_tags(trim($this->FirstName)));
        $this->LastName = htmlspecialchars(strip_tags(trim($this->LastName)));
        $this->IdNumber = htmlspecialchars(strip_tags(trim($this->IdNumber)));
        $this->PictureFileName = htmlspecialchars(strip_tags(trim($this->PictureFileName)));
        $this->IdFileName = htmlspecialchars(strip_tags(trim($this->IdFileName)));
        $this->ContactNumber = htmlspecialchars(strip_tags(trim($this->ContactNumber)));
        $this->Email = htmlspecialchars(strip_tags(trim($this->Email)));
        $this->WhatsApp = htmlspecialchars(strip_tags(trim($this->WhatsApp)));
        $this->GenderId = htmlspecialchars(strip_tags(trim($this->GenderId)));


        // Bind Data
        $stmt->bindParam(":OwnerId", $this->OwnerId);
        $stmt->bindParam(":FirstName", $this->FirstName);
        $stmt->bindParam(":LastName", $this->LastName);
        $stmt->bindParam(":IdNumber", $this->IdNumber);
        $stmt->bindParam(":PictureFileName", $this->PictureFileName);
        $stmt->bindParam(":IdFileName", $this->IdFileName);
        $stmt->bindParam(":ContactNumber", $this->ContactNumber);
        $stmt->bindParam(":Email", $this->Email);
        $stmt->bindParam(":WhatsApp", $this->WhatsApp);
        $stmt->bindParam(":GenderId", $this->GenderId);

        if ($stmt->execute()) {
            return true;
        } else {
            printf("Database Error: %s\n", $stmt->error);
            return false;
        }
    }


    // Update a Post
    public function update()
    {
        $query = "UPDATE {$this->table} 
        SET 
            FirstName= :FirstName, 
            LastName= :LastName, 
            IdNumber= :IdNumber,
            PictureFileName = :PictureFileName,
            IdFileName= :IdFileName, 
            ContactNumber= :ContactNumber,
            Email= :Email,
            LastName = :LastName,
            WhatsApp= :WhatsApp, 
            GenderId= :GenderId 
         WHERE OwnerId = :OwnerId";

        // Prepare Statement
        $stmt = $this->conn->prepare($query);

        // Sanitize data
        $this->OwnerId = htmlspecialchars(strip_tags(trim($this->OwnerId)));
        $this->FirstName = htmlspecialchars(strip_tags(trim($this->FirstName)));
        $this->LastName = htmlspecialchars(strip_tags(trim($this->LastName)));
        $this->IdNumber = htmlspecialchars(strip_tags(trim($this->IdNumber)));
        $this->PictureFileName = htmlspecialchars(strip_tags(trim($this->PictureFileName)));
        $this->IdFileName = htmlspecialchars(strip_tags(trim($this->IdFileName)));
        $this->ContactNumber = htmlspecialchars(strip_tags(trim($this->ContactNumber)));
        $this->Email = htmlspecialchars(strip_tags(trim($this->Email)));
        $this->WhatsApp = htmlspecialchars(strip_tags(trim($this->WhatsApp)));
        $this->GenderId = htmlspecialchars(strip_tags(trim($this->GenderId)));

        // Bind Data
        $stmt->bindParam(":OwnerId", $this->OwnerId);
        $stmt->bindParam(":FirstName", $this->FirstName);
        $stmt->bindParam(":LastName", $this->LastName);
        $stmt->bindParam(":IdNumber", $this->IdNumber);
        $stmt->bindParam(":PictureFileName", $this->PictureFileName);
        $stmt->bindParam(":IdFileName", $this->IdFileName);
        $stmt->bindParam(":ContactNumber", $this->ContactNumber);
        $stmt->bindParam(":Email", $this->Email);
        $stmt->bindParam(":WhatsApp", $this->WhatsApp);
        $stmt->bindParam(":GenderId", $this->GenderId);

        if ($stmt->execute()) {
            return true;
        } else {
            printf("Database Error: %s\n", $stmt->error);
            return false;
        }
    }

    // Delete a Post
    public function delete($id)
    {
        $query = "DELETE FROM {$this->table} WHERE OwnerId = {$id}";

        // Prepare Statement
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute()) {
            return true;
        } else {
            printf("Database Error: %s\n", $stmt->error);
            return false;
        }
    }
}
