<?php
class Project_Student{

    // database connection and table name
    private $conn;
    private $table_name = "project_students";

    // object properties
    public $student_id;
    public $student_title;
    public $student_fullname;
    public $student_email;
    public $project_year;
    public $topic_id;

    // for pagination
    public $start;
    public $perpage;

    public function __construct($db){
        $this->conn = $db;
    }

    // create contact information
    function create(){

        // write statement
        $stmt = mysqli_prepare($this->conn, "INSERT INTO " . $this->table_name . " (student_id, student_title, student_fullname, student_email, project_year) VALUES (?,?,?,?,?)");
        mysqli_stmt_bind_param($stmt, 'sssss', $this->student_id, $this->student_title, $this->student_fullname, $this->student_email, $this->project_year);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }else {
            return false;
        }
    }  // function create()

    // read all records
    function readall(){
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY student_id LIMIT " . $this->start . ", " . $this->perpage;
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // read one record
    function readone(){
        $query = "SELECT * FROM " . $this->table_name . " WHERE student_email = '" . $this->student_email . "' AND project_year = '" . $this->project_year . "'";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // read students according to topic id
    function readgroup() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE topic_id = '" . $this->topic_id . "' ORDER BY student_id";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // read one record for update
    function readoneforupdate(){
        $query = "SELECT * FROM " . $this->table_name . " WHERE student_id = '" . $this->student_id . "'";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // read for dll
    function readforDDL(){
        $query = "SELECT * FROM " . $this->table_name . " WHERE student_id <> '" . $this->student_id . "' ORDER BY student_id";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // update record - account
    function update(){
        $query = "UPDATE " . $this->table_name . " SET student_title = ?, student_fullname = ?, student_email = ?, project_year = ? WHERE student_id = ?";
        // statement
        $stmt = mysqli_prepare($this->conn, $query);
        // bind parameters
        mysqli_stmt_bind_param($stmt, 'sssss', $this->student_title, $this->student_fullname, $this->student_email, $this->project_year, $this->student_id);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }else {
            return false;
        }
    }

    // update topic id
    function update_topic_id() {
        $query = "UPDATE " . $this->table_name . " SET topic_id = ? WHERE student_id = ?";
        // statement
        $stmt = mysqli_prepare($this->conn, $query);
        // bind parameters
        mysqli_stmt_bind_param($stmt, 'ss', $this->topic_id, $this->student_id);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }else {
            return false;
        }
    }

    // delete record
    function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE student_id = ?";
        // statement
        $stmt = mysqli_prepare($this->conn, $query);
        // bind parameter
        mysqli_stmt_bind_param($stmt, 's', $this->student_id);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }else {
            return false;
        }
    }

    //search students according to project_year
    function readyear() {
      $query = "SELECT * FROM " . $this->table_name . " WHERE project_year = '" . $this->project_year . "' ORDER BY student_id LIMIT " . $this->start . ", " . $this->perpage;
      $result = mysqli_query($this->conn, $query);
      return $result;
    }

    // get number of total records
    function getTotalRows(){
        $query = "SELECT * FROM " . $this->table_name;
        $result = mysqli_query($this->conn, $query);
        return mysqli_num_rows($result);
    }
}

?>
