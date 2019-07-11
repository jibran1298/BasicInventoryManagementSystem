<?php
$message="";
session_start();
require('include/Connection.php');
require('include/Admin.php');
$db = new Database;
$dbLink = $db->getConnection();

if(isset($_POST['login']))
{
    $admin = new Admin($dbLink);
    if($admin->login($_POST['username'],$_POST['password']))
    {
        $message="Logged In Successfully";
        $_SESSION["login"] = "ok";
        header('Location: Dashboard.php');
    }
    else{
      $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Invalid Username/Password</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>';
        $_SESSION["login"] = "notok";
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
  <title> Login - Inventory Management System</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
  <div class="container">
    <br/<br/<br/><br/<br/<br/>
    <div class="row justify-content-center">
    <?php echo $message; ?>
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background: url(img/bg.png)"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Inventory Management System</h1>
                  </div>
                  <form class="user" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="username" id="username" placeholder="Enter Username...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Enter Password">
                    </div>
                    <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                    <hr>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>
</body>
</html>
