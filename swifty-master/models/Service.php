<?php
class Service
{
    // DB Related
    private $conn;
    private $table = "service";

    // admin Properties
    public $ServiceId;
    public $ActivityId;
    public $PartnerId;
    public $PricePerBook;
    public $AddressLine1;
    public $AddressLine2;
    public $SuburbId;
    public $CityId;
    public $Description;
    public $AdminToContact;

    // Construct with Database
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Get a Single Post
    public function single()
    {
        $query = " SELECT * FROM {$this->table} WHERE ServiceId = ? LIMIT 0,1; ";

        // Prepare Statement
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->ServiceId);

        if ($stmt->execute()) {
            // Get the post
            $post = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->ServiceId = $post["ServiceId"];
            $this->ActivityId = $post["ActivityId"];
            $this->PartnerId = $post["PartnerId"];
            $this->PricePerBook = $post["PricePerBook"];
            $this->AddressLine1 = $post["AddressLine1"];
            $this->AddressLine2 = $post["AddressLine2"];
            $this->SuburbId = $post["SuburbId"];
            $this->CityId = $post["CityId"];
            $this->Description = $post["Description"];
            $this->AdminToContact = $post["AdminToContact"];

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
            ServiceId = :ServiceId,
            ActivityId= :ActivityId, 
            PartnerId= :PartnerId, 
            PricePerBook= :PricePerBook,
            AddressLine1 = :AddressLine1,
            AddressLine2= :AddressLine2, 
            SuburbId= :SuburbId,
            CityId= :CityId,
            Description= :Description, 
            AdminToContact= :AdminToContact ";

        // Prepare Statement
        $stmt = $this->conn->prepare($query);

        // Sanitize data
        $this->ServiceId = htmlspecialchars(strip_tags(trim($this->ServiceId)));
        $this->ActivityId = htmlspecialchars(strip_tags(trim($this->ActivityId)));
        $this->PartnerId = htmlspecialchars(strip_tags(trim($this->PartnerId)));
        $this->PricePerBook = htmlspecialchars(strip_tags(trim($this->PricePerBook)));
        $this->AddressLine1 = htmlspecialchars(strip_tags(trim($this->AddressLine1)));
        $this->AddressLine2 = htmlspecialchars(strip_tags(trim($this->AddressLine2)));
        $this->SuburbId = htmlspecialchars(strip_tags(trim($this->SuburbId)));
        $this->CityId = htmlspecialchars(strip_tags(trim($this->CityId)));
        $this->Description = htmlspecialchars(strip_tags(trim($this->Description)));
        $this->AdminToContact = htmlspecialchars(strip_tags(trim($this->AdminToContact)));


        // Bind Data
        $stmt->bindParam(":ServiceId", $this->ServiceId);
        $stmt->bindParam(":ActivityId", $this->ActivityId);
        $stmt->bindParam(":PartnerId", $this->PartnerId);
        $stmt->bindParam(":PricePerBook", $this->PricePerBook);
        $stmt->bindParam(":AddressLine1", $this->AddressLine1);
        $stmt->bindParam(":AddressLine2", $this->AddressLine2);
        $stmt->bindParam(":SuburbId", $this->SuburbId);
        $stmt->bindParam(":CityId", $this->CityId);
        $stmt->bindParam(":Description", $this->Description);
        $stmt->bindParam(":AdminToContact", $this->AdminToContact);

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
            ActivityId= :ActivityId, 
            PartnerId= :PartnerId, 
            PricePerBook= :PricePerBook,
            AddressLine1 = :AddressLine1,
            AddressLine2= :AddressLine2, 
            SuburbId= :SuburbId,
            CityId= :CityId,
            PartnerId= :PartnerId,
            Description= :Description, 
            AdminToContact= :AdminToContact 
         WHERE ServiceId= :ServiceId";

        // Prepare Statement
        $stmt = $this->conn->prepare($query);

        // Sanitize data
        $this->ServiceId = htmlspecialchars(strip_tags(trim($this->ServiceId)));
        $this->ActivityId = htmlspecialchars(strip_tags(trim($this->ActivityId)));
        $this->PartnerId = htmlspecialchars(strip_tags(trim($this->PartnerId)));
        $this->PricePerBook = htmlspecialchars(strip_tags(trim($this->PricePerBook)));
        $this->AddressLine1 = htmlspecialchars(strip_tags(trim($this->AddressLine1)));
        $this->AddressLine2 = htmlspecialchars(strip_tags(trim($this->AddressLine2)));
        $this->SuburbId = htmlspecialchars(strip_tags(trim($this->SuburbId)));
        $this->CityId = htmlspecialchars(strip_tags(trim($this->CityId)));
        $this->Description = htmlspecialchars(strip_tags(trim($this->Description)));
        $this->AdminToContact = htmlspecialchars(strip_tags(trim($this->AdminToContact)));

        // Bind Data
        $stmt->bindParam(":ServiceId", $this->ServiceId);
        $stmt->bindParam(":ActivityId", $this->ActivityId);
        $stmt->bindParam(":PartnerId", $this->PartnerId);
        $stmt->bindParam(":PricePerBook", $this->PricePerBook);
        $stmt->bindParam(":AddressLine1", $this->AddressLine1);
        $stmt->bindParam(":AddressLine2", $this->AddressLine2);
        $stmt->bindParam(":SuburbId", $this->SuburbId);
        $stmt->bindParam(":CityId", $this->CityId);
        $stmt->bindParam(":Description", $this->Description);
        $stmt->bindParam(":AdminToContact", $this->AdminToContact);

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
        $query = "DELETE FROM {$this->table} WHERE ServiceId = {$id}";

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
