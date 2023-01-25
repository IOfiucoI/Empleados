<?php
class experience
{

    private $conn;
    private $table_name = "experience";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function experienceData()
    {

        $query = "SELECT * FROM " . $this->table_name . " WHERE e_user = :id ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }

    function experienceGet()
    {

        $query = "SELECT * FROM " . $this->table_name . " WHERE e_id = :id ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->e_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }

    function experienceUpdate()
    {

        $query = "UPDATE " . $this->table_name . " 
        SET
            e_emp   =   :emp,
            e_dir   =   :dir,
            e_pue   =   :pue,
            e_per   =   :per
        WHERE e_id = :id ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id',  $this->e_id, PDO::PARAM_INT);
        $stmt->bindParam(':emp', $this->emp, PDO::PARAM_STR, 100);
        $stmt->bindParam(':dir', $this->dir, PDO::PARAM_STR, 100);
        $stmt->bindParam(':pue', $this->pue, PDO::PARAM_STR, 100);
        $stmt->bindParam(':per', $this->per, PDO::PARAM_STR, 100);

        if ($stmt->execute()) {
            echo "true";
        } else {
            echo "false";
        }
    }

    function experienceCreate()
    {

        $query = "INSERT INTO " . $this->table_name . " SET 
            e_user   =  :user,
            e_emp   =   :emp,
            e_dir   =   :dir,
            e_pue   =   :pue,
            e_per   =   :per ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':emp', $this->emp, PDO::PARAM_STR, 100);
        $stmt->bindParam(':dir', $this->dir, PDO::PARAM_STR, 100);
        $stmt->bindParam(':pue', $this->pue, PDO::PARAM_STR, 100);
        $stmt->bindParam(':per', $this->per, PDO::PARAM_STR, 100);

        if ($stmt->execute()) {
            echo "true";
        } else {
            echo "false";
        }
    }

    function exDelete()
    {
        $query = "DELETE FROM experience WHERE e_id = :id ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            echo "true";
        } else {
            echo "false";
        }
    }
}
