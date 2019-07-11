<?php
    class Product
    {
        public $conn;
        public function __construct($db){
            $this->conn = $db;
        }
        public function getTotalProducts()
        {
            $sql = "SELECT product.name,product.minimum,product.product_id,product.barcode,product.quantity,product.shelf,product.supplier,
            product.added_date,shelf.number as shel,supplier.name as suppl  from product
            INNER JOIN supplier ON supplier.supplier_id = product.supplier
            INNER JOIN shelf ON shelf.id = product.shelf";
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
        public function getLowProducts()
        {
            $sql = "SELECT * from product where quantity < minimum";
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
        public function getAllProducts()
        {
            $sql = "SELECT product.name,product.minimum,product.product_id,product.barcode,product.quantity,product.shelf,product.supplier,
            product.added_date,shelf.number as shel,supplier.name as suppl  from product
            INNER JOIN supplier ON supplier.supplier_id = product.supplier
            INNER JOIN shelf ON shelf.id = product.shelf";
            if($result = mysqli_query($this->conn,$sql))
            {
                if (mysqli_num_rows($result) > 0) { 
                    while ($row = mysqli_fetch_array($result)) { 
                        $color="";
                        if($row['quantity']<$row['minimum'])
                        {
                            $color = 'class="table-danger"';
                        }
                        echo '<tr>
                        <td>'.$row['name'].'</td>
                        <td>'.$row['barcode'].'</td>
                        <td '.$color.'>'.$row['quantity'].'</td>
                        <td>'.$row['minimum'].'</td>
                        <td>'.$row['shel'].'</td>
                        <td>'.$row['suppl'].'</td>
                        <td>'.$row['added_date'].'</td>
                        <td>
                        <a  title="Edit Product" href="edit.php?product='.$row['product_id'].'" style="color:white;"  class="btn btn-info btn-circle">
                        <i class="fas fa-edit"></i>
                      </a>
                        <a title="Delete Product" href="action.php?delete='.$row['product_id'].'" style="color:white;"  class="btn btn-danger btn-circle">
                        <i class="fas fa-trash"></i>
                      </a></td>
                      </tr>';
                    }
                }
            }
        }
        public function searchByBarcode($search)
        {
            $sql = "SELECT product.name,product.minimum,product.product_id,product.barcode,product.quantity,product.shelf,product.supplier,
            product.added_date,shelf.number as shel,supplier.name as suppl  from product
            INNER JOIN supplier ON supplier.supplier_id = product.supplier
            INNER JOIN shelf ON shelf.id = product.shelf
            WHERE product.barcode = '$search'";
            if($result = mysqli_query($this->conn,$sql))
            {
                if (mysqli_num_rows($result) > 0) { 
                    while ($row = mysqli_fetch_array($result)) { 
                        $color="";
                        if($row['quantity']<$row['minimum'])
                        {
                            $color = 'class="table-danger"';
                        }
                        echo '<tr>
                        <td>'.$row['name'].'</td>
                        <td>'.$row['barcode'].'</td>
                        <td '.$color.'>'.$row['quantity'].'</td>
                        <td>'.$row['minimum'].'</td>
                        <td>'.$row['shel'].'</td>
                        <td>'.$row['suppl'].'</td>
                        <td>'.$row['added_date'].'</td>
                        <td>
                        <a  title="Edit Product" href="edit.php?product='.$row['product_id'].'" style="color:white;"  class="btn btn-info btn-circle">
                        <i class="fas fa-edit"></i>
                      </a>
                        <a title="Delete Product" href="action.php?delete='.$row['product_id'].'" style="color:white;"  class="btn btn-danger btn-circle">
                        <i class="fas fa-trash"></i>
                      </a></td>
                      </tr>';
                    }
                }
            }
        }
        public function searchByName($search)
        {
            $sql = "SELECT product.name,product.minimum,product.product_id,product.barcode,product.quantity,product.shelf,product.supplier,
            product.added_date,shelf.number as shel,supplier.name as suppl  from product
            INNER JOIN supplier ON supplier.supplier_id = product.supplier
            INNER JOIN shelf ON shelf.id = product.shelf
            WHERE product.name LIKE '%$search%'";
            if($result = mysqli_query($this->conn,$sql))
            {
                if (mysqli_num_rows($result) > 0) { 
                    while ($row = mysqli_fetch_array($result)) { 
                        $color="";
                        if($row['quantity']<$row['minimum'])
                        {
                            $color = 'class="table-danger"';
                        }
                        echo '<tr>
                        <td>'.$row['name'].'</td>
                        <td>'.$row['barcode'].'</td>
                        <td '.$color.'>'.$row['quantity'].'</td>
                        <td>'.$row['minimum'].'</td>
                        <td>'.$row['shel'].'</td>
                        <td>'.$row['suppl'].'</td>
                        <td>'.$row['added_date'].'</td>
                        <td>
                        <a  title="Edit Product" href="edit.php?product='.$row['product_id'].'" style="color:white;"  class="btn btn-info btn-circle">
                        <i class="fas fa-edit"></i>
                      </a>
                        <a title="Delete Product" href="action.php?delete='.$row['product_id'].'" style="color:white;"  class="btn btn-danger btn-circle">
                        <i class="fas fa-trash"></i>
                      </a></td>
                      </tr>';
                    }
                }
            }
        }
        public function getProduct($id)
        {
            $sql = "SELECT * from Product WHERE product_id = '$id'";
            if($result = mysqli_query($this->conn,$sql))
            {
                if (mysqli_num_rows($result) > 0) { 
                    while ($row = mysqli_fetch_array($result)) { 
                        
                        echo '<div class="row">
                        <div class="col-sm">
                        <label for="name">Product Name : </label>
                        <input type="text" class="form-control" name="name" value="'.$row['name'].'" id="name" required>
                    </div>
                    <div class="col-sm">
                        <label for="barcode">Barcode #  : </label>
                        <input type="text" class="form-control" name="barcode" value="'.$row['barcode'].'" id="barcode" required>
                    </div>
                    <div class="col-sm">
                        <label for="quantity">Quantity  : </label>
                        <input type="number" class="form-control" name="quantity" value="'.$row['quantity'].'" id="quantity" required>
                    </div>
                    <div class="col-sm">
                        <label for="minimum">Threshold Quantity  : </label>
                        <input type="number" class="form-control" name="minimum" value="'.$row['minimum'].'" id="minimum" required>
                    </div>
                    
                    </div>
                    ';
                    }
                }
            }
        }
        public function addProduct($name,$barcode,$quantity,$minimum,$supplier,$shelf)
        {
            $date = date("Y-m-d");
            $sql = "INSERT INTO product (name, barcode,quantity,minimum,supplier,shelf,added_date) 
            VALUES ('$name', '$barcode', '$quantity','$minimum','$supplier','$shelf','$date')";

            if(mysqli_query($this->conn,$sql)){
               
            } 
            else
            {
                echo "ERROR: Could not able to execute $sql. " .$this->conn->error;
            }
        }
        public function updateProduct($name,$barcode,$quantity,$minimum,$shelf,$id)
        {
            $sql = "Update product SET name = '$name', barcode = '$barcode' ,quantity = '$quantity',minimum= '$minimum' ,shelf = '$shelf' WHERE product_id='$id'";
            if(mysqli_query($this->conn,$sql)){
             
            } 
            else
            {
                echo "ERROR: Could not able to execute $sql. " .$this->conn->error;
            }
        }
        public function deleteProduct($id)
        {
            $sql = "Delete from product WHERE product_id = '$id' ";

            if(mysqli_query($this->conn,$sql)){
              
            } 
            else
            {
                echo "ERROR: Could not able to execute $sql. " .$this->conn->error;
            }
        }
        
    }
?>