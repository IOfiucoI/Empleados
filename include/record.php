<?php
class record
{

    private $conn;
    private $table_name = "record";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function recordData()
    {

        $query = "SELECT * FROM " . $this->table_name . " WHERE r_user = :id ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->r_user, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }


    function recordCreate()
    {
        $query = "INSERT INTO " . $this->table_name . " SET
        r_user = :user,
        r_esc = :esc,
        r_ubi = :ubi,
        r_per = :per,
        r_doc = :doc";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':user', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':esc', $this->esc, PDO::PARAM_STR, 100);
        $stmt->bindParam(':ubi', $this->ubi, PDO::PARAM_STR, 100);
        $stmt->bindParam(':per', $this->per, PDO::PARAM_STR, 100);
        $stmt->bindParam(':doc', $this->doc, PDO::PARAM_STR, 100);
        $stmt->execute();
        return $stmt;
    }

    function recordGet()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE r_id = :r_id ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':r_id', $this->r_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }

    function updateData()
    {
        $query = "UPDATE data SET
            r_esc = :esc,
            r_ubi = :ubi,
            r_per = :per,
            r_doc = :doc
        WHERE r_id = :r_id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':r_id',   $this->r_id, PDO::PARAM_INT);
        $stmt->bindParam(':r_esc',  $this->r_esc, PDO::PARAM_STR, 100);
        $stmt->bindParam(':r_ubi',  $this->r_ubi, PDO::PARAM_STR, 100);
        $stmt->bindParam(':r_per',  $this->r_per, PDO::PARAM_STR, 100);
        $stmt->bindParam(':r_doc',  $this->r_doc, PDO::PARAM_STR, 100);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function recordDelete()
    {
        $query = "DELETE FROM record WHERE r_id = :id ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            echo "true";
        } else {
            echo "false";
        }
    }
}
