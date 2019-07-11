<?php
    class Supplier
    {
        public $conn;
        public function __construct($db){
            $this->conn = $db;
        }
        public function getAllSuppliers()
        {
            $sql = "SELECT * from supplier";
            if($result = mysqli_query($this->conn,$sql))
            {
                if (mysqli_num_rows($result) > 0) { 
                    while ($row = mysqli_fetch_array($result)) { 
                        if($row['status']==1)
                        {
                            echo '<option value="'.$row['supplier_id'].'">'.$row['name'].'</option>';
                        }
                    }
                }
            }
        }
        public function getSupplier($id)
        {
            $sql = "SELECT * from supplier WHERE supplier_id = '$id'";
            if($result = mysqli_query($this->conn,$sql))
            {
                if (mysqli_num_rows($result) > 0) { 
                    while ($row = mysqli_fetch_array($result)) { 
                        
                        echo '  <div class="row">
                        <div class="col-sm">
                            <label for="name">Supplier Name : </label>
                            <input type="text" class="form-control" name="name" id="name" value="'.$row['name'].'" required>
                        </div>
                        <div class="col-sm">
                            <label for="contact">Contact #  : </label>
                            <input type="text" class="form-control" name="contact" id="contact" value="'.$row['contact'].'"  required>
                        </div>
                        <div class="col-sm">
                            <label for="quantity">Status  : </label>
                            <select class="form-control" required name="status">
                                <option value="1">Active</option>
                                <option value="0">InActive</option>
                            </select>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-sm">
                            <label for="address">Address  : </label>
                            <input type="text" class="form-control" value="'.$row['address'].'"  name="address" id="address" required>
                        </div>
                        <div class="col-sm">
                            
                        </div>
                    </div>';
                    }

                }

            }
        }
        public function displayAllSuppliers()
        {
            $sql = "SELECT * from supplier";
            if($result = mysqli_query($this->conn,$sql))
            {
                if (mysqli_num_rows($result) > 0) { 
                    while ($row = mysqli_fetch_array($result)) { 
                        if($row['status']==1)
                        {
                            $status = '<td class="table-success">Active</td>';
                        }
                        else{
                            $status = '<td class="table-danger">Inactive</td>';
                        }
                        echo '<tr>
                        <td>'.$row['supplier_id'].'</td>
                        <td>'.$row['name'].'</td>
                        <td>'.$row['contact'].'</td>
                        <td>'.$row['address'].'</td>'.$status.'
                        <td>
                        <a  title="Edit Supplier" href="editSupplier.php?supplier='.$row['supplier_id'].'" style="color:white;"  class="btn btn-info btn-circle">
                        <i class="fas fa-edit"></i>
                      </a>
                        <a title="Delete Delete Supplier" href="action.php?deleteSupplier='.$row['supplier_id'].'" style="color:white;"  class="btn btn-danger btn-circle">
                        <i class="fas fa-trash"></i>
                      </a></td>
                      </tr>';
                    }

                }

            }
        }
        public function getActiveSuppliers()
        {
            $sql = "SELECT * from supplier WHERE status=1";
            if($result = mysqli_query($this->conn,$sql))
            {
                if (mysqli_num_rows($result) > 0) { 
                    echo mysqli_num_rows($result);
                }
                else{
                    echo 0;
                }
            }
        }
        public function getInActiveSuppliers()
        {
            $sql = "SELECT * from supplier WHERE status=0";
            if($result = mysqli_query($this->conn,$sql))
            {
                if (mysqli_num_rows($result) > 0) { 
                    echo mysqli_num_rows($result);
                }
                else{
                    echo 0;
                }
            }
        }
        public function updateSupplier($name,$contact,$address,$status,$id)
        {
            
            $sql = "Update supplier SET name = '$name', contact = '$contact' ,address = '$address' ,status = '$status' WHERE supplier_id='$id'";
            if(mysqli_query($this->conn,$sql)){
                return true;
            } 
            else
            {
                echo "ERROR: Could not able to execute $sql. " .$this->conn->error;
                return false;
            }
        }
        public function addSupplier($name,$contact,$address,$status)
        {
            $date = date("Y-m-d");
            $sql = "INSERT INTO supplier (name, contact,address,status) 
            VALUES ('$name', '$contact', '$address','$status')";

            if(mysqli_query($this->conn,$sql)){
               return true;
            } 
            else
            {
                echo "ERROR: Could not able to execute $sql. " .$this->conn->error;
                return false;
            }
        }
        public function deleteSupplier($id)
        {
            $sql = "Delete from supplier WHERE supplier_id = '$id' ";

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