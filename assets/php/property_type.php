<?php
class Property_type{

    // database connection and table name
    private $conn;
    private $table_name = "property_types";

    // object properties
    public $prop_type_id;
    public $prop_type_desc;
    public $prop_type_status;

    public function __construct($db){
        $this->conn = $db;
    }

    // read all records
    function readall($act){
        if ($act) {
            $query = "SELECT * FROM " . $this->table_name . " WHERE prop_type_status = 1 ORDER BY prop_type_id";
        } else {
            $query = "SELECT * FROM " . $this->table_name . " ORDER BY prop_type_id";
        }
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // read one record
    function readone(){
        $query = "SELECT * FROM " . $this->table_name . " WHERE prop_type_id = " . $this->prop_type_id;
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // create contact information
    function create(){
        // write statement
        $stmt = mysqli_prepare($this->conn, "INSERT INTO " . $this->table_name . " (prop_type_desc, prop_type_status) VALUES (?,?)");
        // bind parameters
        mysqli_stmt_bind_param($stmt, 'ss', $this->prop_type_desc, $this->prop_type_status);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }else {
            return false;
        }
    }  // function create()

    // update record
    function update(){
        $query = "UPDATE " . $this->table_name . " SET prop_type_desc = ?, prop_type_status = ? WHERE prop_type_id = ?";
        // statement
        $stmt = mysqli_prepare($this->conn, $query);
        // bind parameters
        mysqli_stmt_bind_param($stmt, 'sss', $this->prop_type_desc, $this->prop_type_status, $this->prop_type_id);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }else {
            return false;
        }
    }

    // delete record
    function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE prop_type_id = ?";
        // statement
        $stmt = mysqli_prepare($this->conn, $query);
        // bind parameter
        mysqli_stmt_bind_param($stmt, 's', $this->prop_type_id);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }else {
            return false;
        }
    }

    // get property type name
    function gettype_name(){
        $query = "SELECT prop_type_desc FROM " . $this->table_name . " WHERE prop_type_id = " . $this->prop_type_id;
        $result = mysqli_query($this->conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            return $row['prop_type_desc'];
        } else {
            return "";
        }
    }
}

?>
