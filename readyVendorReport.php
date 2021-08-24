<?php include('includes/header.php')?>
<?php include('includes/sideBar.php')?>
<?php include('classes/Driver.php')?>
<?php
ob_start();
$d=new Driver();
if(isset($_POST['mReport']))
{
    $sDate=$_POST['startDate'];
    $eDate=$_POST['endDate'];
    $p=$_POST['vendor'];
    $q=$_POST['vendort'];
    echo "<script>location.replace('printVendorReport.php?date=$sDate&eDate=$eDate&p=$p&q=$q');</script>";
}

?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Print Vendor Report</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Job Vendor Report</b>
                        </div>
                        <div class="panel-body">
                            <form role="form" class="col-lg-12" method="post" action="">
                                 <span style="color:red; font-size:16px;">
                                  </span>
                                        <div class="row">
                                            <div class="form-group col-lg-3">
                                                <label>Choose Vendor:</label>
                                                <select required class="form-control select2" name="vendor">
                                                    <option value="">Choose</option>
                                                    <?php
                                                    $v=$d->getAllVender();
                                                    if($v)
                                                    {
                                                        while ($vendor=$v->fetch_assoc())
                                                        {


                                                    ?>
                                                            <option value="<?php echo $vendor['id']; ?>"><?php echo $vendor['name']; ?></option>
                                                    <?php

                                                        }
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label>Choose:</label>
                                                <select required class="form-control select2" name="vendort">
                                                    <option value="1">Vendor</option>
                                                    <option value="2">Ref. Company</option>
                                                </select>
                                            </div>
                                        <div class="form-group col-lg-3">
                                            <label>Start Date:</label>
                                            <input class="form-control" required type="date" name="startDate" />
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label>End Date:</label>
                                            <input class="form-control" required type="date" name="endDate" />
                                        </div>
                                        </div>
                                        <button type="submit" name="mReport" class="btn btn-primary"><i class="fa fa-file fa-fw"></i> Report</button>
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