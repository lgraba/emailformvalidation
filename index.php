<?php

/*
 * Email Form with Validation Example by Logan Graba
 * February 20, 2015
 * Uses PHPMailer with Composer
 * 
 * Features:
 * 	HTML5, CSS3, PHP, Javascript
 * 	Real-Time Form Validation
 *		Email Attachment
 *
 * Enter your own SMTP server and account details in email.php to use.
 */

?>

<html>
	<head>
		<title>Form Validation Example by Logan Graba</title>
		<link rel="stylesheet" href="style.css" />
		<script src="validate.js"></script>
	</head>
	<body>
		<div id="container">
		
			<h1>Try sending an email to me (example@gmail.com) ...</h1>
		
			<form action="email.php" method="post" id="emailform" enctype="multipart/form-data">

				<div class="field">
					<label for="name">Your name:</label>
					<input type="text" name="name" id="name" oninput="update(this);check(this)" onblur="check(this)" required autocomplete="off"  />
					<span id="name_error"></span>
				</div>
				<div class="field">
					<label for="address">Your email address:</label>
					<input type="email" name="address" id="address" oninput="update(this);check(this)" onblur="check(this)" required autocomplete="off" />
					<span id="address_error"></span>
				</div>
				<div class="field">
					<label for="subject">Subject:</label>
					<input type="text" name="subject" id="subject" oninput="update(this);check(this)" onblur="check(this)" required autocomplete="off" />
					<span id="subject_error"></span>
				</div>
				<div class="field">
					<label for="attachment">Attachment:</label>
					<input type="file" name="attachment" id="attachment" />
				</div>
				<div class="field">
					<label for="email body">Body:</label>
					<textarea name="emailbody" id="email body" rows="5" onclick="this.innerHTML = ''" oninput="update(this);check(this)" required form="emailform">Enter email body here!</textarea>
					<span id="email body_error"></span>
				</div>
				
				<label></label>
				<input class="button" type="submit" value="Send Email" onclick="update(document.getElementById('email body'));check(document.getElementById('email body'))" />
				
			</form>

		</div>
	</body>
</html>