<?php

// Require Vendor Package autoload prepared using composer
require_once 'vendor/autoload.php';

// New PHPMailer Object
$m = new PHPMailer;

// Set mail server type as SMTP
$m->isSMTP();
$m->SMTPAuth = true;
// $m->SMTPDebug = 2; // Show error messages but not error codes

// Authentication details for SMTP connection to mail server (gmail)
// Enter your own details as appropriate
$m->Host = 'smtp.gmail.com';
$m->Username = 'example@gmail.com';
$m->Password = 'password';
$m->SMTPSecure = 'ssl';
$m->Port = 465;

// Email header details
$m->From = $_POST["address"];
$m->FromName = $_POST["name"];
$m->addReplyTo($_POST["address"], 'Reply Address');
$m->addAddress('example@gmail.com', 'Example Name');
// $m->addCC('exampleCC@gmail.com', 'Example CC Name');
// $m->addBCC('exampleBCC@gmail.com', 'Example BCC Name');

$m->isHTML(false);

// Handle the attachment
$attachmentname = basename($_FILES["attachment"]["name"]);
$attachmentpath = "uploads/" . $attachmentname;
$tmp_path = $_FILES["attachment"]["tmp_name"];
if(is_uploaded_file($tmp_path)) {
	if(!copy($tmp_path, $attachmentpath)) {
		echo "Error copying the uploaded file!";
	}
}

// Email content details
$m->addAttachment($attachmentpath, $attachmentname);
$m->Subject = $_POST["subject"];
$m->Body = $_POST["emailbody"];
// $m->AltBody = 'This is the alternate body of an email from PHPMailer! Should be included if any of the standard email body includes HTML.';

// Actually send the email
if($m->send()) {
	echo "Email Sent<br />";
	echo '<a href="' . $_SERVER['HTTP_REFERER'] . '">Back</a>';
} else {
	echo $m->ErrorInfo;
}

?>