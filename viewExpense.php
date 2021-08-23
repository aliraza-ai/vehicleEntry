<?php include('includes/header.php')?>
<?php include('includes/sideBar.php')?>
<?php include('classes/Bus.php')?>
<?php
if (isset($_GET['delBus'])) {
    $bus=new Bus();
    $id=$_GET['delBus'];
    $delCheck=$bus->delExpense($id);
    echo "<script>location.replace('viewExpense.php');</script>";
}

?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">All Expenses</h3>
                </div>

                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Expense Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Drive Name</th>
                                    <th>Vehicle Plate</th>
                                    <th>Vehicle Type</th>
                                    <th>Expense Detail</th>
                                    <th>Expense Amount</th>
                                    <th>Operation</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $bus=new bus();
                                $getAll=$bus->GetMyExpense();

                                if ($getAll) {
                                    while ($result=$getAll->fetch_assoc()) {
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?php
                                                $date = new DateTime($result['date']);
                                                echo $date->format('d-m-Y'); ?></td>
                                            <td><?php echo $result['driver_name']; ?></td>
                                            <td><?php echo $result['plateNo']; ?></td>
                                            <td><?php echo $result['type']; ?></td>
                                            <td><?php echo $result['expense']; ?></td>
                                            <td><?php echo $result['amount']; ?></td>
                                            <td class="center"  style="text-align: center;"><a class="btn btn-primary"  href="editExpense.php?id=<?php echo $result['id']; ?>"><i class="fa fa-edit"></i> Edit</a> <a class="btn btn-danger" onclick="return confirm('Are you sour to delete!')" href="viewExpense.php?delBus=<?php echo $result['id']; ?>"><i class="fa fa-remove"></i> Delete</a></td>
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