<?php include('includes/header.php')?>
<?php include('includes/sideBar.php')?>
<?php include('classes/Entery.php')?>
<?php
if (isset($_GET['delEntry'])) {
    $entry=new Entery();
    $id=$_GET['delEntry'];
    $delCheck=$entry->deleteEntry($id);
    echo "<script>location.replace('viewEntry.php');</script>";
}

?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">All Entries</h3>
                </div>

                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Entry Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Driver</th>
                                    <th>Vehicle</th>
                                    <th>Vendor</th>
                                    <th>Ref. Company</th>
                                    <th>PU Location</th>
                                    <th>Do Location</th>
                                    <th>Operation</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $entry=new Entery();

                                $getAll=$entry->getAllEntry();

                                if ($getAll) {
                                    while ($result=$getAll->fetch_assoc()) {
                                        ?>
                                        <tr class="odd gradeX">

                                            <td><?php $exdate=date_create($result['InDate']);  echo date_format($exdate,"d-m-Y");?></td>
                                            <td><?php echo $entry->getDriverById($result['driver']); ?></td>
                                            <td><?php echo $entry->getDriverByVehicle($result['vehicle']); ?></td>
                                            <td><?php  echo $entry->getVendorById($result['vendor']); ?></td>
                                            <td><?php  echo $entry->getVendorById($result['refcompany']); ?></td>
                                            <td><?php echo $result['pulocation']; ?></td>
                                            <td><?php echo $result['dolocation']; ?></td>

                                            <td class="center"  style="text-align: center;"><a class="btn btn-primary"  href="editEntry.php?id=<?php echo $result['id']; ?>"><i class="fa fa-edit"></i> Edit</a> <a class="btn btn-danger" onclick="return confirm('Are you sour to delete!')" href="viewEntry.php?delEntry=<?php echo $result['id']; ?>"><i class="fa fa-remove"></i> Delete</a></td>
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