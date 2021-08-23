<?php include('includes/header.php')?>
<?php include('includes/sideBar.php')?>
<?php include('classes/Driver.php')?>
<?php
if (isset($_GET['delDriver'])) {
    $driver=new Driver();
    $id=$_GET['delDriver'];
    $delCheck=$driver->deleteVonder($id);
    echo "<script>location.replace('viewVendor.php');</script>";
}
if(isset($_POST['deleteAll']))
{
    $driver=new Driver();
    $delCheck=$driver->deleteVendor();
    echo "<script>location.replace('viewVendor.php');</script>";

}
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-10">
                    <h3 class="page-header">All Vendor</h3>
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
                            Vendor Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>Vendor ID</th>
                                    <th>Name</th>
                                    <th>Company Name</th>
                                    <th>Contact</th>
                                    <th>Operation</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $driver=new Driver();
                                $getAll=$driver->getAllVender();
                                if ($getAll) {
                                    while ($result=$getAll->fetch_assoc()) {
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $result['id']; ?></td>
                                            <td><?php echo $result['name']; ?></td>
                                            <td><?php echo $result['company']; ?></td>
                                            <td><?php echo $result['contact']; ?></td>
                                            <td class="center"  style="text-align: center;"><a class="btn btn-primary"  href="editVendor.php?id=<?php echo $result['id']; ?>"><i class="fa fa-edit"></i> Edit</a> <a class="btn btn-danger" onclick="return confirm('Are you sour to delete!')" href="viewVendor.php?delDriver=<?php echo $result['id']; ?>"><i class="fa fa-remove"></i> Delete</a></td>
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