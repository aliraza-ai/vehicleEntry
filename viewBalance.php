<?php include('includes/header.php')?>
<?php include('includes/sideBar.php')?>
<?php include('classes/Driver.php')?>
<?php
if (isset($_GET['delBus'])) {
    $bus=new Driver();
    $id=$_GET['delBus'];
    $delCheck=$bus->delBalance($id);
    echo "<script>location.replace('viewBalance.php');</script>";
}

?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">All Balance</h3>
                </div>

                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Balance Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Vendor</th>
                                    <th>Detail</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Operation</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $bus=new Driver();
                                $getAll=$bus->getExpense();

                                if ($getAll) {
                                    while ($result=$getAll->fetch_assoc()) {
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?php
                                                $date = new DateTime($result['date']);
                                                echo $date->format('d-m-Y'); ?></td>
                                            <td><?php
                                                $v= $bus->getVendorById($result['vendor']);
                                                $ven=$v->fetch_assoc();
                                                echo $ven['name']; ?></td>
                                            <td><?php echo $result['detail']; ?></td>
                                            <td><?php echo $result['amount']; ?></td>
                                            <td><?php
                                                if($result['status']==1)
                                                echo "Sending";
                                                else
                                                    echo "Receiving";
                                                    ?></td>
                                            <td class="center"  style="text-align: center;"><a class="btn btn-primary"  href="editBalance.php?id=<?php echo $result['id']; ?>"><i class="fa fa-edit"></i> Edit</a> <a class="btn btn-danger" onclick="return confirm('Are you sour to delete!')" href="viewBalance.php?delBus=<?php echo $result['id']; ?>"><i class="fa fa-remove"></i> Delete</a></td>
                                        </tr>
                                    <?php }} ?>

                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->

<?php include('includes/footer.php')?>