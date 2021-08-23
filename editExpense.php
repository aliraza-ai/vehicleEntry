<?php include('includes/header.php')?>
<?php include('includes/sideBar.php')?>

<?php include('classes/Driver.php') ?>
<?php include('classes/Bus.php') ?>
<?php
$d=new Driver();
$id=$_GET['id'];
$exp=$d->getExpenseById($id);
$expense=$exp->fetch_assoc();
if (isset($_POST['addBus']))
{

    $date=$_POST['date'];
    $vehicle=$_POST['vehicle'];
    $driver=$_POST['driver'];
    $expenseDetail=$_POST['expenseDetail'];
    $amount=$_POST['amount'];

    $busCheck=$d->updateExpense($date,$vehicle,$driver,$expenseDetail,$amount,$id);
    echo "<meta http-equiv='refresh' content='0'>";


}
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Edit Expense</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Edit Expense Information</b>
                        </div>
                        <div class="panel-body">
                            <form role="form" class="col-lg-7" method="post" action="">
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
                                    <input class="form-control" type="date" autocomplete="off" value="<?php echo $expense['date']; ?>" required name="date" placeholder="Vehicle Plate" />
                                </div>
                                        <div class="form-group">
                                            <label>Vehicle:</label>
                                            <select class="form-control" name="vehicle" required>
                                                <option value="<?php echo $expense['vehicle']; ?>"><?php
                                                    $g=$d->getByVId($expense['vehicle']);
                                                    $ge=$g->fetch_assoc();
                                                    echo "No: ".$ge['plateNo']. " Type:".$ge['type']; ?></option>

                                                <option value="">------------</option>
                                                <?php
                                                $d=new Driver();
                                                $myVandor=$d->getAllVehicle();
                                                if($myVandor)
                                                {
                                                    while($getsVonder=$myVandor->fetch_assoc())
                                                    {

                                                ?>
                                                <option value="<?php echo $getsVonder['id']; ?>"><?php echo "Type:".$getsVonder['type']." Plate NO:".$getsVonder['plateNo']; ?></option>
                                                <?php
                                                }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Driver:</label>
                                            <select class="form-control" name="driver" required>
                                                <option value="<?php echo $expense['driver']; ?>"><?php
                                                    $g=$d->getById($expense['driver']);
                                                    $ge=$g->fetch_assoc();

                                                    echo $ge['driver_name']; ?></option>
                                                <option value="">----------</option>
                                                <?php
                                                $d=new Driver();
                                                $myVandor=$d->getByAll();
                                                if($myVandor)
                                                {
                                                    while($getsVonder=$myVandor->fetch_assoc())
                                                    {



                                                        ?>
                                                        <option value="<?php echo $getsVonder['driver_id']; ?>"><?php echo $getsVonder['driver_name']; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Expense Detail</label>
                                            <input class="form-control" type="text" value="<?php echo $expense['expense']; ?>"  autocomplete="off" name="expenseDetail" required  placeholder="Expense" />
                                        </div>
                                <div class="form-group">
                                    <label>Expense Amount</label>
                                    <input class="form-control" type="number" value="<?php echo $expense['amount']; ?>"  autocomplete="off" name="amount" required  placeholder="Amount" />
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