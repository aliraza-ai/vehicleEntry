
<?php include('includes/header.php')?>
<?php include('includes/sideBar.php')?>

<?php include('classes/Driver.php') ?>
<?php include('classes/Bus.php') ?>
<?php include('classes/Entery.php') ?>
<?php
if (isset($_POST['addBus']))
{
    $e=new Entery();

    $driver=$_POST['driver'];
    $vendor=$_POST['vendor'];
    $refcompany=$_POST['refcompany'];
    $vehicle=$_POST['vehicle'];
    $pulocation=$_POST['pulocation'];
    $dolocation=$_POST['dolocation'];
    $jobprice=$_POST['jobprice'];
    $expenseprice=$_POST['expenseprice'];
    $customer=$_POST['customer'];
    $inDate=$_POST['inDate'];
    $inTime=$_POST['inTime'];
    $outTime=$_POST['outtime'];
    $totalHours=$_POST['hours'];
    $extraHours=$_POST['extraHours'];
    $cash=$_POST['cash'];
    $serviceType=$_POST['serviceType'];
    $remarks=$_POST['remarks'];
    if($refcompany==$vendor)
    {
        echo "<script>alert('Vendor and Ref. Company will not be Same;');</script>";
        echo "<script>location.replace(\"addEntry.php\");</script>";
        return;
    }
    $busCheck=$e->addJob($driver,$vendor,$refcompany,$vehicle,$pulocation,$dolocation,$jobprice,$expenseprice,$customer,$inDate,$inTime,$outTime,$totalHours,$extraHours,$cash,$serviceType,$remarks);
}

date_default_timezone_set("Asia/Riyadh");
$today=date("d-m-Y");

?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Add Entry </h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Insert Entry Information</b>
                        </div>
                        <div class="panel-body">
                            <form role="form"  method="post" action="addEntry.php">
                                <span style="color:red; font-size:16px;"><?php
                                    if (isset($_POST['addBus'])) {
                                        if($busCheck)
                                        {
                                            echo $busCheck;
                                        }
                                    }
                                    ?>
                                  </span>
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Captain:</label>
                                            <select class="form-control select2" name="driver" required>
                                                <option value="">Choose</option>
                                                <?php
                                                $d=new Driver();
                                                $myVandor=$d->getByAll();
                                                if($myVandor)
                                                {
                                                    while( $getsVonder=$myVandor->fetch_assoc())
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
                                            <label>PU Location:</label>
                                            <input class="form-control" required name="pulocation" placeholder="PU Location" />
                                        </div>
                                        <div class="form-group">
                                            <label>Cost</label>
                                            <input class="form-control" type="number" value="0"  autocomplete="off" name="jobprice" required  placeholder="Job Price" />
                                        </div>
                                    <div class="form-group">
                                        <label>Date:</label>
                                        <input type="date" class="form-control" autocomplete="off" required value="<?php echo date('Y-m-d'); ?>" name="inDate" placeholder="PU Location" />
                                    </div>
                                    <div class="form-group">
                                        <label>In Time:</label>
                                        <input class="form-control" type="time"  value="<?php echo date("h:i"); ?>" autocomplete="off" name="inTime"  required  placeholder="Job Price" />
                                    </div>
                                    <div class="form-group">
                                        <label>Customer Name:</label>
                                        <input class="form-control" type="text"  autocomplete="off" name="customer" required  placeholder="Customer" />
                                    </div>
                                    <div class="form-group">
                                        <label>Total Hours:</label>
                                        <input class="form-control" type="number"  autocomplete="off" name="hours" value="0"   placeholder="Total Hours" />
                                    </div>
                                    <div class="form-group">
                                        <label>Remarks:</label>
                                        <input class="form-control" type="text"  autocomplete="off" name="remarks"  placeholder="Remarks" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Vehicle:</label>
                                        <select class="form-control select2" name="vehicle" required>
                                            <option value="">Choose</option>
                                            <?php

                                            $myVandor1=$d->getAllVehicle();

                                            if($myVandor1)
                                            {

                                            while ($getsVonder1=$myVandor1->fetch_assoc())
                                            {


                                            ?>
                                            <option value="<?php echo $getsVonder1['id']; ?>"><?php echo "Plate NO:".$getsVonder1['plateNo']." Type:".$getsVonder1['type']; ?></option>
                                            <?php
                                            }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Ref. Company:</label>
                                        <select class="form-control select2" name="refcompany" required>
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
                                        <label>Do Location</label>
                                        <input class="form-control"  required name="dolocation" placeholder="Do Location" />
                                    </div>
                                    <div class="form-group">
                                        <label>Job Price</label>
                                        <input class="form-control" type="number" value="0"  autocomplete="off" name="expenseprice" required  placeholder="Expense Price" />
                                    </div>
                                    <div class="form-group">
                                        <label>Service Type</label>
                                        <input class="form-control" type="text"   name="serviceType" required  placeholder="Service Type" />
                                    </div>

                                    <div class="form-group">
                                        <label>Out Time:</label>
                                        <input class="form-control" type="time"  autocomplete="off" name="outtime"    placeholder="Job Price" />
                                    </div>
                                    <div class="form-group">
                                        <label>Cash:</label>
                                        <input class="form-control" type="number"  autocomplete="off" name="cash"   placeholder="Cash" value="0" />
                                    </div>
                                    <div class="form-group">
                                        <label>Extra Hours:</label>
                                        <input class="form-control" type="number"  autocomplete="off" name="extraHours" value="0"   placeholder="Extra Hours" />
                                    </div>



                                </div>
                                <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="addBus"><i class="fa fa-sign-out fa-fw"></i> Save</button>
                                <button type="reset" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Reset</button>
                                </div>
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