<?php
class Project_Topic{

    // database connection and table name
    private $conn;
    private $table_name = "project_topics";

    // object properties
    public $topic_id;
    public $title_th;
    public $title_en;
    public $abstract;
    public $project_year;
    public $status;       // 0=ไม่ผ่าน, 1=ผ่าน, 2=ผ่านแบบมีเงื่อนไข, 3=รอพิจารณา
    public $comment;
    public $created_date;
    public $updated_date;

    public function __construct($db){
        $this->conn = $db;
    }

    // get number of total records for a specific project year
    function getTotalProjects(){
        $query = "SELECT * FROM " . $this->table_name . "WHERE project_year = '" . $this->project_year . "'";
        $result = mysqli_query($this->conn, $query);
        return mysqli_num_rows($result);
    }

    // create contact information
    function create(){
        // no. of all project
        $noproj = getTotalProjects();
        $this->topic_id = "BISProj" . $this->project_year . "-" . sprintf("%03d", $noproj);

        // write statement
        $stmt = mysqli_prepare($this->conn, "INSERT INTO " . $this->table_name . " (topic_id, title_th, title_en, abstract, project_year, status, comment, created_date) VALUES (?,?,?,?,?,?,?,?)");
        mysqli_stmt_bind_param($stmt, 'ssssssss', $this->topic_id, $this->title_th, $this->title_en, $this->abstract, $this->project_year, $this->status, $this->comment, $this->created_date);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['topic_id'] = $this->topic_id;
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
        $query = "SELECT * FROM " . $this->table_name . " WHERE topic_id = '" . $this->topic_id . "'";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // update record - account
    function update(){
        $query = "UPDATE " . $this->table_name . " SET title_th = ?, title_en = ?, abstract = ?, project_year = ?, status = ?, comment = ?, updated_date = ? WHERE topic_id = ?";
        // statement
        $stmt = mysqli_prepare($this->conn, $query);
        // bind parameters
        mysqli_stmt_bind_param($stmt, 'ssssssss', $this->title_th, $this->title_en, $this->abstract, $this->project_year, $this->status, $this->comment, $this->updated_date, $this->topic_id);

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

    // search title_th
    function search_title() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE title_th LIKE '%" . $this->title_th . "%' ORDER BY topic_id";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // search nothing
    function search_nothing() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE topic_id = '0'";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }
}

?>
