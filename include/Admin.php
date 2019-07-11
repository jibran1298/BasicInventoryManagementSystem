<?php
    class Admin
    {
        public $conn;
        public function __construct($db){
            $this->conn = $db;
        }
        public function login($username,$password)
        {
            $sql = "SELECT * from admin WHERE username = '$username' and password = '$password'";
            if($result = mysqli_query($this->conn,$sql))
            {
                if (mysqli_num_rows($result) > 0) { 
                    return true;
                }
                else{
                    return false;
                }
            }
        }
        public function updatePassword($password)
        {
            $sql = "Update admin SET password = '$password' WHERE id=1";
            if(mysqli_query($this->conn,$sql)){
                return true;
            } 
            else
            {
                echo "ERROR: Could not able to execute $sql. " .$this->conn->error;
                return false;
            }
        }  
    }
?>