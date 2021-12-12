<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>PDF to Text Converter</title>
  <link rel='stylesheet' type='text/css' href='css/style.php' />
  <div class="header">

    <div class="pgtitle"><h1>PDF TO TEXT CONVERTER</h1></div>
  </div>
  <div class="header">

    <div class="logo">
    <img src="css/images/ConvertPDFToWord.png" alt="logo" widht=70 height=70>
  </div>

  </div>
</head>

<body>
 
<video id="background-video" autoplay loop muted poster="css/images/banner.png">
  <source src="css/images/backgroundvideo.mp4" type="video/mp4">
</video>

<div class="Home">

  <p><b> How does this tool work? </b></p>
  <p>
  The PDF File that you have uploaded will be sent to our server. 
            Then, our server will extract all the contents inside your PDF File by using Java PDFBox Library. 
            All the contents which contains Unicode Text that have been extracted will be converted to txt File in our server.
            Lastly, the txt File will be sent back here in link for users to download it.
</p>
</div>

<div class="Home2">
            <p><b> How to use this tool? </b></p>
    <ol>
      <p>
          <li>Click the "Choose File" button to select the PDF that you would like to convert to txt file.</li>
          <li>Click the "Upload" button to upload your PDF.</li>
          <li>Please wait patiently for this tool to convert the uploaded PDF File to txt file.</li>
          <li>Click the "Download TEXT file" link generated to save/download your txt file.</li>
        </ol>
        </p>

  </div>

  </div>
  
  <div class="wrapper">

<div class="upload_file_title">
    <b> Upload File  </b>
</div>
<div class="upload_pdf">
      <form action="php/upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="upload_file">
        <button type="submit" name="submit">UPLOAD</button>
      </form>
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
        echo "<p class = 'error'>Fail to convert to text file.</p>";
      }
    } else
      echo "<p class = 'error'>No such PDF is uploded.</p>";
  }
  ?>
   </div>
</body>


<footer>
    <h3>Created by:</h3>
    <p style="margin-bottom: 2em">
        1. Loh Wan Teng (149104)<br>
        2. Yap You Quan (153484)<br>
        3. Lim Zi Qiang (153116)<br>
        4. Derek Gan Kaa Kheng (154738)<br>
    </p>
    
    <p style="margin-bottom: 2em">This project is created for the purpose of CAT201 - Integrated Software 
       Development Workshop Year 2021/2022 Semester 1 Assignment 1.</p>
   
    </footer>
</html>