<?php
    include_once 'property_detail.php';

class Property{

    // database connection and table name
    private $conn;
    private $table_name = "properties";
    private $last_prop_id;

    // object properties
    public $prop_id;
    public $prop_name;
    public $prop_address_no;
    public $prop_address_moo;
    public $prop_address_road;
    public $prop_address_subdistrict;
    public $prop_address_district;
    public $prop_municipal_id;
    public $prop_phone_no;
    public $prop_email;
    public $prop_lat;
    public $prop_long;
    public $prop_detail_link;
    public $prop_thumbnail_img;
    public $prop_icon_type;
    public $prop_status;
    public $prop_created_date;
    public $prop_updated_date;
    //
    public $prop_size1;
    public $prop_size2;
    public $prop_size3;
    public $prop_regist_no;
    public $prop_owner_name;
    public $prop_membership;
    public $prop_corporation;
    public $prop_started_date;
    public $prop_contact_person;
    public $prop_website;

    // for searching property
    public $srch_municipal_id;
    public $srch_type_id;
    public $srch_min_price;
    public $srch_max_price;

    // for pagination
    public $start;
    public $perpage;

    // for search in properties-listing.php
    public $srch_prop_name;

    public function __construct($db){
        $this->conn = $db;
    }

    // read all records
    function readall($act){
        if ($act) {
          $query = "SELECT * FROM " . $this->table_name . " WHERE prop_status = 1 ORDER BY prop_id DESC";
        } else {
          $query = "SELECT * FROM " . $this->table_name . " ORDER BY prop_id DESC";
        }
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // read all records
    function readforpagination(){
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY prop_id DESC LIMIT " . $this->start . ", " . $this->perpage;
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // read one record
    function readone(){
        $query = "SELECT * FROM " . $this->table_name . " WHERE prop_id = " . $this->prop_id;
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // create property data
    function create(){
        // prop_detail_link
        $this->prop_detail_link = "properties-detail.php";
        // prop_thumbnail_img
        $this->prop_thumbnail_img = "assets/img/properties/property-sample.jpg";
        /*
        Property Types:
        1-บ้านเดียว, 2-บ้านแฝด, 3-ทาวน์เฮาส์+ทาวน์โฮม, 4-คอนโดมิเนียม, 5-อาคารพานิชย์, 6-อื่นๆ
        */
        // prop_icon_type
        $this->prop_icon_type = "assets/img/property-types/single-family.png";
        // switch ($this->prop_type_id) {
        //     case 1:
        //         $this->prop_icon_type = "assets/img/property-types/single-family.png";
        //         break;
        //     case 2:
        //         $this->prop_icon_type = "assets/img/property-types/single-family.png";
        //         break;
        //     case 3:
        //         $this->prop_icon_type = "assets/img/property-types/villa.png";
        //         break;
        //     case 4:
        //         $this->prop_icon_type = "assets/img/property-types/condominium.png";
        //         break;
        //     case 5:
        //         $this->prop_icon_type = "assets/img/property-types/warehouse.png";
        //         break;
        //     default:
        //         $this->prop_icon_type = "assets/img/property-types/single-family.png";
        //         break;
        // }

        // write statement
        $stmt = mysqli_prepare($this->conn, "INSERT INTO " . $this->table_name . " (prop_name, prop_address_no, prop_address_moo, prop_address_road, prop_address_subdistrict, prop_address_district, prop_municipal_id, prop_phone_no, prop_email, prop_lat, prop_long, prop_size1, prop_size2, prop_size3, prop_regist_no, prop_owner_name, prop_membership, prop_corporation, prop_started_date, prop_contact_person, prop_website, prop_detail_link, prop_thumbnail_img, prop_icon_type, prop_status, prop_created_date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        // bind parameters
        mysqli_stmt_bind_param($stmt, 'ssssssssssssssssssssssssss', $this->prop_name, $this->prop_address_no, $this->prop_address_moo, $this->prop_address_road, $this->prop_address_subdistrict, $this->prop_address_district, $this->prop_municipal_id, $this->prop_phone_no, $this->prop_email, $this->prop_lat, $this->prop_long, $this->prop_size1, $this->prop_size2, $this->prop_size3, $this->prop_regist_no, $this->prop_owner_name, $this->prop_membership, $this->prop_corporation, $this->prop_started_date, $this->prop_contact_person, $this->prop_website, $this->prop_detail_link, $this->prop_thumbnail_img, $this->prop_icon_type, $this->prop_status, $this->prop_created_date);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            $this->last_prop_id = mysqli_stmt_insert_id($stmt);
            return true;
        }else {
            return false;
        }
    }  // function create()

    // get last prop_id
    function getlastproperty_id(){
        return $this->last_prop_id;
    }

    // update record
    function update(){
        // prop_detail_link
        $this->prop_detail_link = "properties-detail.php";
        // prop_thumbnail_img
        $this->prop_thumbnail_img = "assets/img/properties/property-sample.jpg";
        /*Property Types:
        1-บ้านเดียว, 2-บ้านแฝด, 3-ทาวน์เฮาส์+ทาวน์โฮม, 4-คอนโดมิเนียม, 5-อาคารพานิชย์, 6-อื่นๆ
        */
        // prop_icon_type
        $this->prop_icon_type = "assets/img/property-types/single-family.png";
        // switch ($this->prop_type_id) {
        //     case 1:
        //         $this->prop_icon_type = "assets/img/property-types/single-family.png";
        //         break;
        //     case 2:
        //         $this->prop_icon_type = "assets/img/property-types/single-family.png";
        //         break;
        //     case 3:
        //         $this->prop_icon_type = "assets/img/property-types/villa.png";
        //         break;
        //     case 4:
        //         $this->prop_icon_type = "assets/img/property-types/condominium.png";
        //         break;
        //     case 5:
        //         $this->prop_icon_type = "assets/img/property-types/warehouse.png";
        //         break;
        //     default:
        //         $this->prop_icon_type = "assets/img/property-types/single-family.png";
        //         break;
        // }

        $query = "UPDATE " . $this->table_name . " SET prop_name = ?, prop_address_no = ?, prop_address_moo = ?, prop_address_road = ?, prop_address_subdistrict = ?, prop_address_district = ?, prop_municipal_id = ?, prop_phone_no = ?, prop_email = ?, prop_lat = ?, prop_long = ?, prop_size1 = ?, prop_size2 = ?, prop_size3 = ?, prop_regist_no = ?, prop_owner_name = ?, prop_membership = ?, prop_corporation = ?, prop_started_date = ?, prop_contact_person = ?, prop_website = ?, prop_detail_link = ?, prop_thumbnail_img = ?, prop_icon_type = ?, prop_status = ?, prop_updated_date = ? WHERE prop_id = ?";
        // statement
        $stmt = mysqli_prepare($this->conn, $query);
        // bind parameters
        mysqli_stmt_bind_param($stmt, 'sssssssssssssssssssssssssss', $this->prop_name, $this->prop_address_no, $this->prop_address_moo, $this->prop_address_road, $this->prop_address_subdistrict, $this->prop_address_district, $this->prop_municipal_id, $this->prop_phone_no, $this->prop_email, $this->prop_lat, $this->prop_long, $this->prop_size1, $this->prop_size2, $this->prop_size3, $this->prop_regist_no, $this->prop_owner_name, $this->prop_membership, $this->prop_corporation, $this->prop_started_date, $this->prop_contact_person, $this->prop_website, $this->prop_detail_link, $this->prop_thumbnail_img, $this->prop_icon_type, $this->prop_status, $this->prop_updated_date, $this->prop_id);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }else {
            return false;
        }
    }

    // delete record
    function delete() {
        // first delete property data in property_detail
        $property_detail = new Property_detail($this->conn);
        $property_detail->prop_id = $this->prop_id;
        if ($property_detail->delete()) {
            $query = "DELETE FROM " . $this->table_name . " WHERE prop_id = ?";
            // statement
            $stmt = mysqli_prepare($this->conn, $query);
            // bind parameter
            mysqli_stmt_bind_param($stmt, 's', $this->prop_id);
            /* execute prepared statement */
            if (mysqli_stmt_execute($stmt)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    // write data from mysql to json file
    function writejson() {
        // json filename
        $jsfile = "assets/js/locations.js";
        try {
            // pass connection to property_detail
            $property_detail = new Property_detail($this->conn);
            //write to json file
            $jsfp = fopen($jsfile, "w");
            fwrite($jsfp, "var locations = [\n");

            // read all records
            // $query = "SELECT * FROM " . $this->table_name . " ORDER BY prop_id";
            // $result = mysqli_query($this->conn, $query);
            $active = true;
            $result = $this->readall($active);
            $nor = mysqli_num_rows($result);
            $cnt = 0;
            while ($row = mysqli_fetch_array($result)) {
                $cnt++;
                $straddr = "";
                $property_detail->prop_id = $row['prop_id'];
                $min_p = $property_detail->find_min_price();
                $max_p = $property_detail->find_max_price();

                if (!empty($row['prop_address_no'])) {
                    $straddr .= $row['prop_address_no'] . " ";
                }
                if (!empty($row['prop_address_moo'])) {
                    $straddr .= "ม." . $row['prop_address_moo'] . " ";
                }
                if (!empty($row['prop_address_road']) && strlen($straddr) < 80) {
                    $straddr .= "ถ." . $row['prop_address_road'] . " ";
                }
                if (!empty($row['prop_address_subdistrict']) && strlen($straddr) < 80) {
                    $straddr .= "ต." . $row['prop_address_subdistrict'] . " ";
                }
                if (!empty($row['prop_address_district']) && strlen($straddr) < 80) {
                    $straddr .= "อ." . $row['prop_address_district'];
                }

                $strdata = '[' . '"' . $row['prop_name'] . '", "' . $straddr . '", "' . '฿' . number_format($min_p) . '-' . '฿' .  number_format($max_p) . '", ' . $row['prop_lat'] . ', ' . $row['prop_long'] . ', "' . $row['prop_detail_link'] . '", "' . $row['prop_thumbnail_img'] . '", "' . $row['prop_icon_type'] . '", "' . $row['prop_id'] . '"' .']';

                if ($cnt == $nor) {
                     $strdata .= "\n];";
                 } else {
                     $strdata .= ",\n";
                 }
                fwrite($jsfp, $strdata);
            }
            fclose($jsfp);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    // search property
    function search() {
        // json filename
        $jsfile = "assets/js/locations.js";
        try {
            $jsfp = fopen($jsfile, "w");
            $strdata = "";
            if ($this->srch_municipal_id == "0") {
                $query = "SELECT * FROM " . $this->table_name . " WHERE prop_status = 1 ORDER BY prop_id";
            } else {
                $query = "SELECT * FROM " . $this->table_name . " WHERE prop_municipal_id = " . $this->srch_municipal_id . " AND prop_status = 1";
            }
            $result = mysqli_query($this->conn, $query);
            // number of records from properties table
            $no_prop = mysqli_num_rows($result);
            if ($no_prop > 0) {
                // write to json file
                fwrite($jsfp, "var locations = [\n");
                $property_detail = new Property_detail($this->conn);
                $cnt = 0;
                while ($row = mysqli_fetch_array($result)) {
                    $property_detail->prop_id = $row['prop_id'];
                    $property_detail->prop_type_id = $this->srch_type_id;
                    $property_detail->prop_min_price = $this->srch_min_price;
                    $property_detail->prop_max_price = $this->srch_max_price;

                    $result_prop_detail = $property_detail->search();
                    $no_prop_detail = mysqli_num_rows($result_prop_detail);
                    if ($no_prop_detail > 0) {
                        $tmp_min_p = 0;
                        $tmp_max_p = 0;
                        while ($row_prop_detail = mysqli_fetch_array($result_prop_detail)) {
                            // find minimum price
                            if ($tmp_min_p == 0) {
                               $tmp_min_p = $row_prop_detail['prop_min_price'];
                               $min_p = $tmp_min_p;
                            } else {
                                if ($tmp_min_p < $row_prop_detail['prop_min_price']) {
                                    $min_p = $tmp_min_p;
                                } else {
                                    $min_p = $row_prop_detail['prop_min_price'];
                                }
                                $tmp_min_p = $min_p;
                            }
                            //find maximum price
                            if ($tmp_max_p == 0) {
                               $tmp_max_p = $row_prop_detail['prop_max_price'];
                               $max_p = $tmp_max_p;
                            } else {
                                if ($tmp_max_p > $row_prop_detail['prop_max_price']) {
                                    $max_p = $tmp_max_p;
                                } else {
                                    $max_p = $row_prop_detail['prop_max_price'];
                                }
                                $tmp_max_p = $max_p;
                            }
                        }

                        $cnt++;
                        $straddr = "";
                        if (!empty($row['prop_address_no'])) {
                            $straddr .= $row['prop_address_no'] . " ";
                        }
                        if (!empty($row['prop_address_moo'])) {
                            $straddr .= "ม." . $row['prop_address_moo'] . " ";
                        }
                        if (!empty($row['prop_address_road']) && strlen($straddr) < 80) {
                            $straddr .= "ถ." . $row['prop_address_road'] . " ";
                        }
                        if (!empty($row['prop_address_subdistrict']) && strlen($straddr) < 80) {
                            $straddr .= "ต." . $row['prop_address_subdistrict'] . " ";
                        }
                        if (!empty($row['prop_address_district']) && strlen($straddr) < 80) {
                            $straddr .= "อ." . $row['prop_address_district'];
                        }

                        $strdata = '[' . '"' . $row['prop_name'] . '", "' . $straddr . '", "' . '฿' . number_format($min_p) . '-' . '฿' .  number_format($max_p) . '", ' . $row['prop_lat'] . ', ' . $row['prop_long'] . ', "' . $row['prop_detail_link'] . '", "' . $row['prop_thumbnail_img'] . '", "' . $row['prop_icon_type'] . '", "' . $row['prop_id'] . '"' . ']';
                        if ($cnt == $no_prop) {
                             $strdata .= "\n];";
                         } else {
                             $strdata .= ",\n";
                         }
                        fwrite($jsfp, $strdata);
                    } else {
                        $no_prop -= 1;
                        if ($cnt == $no_prop) {
                             $strdata = "\n];";
                             fwrite($jsfp, $strdata);
                         }
                    }    // if ($no_prop_detail > 0)

                }     // while ($row = mysqli_fetch_array($result))
                fclose($jsfp);
                if ($cnt == 0) {
                    return false;
                } else {
                    return true;
                }
            } else {
                fwrite($jsfp, $strdata);
                fclose($jsfp);
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    // get number of total records
    function getTotalRows(){
        $query = "SELECT * FROM " . $this->table_name;
        $result = mysqli_query($this->conn, $query);
        return mysqli_num_rows($result);
    }

    // search property in properties-listing.php
    function search_listing(){
        $query = "SELECT * FROM " . $this->table_name . " WHERE prop_name LIKE '%" . $this->srch_prop_name . "%' ORDER BY prop_id DESC LIMIT " . $this->start . ", " . $this->perpage;
        $result = mysqli_query($this->conn, $query);
        return $result;
    }
}

?>
