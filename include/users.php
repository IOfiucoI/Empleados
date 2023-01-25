<?php
class users
{

    private $conn;
    private $table_name = "users";

    // public $id;
    // public $image;
    // public $name;
    // public $ap;
    // public $am;
    // public $email;
    // public $pass;
    // public $rol;
    // public $status;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function usersShow()
    {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY user_id desc";
        $stmt = $this->conn->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt;
    }

    function userGet()
    {

        $query = "SELECT * FROM " . $this->table_name . " WHERE user_id = :id ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }

    function userData()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id_data = :id ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }


    function countActive()
    {
        $query = "SELECT user_status FROM " . $this->table_name . " WHERE user_status = 'Activo'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $active = $stmt->rowCount();
        return $active;
    }

    function countInactive()
    {
        $query = "SELECT user_status FROM " . $this->table_name . " WHERE user_status = 'Inactivo'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $inactive = $stmt->rowCount();
        return $inactive;
    }

    function countUser()
    {
        $query = "SELECT user_rol FROM " . $this->table_name . " where user_rol = 'Usuario' ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $userUser = $stmt->rowCount();
        return $userUser;
    }

    function countAdmin()
    {
        $query = "SELECT user_rol FROM " . $this->table_name . " where user_rol = 'Admin' ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $userAdmin = $stmt->rowCount();
        return $userAdmin;
    }

    function countAll()
    {
        $query = "SELECT user_id FROM " . $this->table_name . " ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $userTotal = $stmt->rowCount();
        return $userTotal;
    }

    function userDelete()
    {
        $query = "DELETE FROM users WHERE user_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            echo "true";
        } else {
            echo "false";
        }
    }
}
