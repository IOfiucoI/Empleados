<?php
class enterprise
{

    private $conn;
    private $table_name = "enterprise";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function enterpriseGet()
    {
        $id = 1;
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }

    function enterpriseUpdate()
    {

        $this->img;
        $this->type;
        $this->tmp_name;
        $ext        = pathinfo($this->img, PATHINFO_EXTENSION);
        $filename   = date("Ymd_His") . "." . $ext;
        $url        = "img/" . $filename;
        $location   = "../img/" . $filename;
        $dir = "../img/";

        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        $query = "SELECT * FROM enterprise WHERE id = :id ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $urlImage   = $row["image"];


        if (empty($this->img)) {

            $query = "UPDATE enterprise SET
            name = :name,
            image = :image
            WHERE id = :id";

            $stmt = $this->conn->prepare($query);

            $stmt->bindparam(':id', $this->id, PDO::PARAM_INT);
            $stmt->bindparam(':name', $this->name, PDO::PARAM_STR, 255);
            $stmt->bindparam(':image', $urlImage, PDO::PARAM_STR, 255);

            if ($stmt->execute()) {
                move_uploaded_file($this->tmp_name, $location);
                echo "true";
            } else {
                echo "false";
            }
            
        } else {

            if ($this->type == 'image/jpeg' || $this->type == 'image/jpg' || $this->type == 'image/png') {

                $query = "UPDATE enterprise SET
                name = :name,
                image = :image
                WHERE id = :id";

                $stmt = $this->conn->prepare($query);

                $stmt->bindparam(':id', $this->id, PDO::PARAM_INT);
                $stmt->bindparam(':name', $this->name, PDO::PARAM_STR, 100);
                $stmt->bindparam(':image', $url, PDO::PARAM_STR, 100);

                if ($stmt->execute()) {
                    $dirDat = "../";
                    if (file_exists($dirDat . $urlImage)) {
                        unlink($dirDat . $urlImage);
                    }
                    move_uploaded_file($this->tmp_name, $location);
                    echo "true";
                } else {
                    echo "false";
                }
            } else {
                echo "img";
            }
        }
    }
}
