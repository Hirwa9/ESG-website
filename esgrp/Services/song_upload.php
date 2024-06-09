<?php
if ($_POST && isset($_FILES["song_file"])) {
  $target_dir = "../../Songs/NewUploads/";
  $target_file = $target_dir . basename($_FILES["song_file"]["name"]);
  $uploadOk = 1;
  $fileExtension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  // Check if file already exists
  if (file_exists($target_file)) {
    echo "File already exists.<br><br>";
    $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["song_file"]["size"] > 3000000) {
    echo "Your file is too large (maximum size is 3 MB).<br><br>";
    $uploadOk = 0;
  }

  // Allow only pdf files
  if ($fileExtension != "pdf") {
    echo "Only pdf files are allowed.<br><br>";
    $uploadOk = 0;
  }

  // If all checks pass, move the uploaded file to the target directory
  if ($uploadOk == 1 && move_uploaded_file($_FILES["song_file"]["tmp_name"], $target_file)) {
    // Capture form data
    $songCategory = $_POST["songCategory"];
    $otherSongCategory = $_POST["otherSongCategory"];
    $ownerName = $_POST["owner"];

    // Display success message
    echo '<!DOCTYPE html>
    <html>
    
    <head>
      <title>Sussesive upload</title>
    
      <link rel="icon" type="image/x-icon" href="../../Pics/ESG_favicon1.ico">
      <link rel="stylesheet" type="text/css" href="../../styles/chms.css?v=1.1039">
      <meta charset="utf-8">
      <meta name="viewport" content="width= device-width, initial-scale=1.0">
      <meta name="author" content="Hirwa Willy">
      <meta name="keywords" content="HTML , CSS">
    
        
        <!-- online -->
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        
        <!-- offline -->
    
        <!-- <link rel="stylesheet" href="bootstrap5/css/bootstrap.min.css">
        <link rel="stylesheet" href="fontawesome6-2-0/css/all.css">
        <script src="bootstrap5/js/bootstrap.min.js"></script> -->
        <!-- <script src="bootstrap5/js/bootstrap.bundle.min.js"></script>
        <script src="bootstrap5/js/bootstrap.bundle.min.js.map"></script> -->
        <!-- <script src="jq/jquery-3.7.1.js"></script> -->
    </head>
    <body>
        <main class="col-sm-10 col-lg-8 container">
            <img src="../../Pics/EasternSingersLogo.png" alt="" class="w-5rem mx-auto mb-5">
            <div class="text-dark upload-status-content">
                <h1 class="display-4"><span class="fa fa-cloud-upload"></span> Song uploaded successfully</h1>
                <p class="mb-5 pt-4 fs-5 text-wrap">
                    Thank you for the contribution! The song named <span class="text-myBlue fw-bold">"' . htmlspecialchars(basename($_FILES["song_file"]["name"])) . '"</span> has been uploaded, and we are currently processing it for inclusion in our collection.
                </p>
                <p class="back text-center" style="font-size: 1.9rem;">
                    Back to <a href="CHM_Songs">songs</a>
                </p>
            </div>
        </main>
        <script src="../../MyScripts.js?v=1.1039"></script>
        <script src="notifySongUpload.js?v=1.1039"></script>
    </body>
    </html>';


    // Mail the response
    // $to = "easternsingersg@gmail.com";
    // $subject = "A song was uploaded to ESG server.\r\n";

    // $songOwnerM = $_POST['ownerEmail'];
    // $from = $_POST['owner'];
    // $song = htmlspecialchars(basename($_FILES["song_file"]["name"]));

    // $Bodi = "<html><body>";
    // $Bodi .= "<h1 style='background-color: brown; padding: 1rem; border-radius: 10px; border-bottom: 4px solid white; color: white'><u>Song uploaded</u></h1>";
    // $Bodi .= "<div style='background-color: #0e407c; color: whitesmoke; border-radius: 5px; padding: .5rem'><h2 style='color: goldenrod'>" . $song . "</h2>";
    // $Bodi .= "<p><b>24 hours to upload</b> and communicate if necessary.<br><br>Email  : <u style='color: brown;'>" . $songOwnerM . "</u></p></div>";
    // $Bodi .= "</body></html>";

    // $headers = 'MIME-Version: 1.0' . "\r\n";
    // $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // // Create email headers
    // $headers .= 'From: ' . $from . "\r\n" . 'Reply-To: ' . $songOwnerM . "\r\n";
    // mail($to, $subject, $Bodi, $headers) or die();
  } else {
    echo "Sorry, there was an error uploading your file. You can try again.";
    // $to1 = "easternsingersg@gmail.com";
    // $subject1 = "Song upload failure (ESG).\r\n";
    // $song1 = "Some one failed to uploaded a song file to ESG server.\r\n Check for errors.\r\n";
    // mail($to1, $subject1, $song1) or die();
  }
}

?>