<?php include('includes/header.php')?>
<?php include('includes/sideBar.php')?>

<?php include('classes/Driver.php') ?>
<?php include('classes/Bus.php') ?>
<?php
$d=new Driver();
$id=$_GET['id'];
$getd=$d->getBalanceById($id);
$get=$getd->fetch_assoc();
if (isset($_POST['addBus']))
{

    $date=$_POST['date'];
    $vendor=$_POST['vendor'];
    $detail=$_POST['detail'];
    $amount=$_POST['amount'];
    $status=$_POST['status'];

    $busCheck=$d->editBalance($date,$detail,$id);
    echo "<meta http-equiv='refresh' content='0'>";


}
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Edit Balance</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Edit Information</b>
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
                                    <input class="form-control" type="date" value="<?php echo $get['date']; ?>" autocomplete="off"  required name="date"  />
                                </div>
                                        <div class="form-group">
                                            <label>Vendor:</label>
                                            <select class="form-control" name="vendor" required readonly>
                                                <option value="<?php echo $get['vendor']; ?>"><?php
                                                    $dr=$d->getVendorById($get['vendor']);
                                                    $drive=$dr->fetch_assoc();
                                                    echo $drive['name']; ?></option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Detail</label>
                                            <input class="form-control" type="text" value="<?php echo $get['detail']; ?>" autocomplete="off" name="detail" required  placeholder="Detail" />
                                        </div>
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input class="form-control" type="number" value="<?php echo $get['amount']; ?>"  autocomplete="off" name="amount" required  placeholder="Amount" readonly />
                                </div>
                                <div class="form-group">
                                    <label>Choose Status</label>
                                    <select class="form-control" name="status" readonly>
                                        <?php
                                        if($get['status']==1)
                                        {


                                        ?>
                                        <option value="1">Sending</option>


                                    <?php
                                        }else
                                        {

                                    ?>
                                            <option value="2">Receiving</option>                                    <?php

                                        }
                                    ?>
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