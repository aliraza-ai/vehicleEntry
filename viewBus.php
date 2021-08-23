<?php include('includes/header.php')?>
<?php include('includes/sideBar.php')?>
<?php include('classes/Bus.php')?>
<?php
if (isset($_GET['delBus'])) {
    $bus=new Bus();
    $id=$_GET['delBus'];
    $delCheck=$bus->deleteBus($id);
    echo "<script>location.replace('viewBus.php');</script>";
}
if(isset($_POST['deleteAll']))
{
    $bus=new Bus();
    $delCheck=$bus->deleteAll();
    echo "<script>location.replace('viewBus.php');</script>";
}
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-10">
                    <h3 class="page-header">All Vehicle</h3>
                </div>
            <div class="col-lg-2" style="margin-top: 40px;">
                <form action="" method="POST"><button class="btn btn-danger" onclick="return confirm('Are you sour to delete!')" name="deleteAll" ><i class="fa fa-remove"></i> Delete All</button></form>
            </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Vehicle Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>Vehicle ID</th>
                                    <th>Plate</th>
                                    <th>Type</th>
                                    <th>Operation</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $bus=new bus();
                                $getAll=$bus->getByAll();

                                if ($getAll) {
                                    while ($result=$getAll->fetch_assoc()) {
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $result['id']; ?></td>
                                            <td><?php echo $result['plateNo']; ?></td>
                                            <td><?php echo $result['type']; ?></td>
                                            <td class="center"  style="text-align: center;"><a class="btn btn-primary"  href="editBus.php?editBus=<?php echo $result['id']; ?>"><i class="fa fa-edit"></i> Edit</a> <a class="btn btn-danger" onclick="return confirm('Are you sour to delete!')" href="viewBus.php?delBus=<?php echo $result['id']; ?>"><i class="fa fa-remove"></i> Delete</a></td>
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