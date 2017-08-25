<?php
class Admin{

    // database connection and table name
    private $conn;
    private $table_name = "tbl_admin";

    // object properties
    public $email;
    public $passwd;
    public $name;
    public $status;

    public function __construct($db){
        $this->conn = $db;
    }

    // create contact information
    function create(){

        // write statement
        $stmt = mysqli_prepare($this->conn, "INSERT INTO " . $this->table_name . " (email, passwd, name, status) VALUES (?,?,?,?)");
        mysqli_stmt_bind_param($stmt, 'ssss', $this->email, md5($this->passwd), $this->name, $this->status);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }else {
            return false;
        }
    }  // function create()

    // read all records
    function readall(){
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY name";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // read one record
    function readone(){
        //$query = "SELECT * FROM " . $this->table_name . " WHERE email = " . $this->email . " and passwd = " . $this->passwd;
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = '" . $this->email . "' and passwd = '" . md5($this->passwd) . "' and status = 1";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // read one record for update
    function readoneforupdate(){
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = '" . $this->email . "'";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // update record - account
    function update_account(){
        $query = "UPDATE " . $this->table_name . " SET name = ?, status = ? WHERE email = ?";
        // statement
        $stmt = mysqli_prepare($this->conn, $query);
        // bind parameters
        mysqli_stmt_bind_param($stmt, 'sss', $this->name, $this->status, $this->email);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }else {
            return false;
        }
    }

    // update record - password
    function update_password(){
        $query = "UPDATE " . $this->table_name . " SET passwd = ? WHERE email = ?";
        // statement
        $stmt = mysqli_prepare($this->conn, $query);
        // bind parameters
        mysqli_stmt_bind_param($stmt, 'ss', md5($this->passwd), $this->email);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }else {
            return false;
        }
    }

    // delete record
    function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE email = ?";
        // statement
        $stmt = mysqli_prepare($this->conn, $query);
        // bind parameter
        mysqli_stmt_bind_param($stmt, 's', $this->email);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }else {
            return false;
        }
    }
}

?>
