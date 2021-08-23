
<?php include('includes/header.php')?>
<?php include('includes/sideBar.php')?>

<?php include('classes/Driver.php') ?>
<?php include('classes/Bus.php') ?>
<?php include('classes/Entery.php') ?>
<?php
$id=$_GET['id'];
$myId=$id;
$e=new Entery();
$getR=$e->getEntryById($id);
$result=$getR->fetch_assoc();



if (isset($_POST['addBus']))
{

    $driver=$_POST['driver'];
    $vehicle=$_POST['vehicle'];
    $refcompany=$_POST['refcompany'];
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
    $vendor=$_POST['vendor'];
    $cash=$_POST['cash'];
    $serviceType=$_POST['serviceType'];
    $remarks=$_POST['remarks'];
    $busCheck=$e->update($driver,$vendor,$refcompany,$vehicle,$pulocation,$dolocation,$jobprice,$expenseprice,$customer,$inDate,$inTime,$outTime,$totalHours,$extraHours,$id,$cash,$serviceType,$remarks,$myId);
    echo "<meta http-equiv='refresh' content='0'>";
}
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Edit Entry</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Edit Entry Information</b>
                        </div>
                        <div class="panel-body">
                            <form role="form"  action="" method="post" >
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
                                            <label>Driver:</label>
                                            <select class="form-control select2" name="driver" required>
                                                <option value="<?php echo $result['driver']; ?>"><?php echo $e->getDriverById($result['driver']); ?></option>

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
                                        <select class="form-control" name="vendor" required readonly>

                                            <option value="<?php echo $result['vendor']; ?>"><?php echo $e->getVendorById($result['vendor']); ?></option>

                                        </select>
                                    </div>
                                        <div class="form-group">
                                            <label>PU Location:</label>
                                            <input class="form-control" autocomplete="off" value="<?php echo $result['pulocation']; ?>" required name="pulocation" placeholder="PU Location" />
                                        </div>
                                        <div class="form-group">
                                            <label>Job Price</label>
                                            <input class="form-control" type="number"  autocomplete="off" value="<?php echo $result['jobprice']; ?>" name="jobprice" required  placeholder="Job Price" readonly />
                                        </div>
                                    <div class="form-group">
                                        <label>In Date:</label>
                                        <input type="date" class="form-control" autocomplete="off" required value="<?php echo $result['InDate']; ?>" name="inDate" placeholder="PU Location" />
                                    </div>
                                    <div class="form-group">
                                        <label>In Time:</label>
                                        <input class="form-control" type="time"  autocomplete="off" value="<?php echo $result['InTime']; ?>" name="inTime" required  placeholder="Job Price" />
                                    </div>
                                    <div class="form-group">
                                        <label>Customer Name:</label>
                                        <input class="form-control" type="text"  autocomplete="off" name="customer" value="<?php echo $result['customer']; ?>" required  placeholder="Customer" />
                                    </div>
                                    <div class="form-group">
                                        <label>Total Hours:</label>
                                        <input class="form-control" type="number"  autocomplete="off" value="<?php echo $result['totalhours']; ?>" name="hours"   placeholder="Total Hours" />
                                    </div>
                                    <div class="form-group">
                                        <label>Remarks:</label>
                                        <input class="form-control" type="text"  autocomplete="off" name="remarks" value="<?php echo $result['remarks']; ?>"  placeholder="Remarks" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Vehicle:</label>
                                        <select class="form-control"  name="vehicle" required readonly>

                                            <option value="<?php echo $result['vehicle']; ?>"><?php echo $e->getDriverByVehicle($result['vehicle']); ?></option>


                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Ref. Company:</label>
                                        <select class="form-control" name="refcompany" required readonly>

                                            <option value="<?php echo $result['refcompany']; ?>"><?php echo $e->getVendorById($result['refcompany']); ?></option>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Do Location</label>
                                        <input class="form-control" autocomplete="off" required value="<?php echo $result['dolocation']; ?>" name="dolocation" placeholder="Do Location" />
                                    </div>
                                    <div class="form-group">
                                        <label>Given Price</label>
                                        <input class="form-control" type="number"  autocomplete="off" value="<?php echo $result['expenseprice']; ?>"  name="expenseprice" required  readonly placeholder="Expense Price" />
                                    </div>
                                    <div class="form-group">
                                        <label>Out Time:</label>
                                        <input class="form-control" type="time"  autocomplete="off"  value="<?php echo $result['OutTime']; ?>" name="outtime"   placeholder="Job Price" />
                                    </div>
                                    <div class="form-group">
                                        <label>Cash:</label>
                                        <input class="form-control" type="number"   autocomplete="off" name="cash" value="<?php echo $result['cash']; ?>"  placeholder="Cash" />
                                    </div>

                                    <div class="form-group">
                                        <label>Extra Hours:</label>
                                        <input class="form-control" type="number"  autocomplete="off" value="<?php echo $result['extraHours']; ?>" name="extraHours"   placeholder="Extra Hours" />
                                    </div>
                                    <div class="form-group">
                                        <label>Service Type</label>
                                        <input class="form-control" type="text"   name="serviceType" value="<?php echo $result['serviceType']; ?>" required  placeholder="Service Type" />
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