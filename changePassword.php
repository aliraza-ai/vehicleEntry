<?php include('includes/header.php')?>
<?php include('includes/sideBar.php')?>
<?php
if (isset($_POST['changePassword']))
{
    $user=new User();
    $oldPassword=$_POST['Cpassword'];
    $newPassword=$_POST['Npassword'];
    $newPassword1=$_POST['NCpassword'];
    if($newPassword==$newPassword1)
    $userCheck=$user->changePassword(session::get('adminId'),$oldPassword,$newPassword);
    else echo "<script>alert('Password Not Match');</script>";
}

?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Change Password</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Change Password</b>
                        </div>
                        <div class="panel-body">
                            <form role="form" class="col-lg-7" method="post" action="changePassword.php">
                                 <span style="color:red; font-size:16px;"><?php
                                     if (isset($_POST['changePassword'])) {
                                         if($userCheck!=false)
                                         {
                                             echo "<script>alert('$userCheck');</script>";
                                             session::destroy();
                                         }else
                                         {
                                             echo "<script>alert('Current Password Not Valid..');</script>";
                                         }
                                     }
                                     ?>
                                  </span>
                                        <div class="form-group">
                                            <label>Current Password:</label>
                                            <input class="form-control"  required type="password" name="Cpassword"  minlength="5" placeholder="Enter Password" />
                                        </div>
                                        <div class="form-group">
                                            <label>New Password:</label>
                                            <input class="form-control" required type="password" id="password" name="Npassword" minlength="5" placeholder="Enter Password" />
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password:</label>
                                            <input class="form-control" required type="password" minlength="5" name="NCpassword" id="confirm_password" placeholder="Enter Password" />
                                        </div>
                                        <button type="submit" name="changePassword" class="btn btn-primary"><i class="fa fa-sign-out fa-fw"></i> Change Password</button>
                                        <button type="reset" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Reset</button>
                                    </form>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->
    <script>
        var password = document.getElementById("password")
            , confirm_password = document.getElementById("confirm_password");

        function validatePassword(){
            if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
<?php include('includes/footer.php')?>