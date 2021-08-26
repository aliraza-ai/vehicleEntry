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
    $vehicle=$_POST['vehicle'];
    $driver=$_POST['driver'];
    $expenseDetail=$_POST['expenseDetail'];
    $amount=$_POST['amount'];

    $busCheck=$d->insertExpense($date,$vendor,$vehicle,$driver,$expenseDetail,$amount);


}
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Add Expense</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Insert Expense Information</b>
                        </div>
                        <div class="panel-body">
                            <form role="form" class="col-lg-7" method="post" action="addExpense.php">
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
                                    <input class="form-control" type="date" autocomplete="off" required name="date" placeholder="Vehicle Plate" />
                                </div>
                                <div class="form-group">
                                    <label>Vendor:</label>
                                    <select class="form-control select2" name="vendor" required>
                                        <option value="">Choose</option>
                                        <?php

                                        $myVandor1=$d->getAllVender();

                                        if($myVandor1)
                                        {

                                            while ($getsVonder1=$myVandor1->fetch_assoc())
                                            {


                                                ?>
                                                <option value="<?php echo $getsVonder1['id']; ?>"><?php echo $getsVonder1['name']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                        <div class="form-group">
                                            <label>Vehicle:</label>
                                            <select class="form-control select2" name="vehicle" required>
                                                <option value="">Choose</option>
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
                                            <select class="form-control select2" name="driver" required>
                                                <option value="">Choose</option>
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
                                            <input class="form-control" type="text"  autocomplete="off" name="expenseDetail" required  placeholder="Expense" />
                                        </div>
                                <div class="form-group">
                                    <label>Expense Amount</label>
                                    <input class="form-control" type="number"  autocomplete="off" name="amount" required  placeholder="Amount" />
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