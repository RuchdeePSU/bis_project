<?php
class Project_News{

    // database connection and table name
    private $conn;
    private $table_name = "project_news";

    // object properties
    public $news_id;
    public $news_desc;
    public $news_by;
    public $news_file;
    public $news_date;
    public $project_year;

    public function __construct($db) {
        $this->conn = $db;
    }

    // create contact information
    function create() {

        // write statement
        $stmt = mysqli_prepare($this->conn, "INSERT INTO " . $this->table_name . " (news_desc, news_by, news_file, news_date, project_year) VALUES (?,?,?,?,?)");
        mysqli_stmt_bind_param($stmt, 'sssss', $this->news_desc, $this->news_by, $this->news_file, $this->news_date, $this->project_year);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }else {
            return false;
        }
    }  // function create()

    // read all records
    function readall() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE project_year = '" . $this->project_year . "' ORDER BY news_id DESC";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // read one record
    function readone() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE news_id = " . $this->news_id;
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // update record - account
    function update() {
        $query = "UPDATE " . $this->table_name . " SET news_desc = ?, news_by = ?, news_file = ?, news_date = ?, project_year = ? WHERE news_id = ?";
        // statement
        $stmt = mysqli_prepare($this->conn, $query);
        // bind parameters
        mysqli_stmt_bind_param($stmt, 'ssssss', $this->news_desc, $this->news_by, $this->news_file, $this->news_date, $this->project_year, $this->news_id);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }else {
            return false;
        }
    }

    // delete record
    function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE news_id = ?";
        // statement
        $stmt = mysqli_prepare($this->conn, $query);
        // bind parameter
        mysqli_stmt_bind_param($stmt, 's', $this->news_id);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }else {
            return false;
        }
    }
}

?>
