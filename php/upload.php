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
            $fileNameNew = uniqid('', true) . "." . "$fileExt";  # create an unique id for the file to prevent overwritten by the same file name
            $fileDestination = 'uploads/' . $fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
            header("Location: ../index.php?uploadsuccess");
            exit();
          } else {
            header("Location: ../index.php?invalidsize");
            exit();
          }
        } else {
          header("Location: ../index.php?uploaderror");
          exit();
        }
      } else {
        header("Location: ../index.php?invalidtype");
        exit();
      }
    }
  }
?>