<!DOCTYPE html>
<html>
<head>
  <link href="../css/datepicker.min.css" rel="stylesheet" />
  <link href="../css/bootstrap-clockpicker.min.css" rel="stylesheet">
</head>
<body>
<?php
   
   include "koneksi.php";
 

    if($_POST['rowid']) {
        $id = $_POST['rowid'];
        $sql = "SELECT * FROM add_schedule WHERE id = $id";
        $result = $connect->query($sql);
        foreach ($result as $data) {
            ?>
        <form method="post" action ="proses_edit.php" enctype="multipart/form-data">
            <div class="form">
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                <label for="inputName">Caption</label>
                <input type="text" class="form-control" name="caption" value="<?php echo $data['caption']; ?>">
                <label for="inputEmail">Tanggal</label><br>
                <input type="text" class="form-control" data-toggle="datepicker" name="tanggal" value="<?php echo $data['tanggal']; ?>">
                <label for="inputMessage">Jam</label>
                <input type="text" class="form-control clockpicker" name="jam" value="<?php echo $data['jam']; ?>">
                <label for="inputMessage">Foto</label><br>
                <input type="file" name="gambar" value="<?php echo $data['nama']; ?>"><br><br>
                <div class="modal-footer">
                <button class="btn btn-warning">Update</button>
            </div>
        </form>
        <?php } }
    $connect->close();
?>

<script src="../js/bootstrap-clockpicker.min.js"></script>
<script src="../js/datepicker.min.js"></script>
<script type="text/javascript">
   $(document).ready(function () {
    $('[data-toggle="datepicker"]').datepicker({
    format: 'yyyy-mm-dd'
    });

    $('.clockpicker').clockpicker({
    donetext: 'Ok',
    placement: 'top'
    })
      });
</script>
</body>
</html>