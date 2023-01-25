<?php
class courses
{

    private $conn;
    private $table_name = "courses";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function coursesData()
    {

        $query = "SELECT * FROM " . $this->table_name . " WHERE c_user = :id ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }

    function coursesGet()
    {

        $query = "SELECT * FROM " . $this->table_name . " WHERE c_id = :c_id ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':c_id', $this->c_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }

    function coursesCreate()
    {

        $this->doc;
        $this->type;
        $this->tmp_name;
        $ext        = pathinfo($this->doc, PATHINFO_EXTENSION);
        $filename   = "CEID" . $this->id . "_" . uniqid() . "." . $ext;
        $url        = "profiles/cursos/" . $filename;
        $location   = "../profiles/cursos/" . $filename;
        $dir = "../profiles/cursos";

        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        if ($this->type == 'application/pdf') {

            $query = "INSERT INTO courses SET
            c_user = :user,
            c_nom = :nom,
            c_per = :per,
            c_doc = :doc";

            $stmt = $this->conn->prepare($query);

            $stmt->bindparam(':user', $this->id, PDO::PARAM_INT);
            $stmt->bindparam(':nom', $this->nom, PDO::PARAM_STR, 100);
            $stmt->bindparam(':per', $this->per, PDO::PARAM_STR, 100);
            $stmt->bindparam(':doc', $url, PDO::PARAM_STR, 100);

            if ($stmt->execute()) {
                move_uploaded_file($this->tmp_name, $location);
                echo "true";
            } else {
                echo "false";
            }
        } else {
            echo "pdf";
        }
    }

    function coursesUpdate()
    {

        $this->doc;
        $this->type;
        $this->tmp_name;
        $ext        = pathinfo($this->doc, PATHINFO_EXTENSION);
        $filename   = "CEID" . $this->c_id . "_" . uniqid() . "." . $ext;
        $url        = "profiles/cursos/" . $filename;
        $location   = "../profiles/cursos/" . $filename;
        $dir = "../profiles/cursos/";

        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        $query = "SELECT c_doc FROM courses WHERE c_id = :id ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->c_id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $pdfUrl   = $row["c_doc"];

        if (empty($this->doc)) {

            $query = "UPDATE courses SET
            c_nom = :nom,
            c_per = :per,
            c_doc = :doc
            WHERE c_id = :id";

            $stmt = $this->conn->prepare($query);

            $stmt->bindparam(':id', $this->c_id, PDO::PARAM_INT);
            $stmt->bindparam(':nom', $this->nom, PDO::PARAM_STR, 100);
            $stmt->bindparam(':per', $this->per, PDO::PARAM_STR, 100);
            $stmt->bindparam(':doc', $pdfUrl, PDO::PARAM_STR, 100);

            if ($stmt->execute()) {
                echo "true";
            } else {
                echo "false";
            }
        } else {
            if ($this->type == 'application/pdf') {
                $query = "UPDATE courses SET
                c_nom = :nom,
                c_per = :per,
                c_doc = :doc
                WHERE c_id = :id";

                $stmt = $this->conn->prepare($query);

                $stmt->bindparam(':id', $this->c_id, PDO::PARAM_INT);
                $stmt->bindparam(':nom', $this->nom, PDO::PARAM_STR, 100);
                $stmt->bindparam(':per', $this->per, PDO::PARAM_STR, 100);
                $stmt->bindparam(':doc', $url, PDO::PARAM_STR, 100);

                if ($stmt->execute()) {
                    move_uploaded_file($this->tmp_name, $location);
                    echo "true";
                } else {
                    echo "false";
                }
            } else {
                echo "pdf";
            }
        }
    }

    function coursesDelete()
    {
        $query = "DELETE FROM courses WHERE c_id = :id ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            echo "true";
        } else {
            echo "false";
        }
    }
}
