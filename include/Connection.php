<?php
class Database{
  

    private $host = "localhost";
    private $username = "root";
    private $password = "root";
    private $db_name = "inventory";
    public $conn;

    public function getConnection(){
  
        $this->conn = null;
  
        try{
            $this->conn = mysqli_connect($this->host,$this->username,$this->password,$this->db_name);
            
        }catch(Exception $exception){
            echo $exception;
        }
        return $this->conn;
    }
}
?>