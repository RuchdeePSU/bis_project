<?php
/**
 *
 */
class Property_detail
{
    // database connection and table name
    private $conn;
    private $table_name = "property_details";

    // object properties
    public $prop_id;
    public $prop_type_id;
    public $units_total;
    public $units_sold;
    public $units_sold_avg;
    public $units_unsold;
    public $time_unsold_avg;
    public $units_new_6m;
    public $prop_min_price;
    public $prop_max_price;

    // default constructor
    function __construct($db)
    {
      $this->conn = $db;
    }

    // read one property
    function readone(){
        $query = "SELECT * FROM " . $this->table_name . " WHERE prop_id = " . $this->prop_id . " AND prop_type_id = " . $this->prop_type_id;
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // create property_details data
    function create(){
        // write statement
        $stmt = mysqli_prepare($this->conn, "INSERT INTO " . $this->table_name . " (prop_id, prop_type_id, units_total, units_sold, units_sold_avg, units_unsold, time_unsold_avg, units_new_6m, prop_min_price, prop_max_price) VALUES (?,?,?,?,?,?,?,?,?,?)");
        // bind parameters
        mysqli_stmt_bind_param($stmt, 'ssssssssss', $this->prop_id, $this->prop_type_id, $this->units_total, $this->units_sold, $this->units_sold_avg, $this->units_unsold, $this->time_unsold_avg, $this->units_new_6m, $this->prop_min_price, $this->prop_max_price);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }else {
            return false;
        }
    }

    // update property_details data
    function update(){
        $query = "UPDATE " . $this->table_name . " SET units_total = ?, units_sold = ?, units_sold_avg = ?, units_unsold = ?, time_unsold_avg = ?, units_new_6m = ?, prop_min_price = ?, prop_max_price = ? WHERE prop_id = ? AND prop_type_id = ?";
        // statement
        $stmt = mysqli_prepare($this->conn, $query);
        // bind parameters
        mysqli_stmt_bind_param($stmt, 'ssssssssss', $this->units_total, $this->units_sold, $this->units_sold_avg, $this->units_unsold, $this->time_unsold_avg, $this->units_new_6m, $this->prop_min_price, $this->prop_max_price, $this->prop_id, $this->prop_type_id);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }else {
            return false;
        }
    }

    // delete record
    function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE prop_id = ?";
        // statement
        $stmt = mysqli_prepare($this->conn, $query);
        // bind parameter
        mysqli_stmt_bind_param($stmt, 's', $this->prop_id);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }else {
            return false;
        }
    }

    // search
    function search(){
        if ($this->prop_type_id == "0") {
            $query = "SELECT prop_min_price, prop_max_price FROM " . $this->table_name . " WHERE prop_id = " . $this->prop_id . " AND prop_min_price >= " . $this->prop_min_price . " AND prop_max_price <= " . $this->prop_max_price;
        } else {
            $query = "SELECT prop_min_price, prop_max_price FROM " . $this->table_name . " WHERE prop_id = " . $this->prop_id . " AND prop_type_id = " . $this->prop_type_id . " AND prop_min_price >= " . $this->prop_min_price . " AND prop_max_price <= " . $this->prop_max_price;
        }
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // find max_price of a specific prop_id
    function find_min_price(){
        $query = "SELECT MIN(prop_min_price) as min_price FROM " . $this->table_name . " WHERE prop_id = " . $this->prop_id . " AND prop_min_price > 0";
        $result = mysqli_query($this->conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            return $row['min_price'];
        } else {
            return 0;
        }
    }

    // find max_price of a specific prop_id
    function find_max_price(){
        $query = "SELECT MAX(prop_max_price) as max_price FROM " . $this->table_name . " WHERE prop_id = " . $this->prop_id;
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_array($result);
        return $row['max_price'];
    }

    // read some property details where units_total > 0
    function readsome(){
        $query = "SELECT * FROM " . $this->table_name . " WHERE prop_id = " . $this->prop_id . " AND units_total > 0 ORDER BY prop_type_id";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }
}

?>
