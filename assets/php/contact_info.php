<?php
class Contact_info{

    // database connection and table name
    private $conn;
    private $table_name = "contact_info";

    // object properties
    public $fname;
    public $lname;
    public $email;
    public $phone;
    public $address;
    public $city;
    public $province_id;
    public $zip_code;
    public $domain_name;
    public $user_type;
    public $description;
    public $contact_id;

    public function __construct($db){
        $this->conn = $db;
    }

    // create contact information
    function create(){

        // write statement
        $stmt = mysqli_prepare($this->conn, "INSERT INTO " . $this->table_name . " (fname, lname, email, phone, address, city, province_id, zip_code, domain_name, user_type, description) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
        mysqli_stmt_bind_param($stmt, 'sssssssssss', $this->fname, $this->lname, $this->email, $this->phone, $this->address, $this->city, $this->province_id, $this->zip_code, $this->domain_name, $this->user_type, $this->description);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }else {
            return false;
        }
    }  // function create()

    // read all records
    function readall(){

        $query = "SELECT * FROM " . $this->table_name . " ORDER BY contact_id DESC";
        // statement
        //$stmt = mysqli_prepare($this->conn, $query);
        $result = mysqli_query($this->conn, $query);
        //mysqli_stmt_execute($stmt);
        //return $stmt;
        return $result;
    }

    // read one record
    function readone(){
        $query = "SELECT * FROM " . $this->table_name . " WHERE contact_id = " . $this->contact_id;
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // update record
    function update(){
        $query = "UPDATE " . $this->table_name . " SET fname = ?, lname = ?, email = ?, phone = ?, address = ?, city = ?, province_id = ?, zip_code = ?, domain_name = ?, user_type = ?, description = ? WHERE contact_id = ?";
        // statement
        $stmt = mysqli_prepare($this->conn, $query);
        // bind parameters
        mysqli_stmt_bind_param($stmt, 'ssssssssssss', $this->fname, $this->lname, $this->email, $this->phone, $this->address, $this->city, $this->province_id, $this->zip_code, $this->domain_name, $this->user_type, $this->description, $this->contact_id);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }else {
            return false;
        }
    }

    // delete record
    function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE contact_id = ?";
        // statement
        $stmt = mysqli_prepare($this->conn, $query);
        // bind parameter
        mysqli_stmt_bind_param($stmt, 's', $this->contact_id);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }else {
            return false;
        }
    }



}
?>
