<?php
  if(isset($_POST['simpan'])){
    echo $_FILES['upload_file']['name'];
  }
 ?>

<form method="post" target="coba.php">
  <input type="file" name="upload_file">
  <input type="submit" name="simpan" value="simpan">
</form>
