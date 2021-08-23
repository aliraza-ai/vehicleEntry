<?php include('includes/header.php')?>
<?php include('includes/sideBar.php')?>
<?php include('classes/Driver.php') ?>
<?php
if (isset($_POST['add']))
{
    $driver=new Driver();
    $name=$_POST['name'];
    $company=$_POST['company'];
    $contact=$_POST['contact'];
    $driverCheck=$driver->insertVendor($name,$company,$contact);
}

?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Add Vendor</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Insert Vendor Information</b>
                        </div>
                        <div class="panel-body">
                            <form role="form" class="col-lg-7" action="addVendor.php" method="post">
                                 <span style="color:red; font-size:16px;"><?php
                                     if (isset($_POST['add'])) {
                                         if($driverCheck)
                                         {
                                             echo $driverCheck;
                                         }
                                     }
                                     ?>
                                  </span>
                                        <div class="form-group">
                                            <label>Vendor Name</label>
                                            <input class="form-control" autocomplete="off" name="name" placeholder="Enter Name" />
                                        </div>

                                        <div class="form-group">
                                            <label>Vendor Company:</label>
                                            <input class="form-control" name="company" required autocomplete="off" type="text"   placeholder="Enter Company" />
                                        </div>
                                        <div class="form-group">
                                            <label>Vendor Contact:</label>
                                            <input class="form-control" name="contact" required autocomplete="off" type="text"   placeholder="Enter Contact" />
                                        </div>

                                        <button type="submit" name="add" class="btn btn-primary"><i class="fa fa-sign-out fa-fw"></i> Save</button>
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

<?php include('includes/footer.php')?>