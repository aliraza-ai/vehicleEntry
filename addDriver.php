<?php include('includes/header.php')?>
<?php include('includes/sideBar.php')?>
<?php include('classes/Driver.php') ?>
<?php
if (isset($_POST['addDriver']))
{
    $driver=new Driver();
    $driverName=$_POST['driverName'];
    $driverNo=$_POST['driverNo'];
    $driverCheck=$driver->insertdriver($driverName,$driverNo);
}

?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Add Driver</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Insert Driver Information</b>
                        </div>
                        <div class="panel-body">
                            <form role="form" class="col-lg-7" action="addDriver.php" method="post">
                                 <span style="color:red; font-size:16px;"><?php
                                     if (isset($_POST['addDriver'])) {
                                         if($driverCheck)
                                         {
                                             echo $driverCheck;
                                         }
                                     }
                                     ?>
                                  </span>
                                        <div class="form-group">
                                            <label>Driver Name</label>
                                            <input class="form-control"   pattern="[a-z, ,A-Z]+" title="First name and last Must like as Ali Raza" autocomplete="off" name="driverName" placeholder="Enter Driver Name" />
                                        </div>

                                        <div class="form-group">
                                            <label>Driver Mobile No:</label>
                                            <input class="form-control" name="driverNo" required autocomplete="off" type="text"   placeholder="Enter Driver Mobile No" />
                                        </div>

                                        <button type="submit" name="addDriver" class="btn btn-primary"><i class="fa fa-sign-out fa-fw"></i> Save</button>
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