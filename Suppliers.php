<?php
include('check.php');
$message="";
if(isset($_GET['added']))
{
  $message = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Supplier Added Successfully</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>';
}
if(isset($_GET['deleted']))
{
  $message = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Supplier Deleted Successfully</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>';
}
if(isset($_GET['deleteFailed']))
{
  $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Cannot Delete Supplier , Remove All Products from this Supplier to Delete.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>';
}
if(isset($_GET['updated']))
{
    if($_GET['updated']==true)
    {
        $message = '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Supplier Updated Successfully</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>';
    }
    else{
        $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error Updating Supplier Info</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Suppliers - Inventory Management System</title>
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

         <?php echo $message; ?>
          <h1 class="h3 mb-2 text-gray-800"> <i class="fa fa-street-view"></i> Suppliers </h1>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List of Suppliers In Inventory</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>Supplier ID #</th>
                      <th>Name</th>
                      <th>Contact</th>
                      <th>Address</th>
                      <th>Status</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Supplier ID #</th>
                      <th>Name</th>
                      <th>Contact</th>
                      <th>Address</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php
                    require('include/Supplier.php');
                    require('include/Connection.php');
                    $db = new Database;
                    $dbLink = $db->getConnection();
                    $supplier = new Supplier($dbLink);
                    $supplier->displayAllSuppliers();
                  ?>
                  </tbody>
                </table>
              </div>
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
