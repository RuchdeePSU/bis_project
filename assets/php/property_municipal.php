<?php
class Property_municipal{

    // database connection and table name
    private $conn;
    private $table_name = "property_municipals";

    // object properties
    public $prop_municipal_id;
    public $prop_municipal_desc;
    public $prop_municipal_status;

    public function __construct($db){
        $this->conn = $db;
    }

    // read all records
    function readall($act){
        // only active - prop_municipal_status = 1
        if ($act) {
            $query = "SELECT * FROM " . $this->table_name . " WHERE prop_municipal_status = 1 ORDER BY prop_municipal_id";
        } else {
            $query = "SELECT * FROM " . $this->table_name . " ORDER BY prop_municipal_id";
        }
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // read one record
    function readone(){
        $query = "SELECT * FROM " . $this->table_name . " WHERE prop_municipal_id = " . $this->prop_municipal_id;
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // create contact information
    function create(){
        // write statement
        $stmt = mysqli_prepare($this->conn, "INSERT INTO " . $this->table_name . " (prop_municipal_desc, prop_municipal_status) VALUES (?,?)");
        // bind parameters
        mysqli_stmt_bind_param($stmt, 'ss', $this->prop_municipal_desc, $this->prop_municipal_status);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }else {
            return false;
        }
    }  // function create()

    // update record
    function update(){
        $query = "UPDATE " . $this->table_name . " SET prop_municipal_desc = ?, prop_municipal_status = ? WHERE prop_municipal_id = ?";
        // statement
        $stmt = mysqli_prepare($this->conn, $query);
        // bind parameters
        mysqli_stmt_bind_param($stmt, 'sss', $this->prop_municipal_desc, $this->prop_municipal_status, $this->prop_municipal_id);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }else {
            return false;
        }
    }

    // delete record
    function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE prop_municipal_id = ?";
        // statement
        $stmt = mysqli_prepare($this->conn, $query);
        // bind parameter
        mysqli_stmt_bind_param($stmt, 's', $this->prop_municipal_id);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }else {
            return false;
        }
    }
}

?>
