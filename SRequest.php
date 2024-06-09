<?php

// $cat = $_POST['sCategory'];
$name = $_POST['sName'];
$sCat = $_POST['sCategory'];

$mailheader = "ESG song request!\r\n";
$recipient = 'easternsingersg@gmail.com';

$bodi = "<html><body>";
$bodi .= "<h2 style='background-color: brown; padding: 1rem; border-radius: 10px; border-bottom: 4px solid white; color: white'>Song Request</h2>";
$bodi .= "<div><h3>Song Category: <u>".$sCat."</u></h3>";
$bodi .= "<p>Please check out on <span style='color: goldenrod'>".$name."</span> for me.</p><br>";
$bodi .= "<p style='background-color: #0e407c; color: whitesmoke; font-weight: 600; padding: .5rem; border-radius: 5px'>It is only 24 hrs max to respond. Check the list to see all you need to upload including this one.<br> Must not disappoint anyone.</p></div>";
$bodi .= "</body></html>";

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From ESG fan ☺' . "\r\n";

mail($recipient, $mailheader, $bodi, $headers) or die();

echo '<!DOCTYPE html>
<html>
<head>
	<title>Message delivered</title>
    
	<link rel="icon" type="image/x-icon" href="Pics/ESG_favicon.ico">
	<link rel="stylesheet" type="text/css" href="ESG.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width= device-width, initial-scale=1.0">
	<meta name="author" content="Hirwa Willy">
	<meta name="keywords" content="HTML , CSS">	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
	
	<!-- <script src="bootstrap/js/jquery-3.6.1.js"></script> -->
	<script src="bootstrap/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="bootstrap/fontawesome/js/all.min.js">

	<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/bootstrap.min.css.map">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
	<!-- <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet"> -->

</head>
<body class="bg-myBlue">
    <div class="offset-sm-1 col-sm-10 offset-md-3 col-md-6 p-3" id="Thankcmnt">
		<h2>Sent <span class="fa fa-check"></span></h2>
			<p class="pt-4">
				We have received your request for <span class="text-goldR">"'.$name.'"</span>, and we are sorry for the inconvenience !!<br>Please check it out in few hours!
			</p>
            <h4>Thank you and God be with you!</h4><br><br><br>
            <p class="back text-center">Back to <a href="CHM_Songs">Songs</a></p>
        </div>
		<div class="container-fluid text-center" id="BRAND-e">ESG</div>
	</body>
</html>';




?>