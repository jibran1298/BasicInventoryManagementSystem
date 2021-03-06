<?php
include('check.php');
 require('include/Connection.php');
 require('include/Supplier.php');
 require('include/Shelf.php');
 $db = new Database;
 $dbLink = $db->getConnection();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Add Product - Inventory Management System</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body id="page-top">
  <div id="wrapper">
    <?php include('sidebar.php'); ?>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <?php include('topbar.php'); ?>
        <div class="container-fluid">
          <h1 class="h3 mb-2 text-gray-800">  <i class="fa fa-plus-square"></i> Add New Products</h1>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Add New Products in Inventory Management System </h6>
            </div>
            <div class="card-body">
                <form action="action.php" method="post">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                                <label for="name">Product Name : </label>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                            <div class="col-sm">
                                <label for="barcode">Barcode #  : </label>
                                <input type="text" class="form-control" name="barcode" id="barcode" required>
                            </div>
                            <div class="col-sm">
                                <label for="quantity">Quantity  : </label>
                                <input type="number" class="form-control" name="quantity" id="quantity" required>
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                        <div class="col-sm">
                                <label for="minimum">Threshold Quantity  : </label>
                                <input type="number" class="form-control" name="minimum" id="minimum" required>
                            </div>
                            <div class="col-sm">
                                <label for="supplier">Supplier  : </label>
                                <select class="form-control" id="supplier" name="supplier" required>
                                <?php 
                                    $supplier = new Supplier($dbLink);
                                    $supplierObj = $supplier->getAllSuppliers();
                                ?>
                                </select>
                            </div>
                            <div class="col-sm">
                                <label for="shelf">Shelf #   : </label>
                                <select class="form-control" id="shelf" name="shelf" required>
                                    <?php
                                        $shelf = new Shelf($dbLink);
                                        $shelfObj = $shelf->getAllShelf();
                                    ?>
                                </select>
                            </div>
                        </div>
                        <br/>
                        <button type="submit" name="addNewProduct" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                                </span>
                                <span class="text">Add Product</span>
                            </button>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Inventory Management System 2019</span>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <?php include('footer.php'); ?>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="js/demo/datatables-demo.js"></script>
</body>
</html>
