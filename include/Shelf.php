<?php
    class Shelf
    {
        public $conn;
        public function __construct($db){
            $this->conn = $db;
        }
        public function addShelf($name)
        {
            $sql = "INSERT INTO shelf (number)  VALUES ('$name')";

            if(mysqli_query($this->conn,$sql)){
               return true;
            } 
            else
            {
                echo "ERROR: Could not able to execute $sql. " .$this->conn->error;
                return false;
            }
        }
        public function getAllShelf()
        {
            $sql = "SELECT * from shelf";
            if($result = mysqli_query($this->conn,$sql))
            {
                if (mysqli_num_rows($result) > 0) { 
                    
                    while ($row = mysqli_fetch_array($result)) { 
                        echo '<option value="'.$row['id'].'">'.$row['number'].'</option>';
                    }
                }
            }
        }
        public function displayAllShelf()
        {
            $sql = "SELECT * from shelf";
            if($result = mysqli_query($this->conn,$sql))
            {
                if (mysqli_num_rows($result) > 0) { 
                    
                    while ($row = mysqli_fetch_array($result)) { 
                        echo '<tr>
                            <td>'.$row['id'].'</td>
                            <td>'.$row['number'].'</td>
                            <td><a title="Delete Product" href="action.php?deleteShelf='.$row['id'].'" style="color:white;"  class="btn btn-danger btn-circle">
                            <i class="fas fa-trash"></i>
                          </a></td>
                        </tr>';
                    }
                }
            }
        }
        public function deleteShelf($id)
        {
            $sql = "Delete from shelf WHERE id = '$id' ";

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