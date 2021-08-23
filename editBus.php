<?php include('includes/header.php')?>
<?php include('includes/sideBar.php')?>
<?php include('classes/Driver.php') ?>
<?php include('classes/Bus.php') ?>
<?php
if (!isset($_GET['editBus']) || $_GET['editBus']==NULL) {
    echo "<script>window.location='viewBus.php'</script>";
}else
{
    $id=$_GET['editBus'];
    if (isset($_POST['updateBus']))
    {
        $bus=new Bus();
        $busPlateNo=$_POST['busNoPlate'];
        $type=$_POST['type'];
        $busCheck=$bus->updateBus($busPlateNo,$type,$id);
    }
}
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Update Bus</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Update Bus Information</b>
                        </div>
                        <div class="panel-body">
                            <form role="form" class="col-lg-7" method="post" action="">
                                <span style="color:red; font-size:16px;"><?php
                                    if (isset($_POST['updateBus'])) {
                                        if($busCheck)
                                        {
                                            echo $busCheck;
                                        }

                                    }
                                        $bus=new Bus();
                                        $getAll=$bus->getById($id);
                                        if ($getAll) {
                                            $result=$getAll->fetch_assoc();
                                    ?>
                                  </span>
                                <div class="form-group">
                                    <label>Vehicle Plate:</label>
                                    <input class="form-control" value="<?php echo $result['plateNo']; ?>" autocomplete="off" required name="busNoPlate" placeholder="Vehicle Plate" />
                                </div>
                                <div class="form-group">
                                    <label>Vehicle Type</label>
                                    <input class="form-control" type="text" value="<?php echo $result['type']; ?>"  autocomplete="off" name="type" required  placeholder="Type" />
                                </div>



                                <button type="submit" class="btn btn-primary" name="updateBus"><i class="fa fa-sign-out fa-fw"></i> Save</button>
                                <a href="viewBus.php" class="btn btn-danger"><i class="fa fa-remove" aria-hidden="true"></i> Cancel</a>
                            </form>
                            <?php } ?>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                     <!-- /.panel -->
                 </div>
             </div>
        </div>
<!-- /#page-wrapper -->

<?php include('includes/footer.php')?>