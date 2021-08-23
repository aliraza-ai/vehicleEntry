<?php include('includes/header.php')?>
<?php include('includes/sideBar.php')?>

<?php include('classes/Driver.php') ?>
<?php include('classes/Bus.php') ?>
<?php
$d=new Driver();
if (isset($_POST['addBus']))
{

    $date=$_POST['date'];
    $vendor=$_POST['vendor'];
    $detail=$_POST['detail'];
    $amount=$_POST['amount'];
    $status=$_POST['status'];

    $busCheck=$d->addBalance($date,$detail,$vendor,$amount,$status);


}
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Add Balance</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Insert Balance Information</b>
                        </div>
                        <div class="panel-body">
                            <form role="form" class="col-lg-7" method="post" action="addBalance.php">
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
                                    <label>Date:</label>
                                    <input class="form-control" type="date" autocomplete="off" required name="date"  />
                                </div>
                                        <div class="form-group">
                                            <label>Vendor:</label>
                                            <select class="form-control" name="vendor" required>
                                                <option value="">Choose</option>
                                                <?php
                                                $d=new Driver();
                                                $myVandor=$d->getAllVender();
                                                if($myVandor)
                                                {
                                                    while($getsVonder=$myVandor->fetch_assoc())
                                                    {

                                                ?>
                                                <option value="<?php echo $getsVonder['id']; ?>"><?php echo $getsVonder['name']; ?></option>
                                                <?php
                                                }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Detail</label>
                                            <input class="form-control" type="text"  autocomplete="off" name="detail" required  placeholder="Detail" />
                                        </div>
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input class="form-control" type="number"  autocomplete="off" name="amount" required  placeholder="Amount" />
                                </div>
                                <div class="form-group">
                                    <label>Choose Status</label>
                                    <select class="form-control" name="status">
                                        <option value="">Choose</option>
                                        <option value="1">Sending</option>
                                        <option value="2">Receiving</option>
                                    </select>
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