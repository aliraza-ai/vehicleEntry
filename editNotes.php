<?php include('includes/header.php')?>
<?php include('includes/sideBar.php')?>
<?php include('classes/Driver.php') ?>
<?php
$id=$_GET['id'];
if (isset($_POST['addDriver']))
{
    $driver=new Driver();
    $notes=$_POST['notes'];
    $title=$_POST['title'];
    $driverCheck=$driver->updateNotes($title,$notes,$id);
}

?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Update Notes</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Update Note Information</b>
                        </div>
                        <div class="panel-body">
                            <form role="form" class="col-lg-7" action="" method="post">
                                 <span style="color:red; font-size:16px;"><?php
                                     if (isset($_POST['addDriver'])) {
                                         if($driverCheck)
                                         {
                                             echo $driverCheck;
                                         }
                                     }
                                        $driver=new Driver();

                                        $note=$driver->getNotesById($id);
                                        $notes=$note->fetch_assoc();

                                     ?>
                                  </span>
                                        <div class="form-group">
                                            <label>Note Title:</label>
                                            <input class="form-control" name="title" value="<?php echo $notes['title']; ?>" placeholder="Enter Title">
                                        </div>
                                        <div class="form-group">
                                            <label>Note Detail:</label>
                                            <textarea name="notes" id="editor"><?php echo $notes['notes']; ?></textarea>
                                        </div>

                                        <button type="submit" name="addDriver" class="btn btn-primary"><i class="fa fa-sign-out fa-fw"></i> Save</button>
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
<script src="https://cdn.tiny.cloud/1/dc6y2ieu4mw03vpbq3n6kal9stvur8kjayfoxpql21hi8tn6/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    tinymce.init({
        selector: 'textarea#editor',
        menubar: false
    });
</script>
