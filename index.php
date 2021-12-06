<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>PDF to Text Converter</title>
  <!-- <link rel="stylesheet" href="css/styles.css"> -->
  <link rel='stylesheet' type='text/css' href='css/style.php' />
</head>

<body>
  <?php
  include('html/sidenav.html');
  ?>

  <div class="wrapper">
    <div class="upload_file_title">
      Upload File
    </div>
    <div class="upload_pdf">
      <form action="php/upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="upload_file">
        <button type="submit" name="submit">UPLOAD</button>
      </form>
    </div>
    <div class="download_text">
      <?php
      // echo "<a href='index.php?download=$file.txt'>Download TEXT file</a>";
      ?>
    </div>
  </div>

  <?php
  $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  if (strpos($url, "empty")) {
    echo "<p class='error'>You did not upload any file!</p>";
  } elseif (strpos($url, "invalidsize")) {
    echo "<p class='error'>The file is too big! Maximum size is 1 GB.</p>";
  } elseif (strpos($url, "uploaderror")) {
    echo "<p class='error'>There was an error uploading your file!</p>";
  } elseif (strpos($url, "invalidtype")) {
    echo "<p class='error'>Wrong file type! Please upload pdf.</p>";
  } elseif (strpos($url, "upload")) {
    echo "<p class='success'>PDF Upload successful!</p>";
    $file = $_GET['upload'];
    $filePath = "uploads/$file.pdf";
    if (file_exists($filePath)) {
      echo shell_exec("cd java && javac -cp '.:/usr/share/java/*' ConvertText.java && java -cp '.:/usr/share/java/*' ConvertText $file.pdf");
      $textPath = "text/$file.txt";
      if (file_exists($textPath)) {
        echo "<a href='$textPath' download>Download TEXT file</a>";
      } else {
        echo "<p class = 'error'>Fail to convert \"$file.pdf\" to text file.</p>";
      }
    } else
      echo "<p class = 'error'>No such PDF with the name \"$file.pdf\" is uploded.</p>";
  }
  ?>
</body>

</html>