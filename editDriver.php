<?php include('includes/header.php')?>
<?php include('includes/sideBar.php')?>
<?php include('classes/Driver.php') ?>
<?php
if (!isset($_GET['editDriver']) || $_GET['editDriver']==NULL) {
    echo "<script>window.location='viewDriver.php'</script>";
}else
{
    $id=$_GET['editDriver'];
    if (isset($_POST['updateDriver']))
    {
        $driver=new Driver();
        $driverName=$_POST['driverName'];

        $driverNo=$_POST['driverNo'];

        $driverCheck=$driver->UpdateDriver($id,$driverName,$driverNo);
    }
}
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Update Driver</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Update Driver Information</b>
                        </div>
                        <div class="panel-body">
                            <form role="form" class="col-lg-7" action="" method="post">
                                 <span style="color:red; font-size:16px;"><?php
                                     if (isset($_POST['updateDriver'])) {
                                         if($driverCheck)
                                         {
                                             echo $driverCheck;
                                         }
                                     }
                                        $driver=new Driver();
                                        $getAll=$driver->getById($id);
                                        if ($getAll) {
                                            $result=$getAll->fetch_assoc();
                                     ?>
                                  </span>
                                        <div class="form-group">
                                            <label>Driver Name</label>
                                            <input class="form-control" required  pattern="[a-z, ,A-Z]+" title="Must Enter Last Name e.g Ali Raza" name="driverName" value="<?php echo $result['driver_name']; ?>" placeholder="Enter Driver Name" />
                                        </div>

                                        <div class="form-group">
                                            <label>Driver Mobile No:</label>
                                            <input class="form-control" name="driverNo" required type="text" value="<?php echo $result['driver_number']; ?>"    placeholder="Enter Driver Mobile No" />
                                        </div>

                                        <button type="submit" name="updateDriver" class="btn btn-primary"><i class="fa fa-sign-out fa-fw"></i> Save</button>
                                        <a href="viewDriver.php" class="btn btn-danger"><i class="fa fa-remove" aria-hidden="true"></i> Cancel</a>

                            </form>
                                    <?php }?>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->

<?php include('includes/footer.php')?>