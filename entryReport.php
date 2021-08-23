<?php include('includes/header.php')?>
<?php include('includes/sideBar.php')?>
<?php
ob_start();

if(isset($_POST['mReport']))
{
    $sDate=$_POST['startDate'];
    $eDate=$_POST['endDate'];
    $p=$_POST['parameter'];
    echo "<script>location.replace('overallReport.php?date=$sDate&eDate=$eDate&p=$p');</script>";
}

?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Entry Report</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Job Entry Report</b>
                        </div>
                        <div class="panel-body">
                            <form role="form" class="col-lg-12" method="post" action="">
                                 <span style="color:red; font-size:16px;">
                                  </span>
                                        <div class="row">
                                        <div class="form-group col-lg-4">
                                            <label>Start Date:</label>
                                            <input class="form-control" required type="date" name="startDate" />
                                        </div>
                                        <div class="form-group col-lg-4">
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