<?php
class Project_Setting{

    // database connection and table name
    private $conn;
    private $table_name = "project_settings";

    // object properties
    public $project_year;

    public function __construct($db){
        $this->conn = $db;
    }

    // read all records
    function readall(){
        $query = "SELECT * FROM " . $this->table_name;
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // read all records
    function readproject_year(){
        $query = "SELECT * FROM " . $this->table_name;
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_array($result);
        return $row['project_year'];
    }

    // update record - account
    function update(){
        $query = "UPDATE " . $this->table_name . " SET project_year = ?";
        // statement
        $stmt = mysqli_prepare($this->conn, $query);
        // bind parameters
        mysqli_stmt_bind_param($stmt, 's', $this->project_year);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }else {
            return false;
        }
    }

}

?>
