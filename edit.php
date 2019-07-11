<?php
include('check.php');
 require('include/Connection.php');
 require('include/Supplier.php');
 require('include/Shelf.php');
 require('include/Product.php');
 $db = new Database;
 $dbLink = $db->getConnection();
 if(isset($_GET['product']))
 {
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
          <h1 class="h3 mb-2 text-gray-800"><i class="fa fa-edit"></i>  Edit Product</h1>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">  Update Product Info</h6>
            </div>
            <div class="card-body">
                <form action="action.php" method="post">
                   <input type="hidden" value="<?php echo $_GET['product']; ?>" name="product"/>
                    <div class="container">
                       <?php
                      
                       $product = new Product($dbLink);
                       $product->getProduct($_GET['product']);

                       ?>
                        <hr/>
                        <div class="row">
                            
                            <div class="col-sm-6">
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
                        <button type="submit" name="updateProduct" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                                </span>
                                <span class="text">Update</span>
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
<?php
 }
 else{
    header("Location: Products.php");
 }
?>