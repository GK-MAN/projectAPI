<?php
class Administrator
{
    // DB Related
    private $conn;
    private $table = "administrator";

    // admin Properties
    public $AdministratorId;
    public $FirstName;
    public $LastName;
    public $IdNumber;
    public $PictureFileName;
    public $ContactNumber;
    public $WhatsApp;
    public $IdFileName;
    public $PartnerId;
    public $AdministratorTypeId;
    public $Email;

    // Construct with Database
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Get a Single Post
    public function single()
    {
        $query = " SELECT * FROM {$this->table} WHERE AdministratorId = ? LIMIT 0,1; ";

        // Prepare Statement
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->AdministratorId);

        if ($stmt->execute()) {
            // Get the post
            $post = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->AdministratorId = $post["AdministratorId"];
            $this->FirstName = $post["FirstName"];
            $this->LastName = $post["LastName"];
            $this->IdNumber = $post["IdNumber"];
            $this->PictureFileName = $post["PictureFileName"];
            $this->ContactNumber = $post["ContactNumber"];
            $this->WhatsApp = $post["WhatsApp"];
            $this->IdFileName = $post["IdFileName"];
            $this->PartnerId = $post["PartnerId"];
            $this->AdministratorTypeId = $post["AdministratorTypeId"];
            $this->Email = $post["Email"];

            return true;
        } else {
            printf("Database Error: %s\n", $stmt->error);
            return false;
        }
    }

    // Get by partner
    public function getByPartner($id)
    {
        $query = "SELECT * FROM {$this->table} WHERE PartnerId = {$id};";

        // Prepare Statement
        $stmt = $this->conn->prepare($query);
        //$stmt->bindParam(1, $this->PartnerId);

        $stmt->execute();

        return $stmt;
    }

    // Create a Post
    public function create()
    {
        $query = "INSERT INTO {$this->table} 
        SET 
            AdministratorId = :AdministratorId,
            FirstName= :FirstName, 
            LastName= :LastName, 
            IdNumber= :IdNumber,
            PictureFileName = :PictureFileName,
            ContactNumber= :ContactNumber, 
            WhatsApp= :WhatsApp,
            IdFileName= :IdFileName,
            PartnerId = :PartnerId,
            AdministratorTypeId= :AdministratorTypeId, 
            Email= :Email ";

        // Prepare Statement
        $stmt = $this->conn->prepare($query);

        // Sanitize data
        $this->AdministratorId = htmlspecialchars(strip_tags(trim($this->AdministratorId)));
        $this->FirstName = htmlspecialchars(strip_tags(trim($this->FirstName)));
        $this->LastName = htmlspecialchars(strip_tags(trim($this->LastName)));
        $this->IdNumber = htmlspecialchars(strip_tags(trim($this->IdNumber)));
        $this->PictureFileName = htmlspecialchars(strip_tags(trim($this->PictureFileName)));
        $this->ContactNumber = htmlspecialchars(strip_tags(trim($this->ContactNumber)));
        $this->WhatsApp = htmlspecialchars(strip_tags(trim($this->WhatsApp)));
        $this->IdFileName = htmlspecialchars(strip_tags(trim($this->IdFileName)));
        $this->PartnerId = htmlspecialchars(strip_tags(trim($this->PartnerId)));
        $this->AdministratorTypeId = htmlspecialchars(strip_tags(trim($this->AdministratorTypeId)));
        $this->Email = htmlspecialchars(strip_tags(trim($this->Email)));


        // Bind Data
        $stmt->bindParam(":AdministratorId", $this->AdministratorId);
        $stmt->bindParam(":FirstName", $this->FirstName);
        $stmt->bindParam(":LastName", $this->LastName);
        $stmt->bindParam(":IdNumber", $this->IdNumber);
        $stmt->bindParam(":PictureFileName", $this->PictureFileName);
        $stmt->bindParam(":ContactNumber", $this->ContactNumber);
        $stmt->bindParam(":WhatsApp", $this->WhatsApp);
        $stmt->bindParam(":IdFileName", $this->IdFileName);
        $stmt->bindParam(":PartnerId", $this->PartnerId);
        $stmt->bindParam(":AdministratorTypeId", $this->AdministratorTypeId);
        $stmt->bindParam(":Email", $this->Email);

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
            ContactNumber= :ContactNumber, 
            WhatsApp= :WhatsApp,
            IdFileName= :IdFileName,
            PartnerId = :PartnerId,
            AdministratorTypeId= :AdministratorTypeId, 
            Email= :Email 
         WHERE AdministratorId = :AdministratorId";

        // Prepare Statement
        $stmt = $this->conn->prepare($query);

        // Sanitize data
        $this->AdministratorId = htmlspecialchars(strip_tags(trim($this->AdministratorId)));
        $this->FirstName = htmlspecialchars(strip_tags(trim($this->FirstName)));
        $this->LastName = htmlspecialchars(strip_tags(trim($this->LastName)));
        $this->IdNumber = htmlspecialchars(strip_tags(trim($this->IdNumber)));
        $this->PictureFileName = htmlspecialchars(strip_tags(trim($this->PictureFileName)));
        $this->ContactNumber = htmlspecialchars(strip_tags(trim($this->ContactNumber)));
        $this->WhatsApp = htmlspecialchars(strip_tags(trim($this->WhatsApp)));
        $this->IdFileName = htmlspecialchars(strip_tags(trim($this->IdFileName)));
        $this->PartnerId = htmlspecialchars(strip_tags(trim($this->PartnerId)));
        $this->AdministratorTypeId = htmlspecialchars(strip_tags(trim($this->AdministratorTypeId)));
        $this->Email = htmlspecialchars(strip_tags(trim($this->Email)));

        // Bind Data
        $stmt->bindParam(":AdministratorId", $this->AdministratorId);
        $stmt->bindParam(":FirstName", $this->FirstName);
        $stmt->bindParam(":LastName", $this->LastName);
        $stmt->bindParam(":IdNumber", $this->IdNumber);
        $stmt->bindParam(":PictureFileName", $this->PictureFileName);
        $stmt->bindParam(":ContactNumber", $this->ContactNumber);
        $stmt->bindParam(":WhatsApp", $this->WhatsApp);
        $stmt->bindParam(":IdFileName", $this->IdFileName);
        $stmt->bindParam(":PartnerId", $this->PartnerId);
        $stmt->bindParam(":AdministratorTypeId", $this->AdministratorTypeId);
        $stmt->bindParam(":Email", $this->Email);

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
        $query = "DELETE FROM {$this->table} WHERE AdministratorId = {$id}";

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
