<?php include('includes/header.php')?>
<?php include('includes/sideBar.php')?>

<?php include('classes/Driver.php') ?>
<?php include('classes/Bus.php') ?>
<?php
if (isset($_POST['addBus']))
{
    $bus=new Bus();
    $busPlateNo=$_POST['busNoPlate'];
    $type=$_POST['type'];
    $busCheck=$bus->insertBus($busPlateNo,$type);
}
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Add Vehicle</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Insert Vehicle Information</b>
                        </div>
                        <div class="panel-body">
                            <form role="form" class="col-lg-7" method="post" action="addBus.php">
                                <span style="color:red; font-size:16px;"><?php
                                    if (isset($_POST['addBus'])) {
                                        if($busCheck)
                                        {
                                            echo $busCheck;
                                        }
                                    }
                                    ?>
                                  </span>

                                        <div class="form-group">
                                            <label>Vehicle Plate:</label>
                                            <input class="form-control" autocomplete="off" required name="busNoPlate" placeholder="Vehicle Plate" />
                                        </div>
                                        <div class="form-group">
                                            <label>Vehicle Type</label>
                                            <input class="form-control" type="text"  autocomplete="off" name="type" required  placeholder="Type" />
                                        </div>


                                <button type="submit" class="btn btn-primary" name="addBus"><i class="fa fa-sign-out fa-fw"></i> Save</button>
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