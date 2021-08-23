<?php
require 'classes/adminLogin.php';
$al=new adminlogin();
if (isset($_POST['adminLogin'])) {

    $adminUser=$_POST['adminUser'];
    $adminPass=$_POST['adminPass'];
    $loginCheck=$al->adminLogin($adminUser,$adminPass);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="./dist/css/sb-admin-2.css" rel="stylesheet">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="index.php" method="POST">
                            <span style="color:red; font-size:16px;"><?php
                                if (isset($_POST['adminLogin'])) {
                                    if($loginCheck)
                                    {
                                        echo $loginCheck;
                                    }
                                }
                                ?>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" autocomplete="off" placeholder="Username" name="adminUser" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="adminPass" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="adminLogin"  class="btn btn-lg btn-primary btn-block" value="Log in" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>