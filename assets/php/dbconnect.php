<?php
class Database{

    //connect to mysql database
    private $host = "localhost";
    private $user = "root";
    // Google Cloud Platform
    // private $passwd = "3jVuRoJ2";
    private $passwd = "";
    private $db_name = "bis_project";
    public $conn;

    // get the database connection
    public function getConnection(){
        $this->conn = null;
        try{
            $this->conn = mysqli_connect($this->host, $this->user, $this->passwd, $this->db_name);
            //mysqli_query($this->conn, "SET NAMES 'utf8' COLLATE 'utf8_unicode_ci'");
        }catch(Exception $exception){
            echo "Connection error: " . $exception.getMessage();
        }
        return $this->conn;
    }

    // close connection
    public function closeConnection(){
        mysqli_close($this->conn);
    }
}

?>
