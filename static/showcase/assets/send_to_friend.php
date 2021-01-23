<?php

if(!$_POST) exit;

// Email verification, do not edit.
function isEmail($friendemail_suggest) {
	return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$friendemail_suggest));
}

if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

$name_suggest    = $_POST['name_suggest'];
$friendname_suggest    = $_POST['friendname_suggest'];
$friendemail_suggest   = $_POST['friendemail_suggest'];
$message_suggest = $_POST['message_suggest'];
$verify_suggest   = $_POST['verify_suggest'];

if(trim($name_suggest) == '') {
	echo '<div class="alert alert-warning"><i class=" icon-attention"></i> You must enter your Name.</div>';
	exit();
} else if(trim($friendname_suggest ) == '') {
	echo '<div class="alert alert-warning"><i class=" icon-attention"></i> You must enter your Friend Name</div>';
	exit();
} else if(trim($friendemail_suggest ) == '') {
	echo '<div class="alert alert-warning"><i class=" icon-attention"></i> Please enter a valid email address.</div>';
	exit();
} else if(!isEmail($friendemail_suggest)) {
	echo '<div class="alert alert-warning"><i class=" icon-attention"></i> You have enter an invalid e-mail address, try again.</div>';
	exit();
	
} else if(trim($message_suggest) == '') {
	echo '<div class="alert alert-warning"><i class=" icon-attention"></i> Please enter your message.</div>';
	exit();
} else if(!isset($verify_suggest) || trim($verify_suggest) == '') {
	echo '<div class="alert alert-warning"><i class=" icon-attention"></i> Please enter the verification number.</div>';
	exit();
} else if(trim($verify_suggest) != '4') {
	echo '<div class="alert alert-warning"><i class=" icon-attention"></i> The verification number you entered is incorrect.</div>';
	exit();
}

if(get_magic_quotes_gpc()) {
	$message_suggest= stripslashes($message_suggest);
}


//$address = "HERE your site email address";
$address = "test@ansonika.com";


// Below the subject of the email
$e_subject = 'You\'ve been contacted by you friend ' . $name_suggest . '.';

// You can change this if you feel that you need to.
$e_body = "You have been contacted by $name_suggest that wont to suggest this site http://www.ansonika.com" . PHP_EOL . PHP_EOL;
$e_content = "\"$message_suggest\"" . PHP_EOL . PHP_EOL;

$msg = wordwrap( $e_body . $e_content );

$headers = "From: $address" . PHP_EOL;
$headers .= "Reply-To: $friendemail_suggest" . PHP_EOL;
$headers .= "MIME-Version: 1.0" . PHP_EOL;
$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

if(mail($friendemail_suggest, $e_subject, $msg, $headers)) {

	// Success message
	echo "<div class='alert alert-success'>";
	echo "<strong >Email Sent.</strong><br>";
	echo "Thank you <strong>$name_suggest</strong>, this site was suggested to $friendname_suggest .";
	echo "</div>";

} else {

	echo 'ERROR!';

}