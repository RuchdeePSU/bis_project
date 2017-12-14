<?php
class Project_Advisor{

    // database connection and table name
    private $conn;
    private $table_name = "project_advisors";

    // object properties
    public $advisor_id;
    public $advisor_title;
    public $advisor_fullname;
    public $advisor_email;
    public $status;

    public $perpage;
    public $start;

    public function __construct($db){
        $this->conn = $db;
    }

    // create contact information
    function create(){
        // write statement
        $stmt = mysqli_prepare($this->conn, "INSERT INTO " . $this->table_name . " (advisor_title, advisor_fullname, advisor_email, status) VALUES (?,?,?,?)");
        mysqli_stmt_bind_param($stmt, 'ssss', $this->advisor_title, $this->advisor_fullname, $this->advisor_email, $this->status);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }else {
            return false;
        }
    }  // function create()

    // read all records
    function readall(){
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY advisor_id LIMIT " . $this->start . ", " . $this->perpage;
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // read all records
    function readforDDL(){
        $query = "SELECT * FROM " . $this->table_name . " WHERE status = 1 ORDER BY advisor_id";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // read one record
    function readone(){
        $query = "SELECT * FROM " . $this->table_name . " WHERE advisor_id = '" . $this->advisor_id . "'";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // update record - account
    function update(){
        $query = "UPDATE " . $this->table_name . " SET advisor_title = ?, advisor_fullname = ?, advisor_email = ?, status = ?  WHERE advisor_id = ?";
        // statement
        $stmt = mysqli_prepare($this->conn, $query);
        // bind parameters
        mysqli_stmt_bind_param($stmt, 'sssss', $this->advisor_title, $this->advisor_fullname, $this->advisor_email, $this->status,  $this->advisor_id);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }else {
            return false;
        }
    }

    // delete record
    function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE advisor_id = ?";
        // statement
        $stmt = mysqli_prepare($this->conn, $query);
        // bind parameter
        mysqli_stmt_bind_param($stmt, 's', $this->advisor_id);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }else {
            return false;
        }
    }
}

?>
