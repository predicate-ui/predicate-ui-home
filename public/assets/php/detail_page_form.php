<!DOCTYPE html>
<html>
  <head>
  	<meta charset="utf-8">
    <title>Presenter - Multipurpose Showcase</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
        
    <!--[if lt IE 9]>
      <script src="http://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="http://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
<script type="text/javascript">
function delayedRedirect(){
    window.location = "../index.html"
}
</script>

</head>
<body onLoad="setTimeout('delayedRedirect()', 5000)">
<?php
						$mail = $_POST['email_detail'];

						/*$subject = "".$_POST['subject'];*/
						$to = "test@ansonika.com"; 			/* YOUR EMAIL HERE */
						$subject = "Detail page form";
						$headers = "From: PRESENTER<noreply@yourdomain.com>";
						$message = "USER INFO\n";
						$message .= "\nName: " . $_POST['name_detail'];
						$message .= "\nEmail: " . $_POST['email_detail'];
						$message .= "\nTelephone number: " . $_POST['phone_detail'];
						$message .= "\nDate for a drive test: " . $_POST['date_detail'];
						$message .= "\nBudget: " . $_POST['budget'];
						$message .= "\nDrivers: " . $_POST['quantity'];
						$message .= "\nGender: " . $_POST['gender'];
					
						//Receive Variable
						$sentOk = mail($to,$subject,$message,$headers);
	
?>
<!-- END SEND MAIL SCRIPT -->   

<div id="success">
	<div id="msg">
    	<img src="../img/logo_success.png" alt="">
		<h3>Form Successfully Submitted.</h3>
         <span>You will be redirect back in 5 seconds.</span>
    </div>
</div>
</div>
<script src="../js/retina.min.js"></script>
</body>
</html>