<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>PDF to Text Converter</title>
</head>

<body>
  <?php
    include('html/header.html');
  ?>
  <br>
  
  <form action = "upload.php" method = "POST" enctype = "multipart/form-data">
    <input type = "file" name = "upload_file">
    <button type = "submit" name = "submit">UPLOAD</button>
  </form>
  
  <br>
  <?php
    include('html/footer.html');
  ?>
</body>

</html>