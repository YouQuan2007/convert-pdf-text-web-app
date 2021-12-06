<?php
# Check if there is anything submitted through the form
if (isset($_POST['submit'])) {

  # Get the information of the uploaded file
  $fileName = $_FILES['upload_file']['name'];
  $fileTmpName = $_FILES['upload_file']['tmp_name'];
  $fileSize = $_FILES['upload_file']['size'];
  $fileError = $_FILES['upload_file']['error'];

  # Get the name and extension of the file
  $fileArr = explode(".", $fileName);

  # Get the extension of the file
  $fileExt = end($fileArr);

  if (empty($fileName)) {
    header("Location: ../index.php?empty");
    exit();
  } else {
    if ($fileExt == 'pdf') {
      if ($fileError == 0) {
        if ($fileSize < 1000000) {
          # max size is 1GB
          $fileNewName = uniqid('');  # create an unique id for the file to prevent overwritten by the same file name
          $fileDestination = "../uploads/$fileNewName.$fileExt";
          move_uploaded_file($fileTmpName, $fileDestination);
          header("Location: ../index.php?upload=$fileNewName");
        } else {
          header("Location: ../index.php?invalidsize");
        }
      } else {
        header("Location: ../index.php?uploaderror");
      }
    } else {
      header("Location: ../index.php?invalidtype");
    }
  }
}
