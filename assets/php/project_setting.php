<?php
class Project_Setting{

    // database connection and table name
    private $conn;
    private $table_name = "project_settings";

    // object properties
    public $project_year;
    public $admin_email;
    public $admin_passwd;

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

    // check admin's signing in
    function chk_admin_signin() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE admin_email = '" . $this->admin_email . "' AND admin_passwd = '" . md5($this->admin_passwd) . "'";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // update record - project_year
    function update_year(){
        $query = "UPDATE " . $this->table_name . " SET project_year = ?, admin_email = ?";
        // statement
        $stmt = mysqli_prepare($this->conn, $query);
        // bind parameters
        mysqli_stmt_bind_param($stmt, 'ss', $this->project_year, $this->admin_email);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }else {
            return false;
        }
    }

    // update record - admin_passwd
    function update_password(){
        $query = "UPDATE " . $this->table_name . " SET admin_passwd = ?";
        // statement
        $stmt = mysqli_prepare($this->conn, $query);
        // bind parameters
        mysqli_stmt_bind_param($stmt, 's', md5($this->admin_passwd));

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }else {
            return false;
        }
    }


}

?>
