<?php
class Project_Topic_Advisor{

    // database connection and table name
    private $conn;
    private $table_name = "project_topics_advisors";

    // object properties
    public $topic_id;
    public $advisor_id;
    public $advisor_type;

    public function __construct($db){
        $this->conn = $db;
    }

    // create contact information
    function create(){
        // write statement
        $stmt = mysqli_prepare($this->conn, "INSERT INTO " . $this->table_name . " (topic_id, advisor_id, advisor_type) VALUES (?,?,?)");
        mysqli_stmt_bind_param($stmt, 'sss', $this->topic_id, $this->advisor_id, $this->advisor_type);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }else {
            return false;
        }
    }  // function create()

    // read all records
    function readall(){
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY topic_id";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // read one record
    function readone(){
        $query = "SELECT * FROM " . $this->table_name . " WHERE topic_id = '" . $this->topic_id . "' ORDER BY advisor_type DESC";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // update record - account
    function update(){
        $query = "UPDATE " . $this->table_name . " SET advisor_id = ?, advisor_type = ? WHERE topic_id = ?";
        // statement
        $stmt = mysqli_prepare($this->conn, $query);
        // bind parameters
        mysqli_stmt_bind_param($stmt, 'sss', $this->advisor_id, $this->advisor_type, $this->topic_id);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }else {
            return false;
        }
    }

    // delete record
    function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE topic_id = ?";
        // statement
        $stmt = mysqli_prepare($this->conn, $query);
        // bind parameter
        mysqli_stmt_bind_param($stmt, 's', $this->topic_id);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }else {
            return false;
        }
    }
}

?>
