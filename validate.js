function check(input) {
	// Check input validity based on HTML constraints.
	if (input.checkValidity()) {
		// They better have entered a custom email body! (Example of more advanced validation)
		if(input.id == "email body" && input.value == "Enter email body here!") {
			input.setCustomValidity('All you have to do is type any message of your own for the ' + input.id + ' ...');
			// This can be a one-time message if you omit update() call in html.
		} else {
			// Reset custom validity message to null if value validates.
			input.setCustomValidity('');
		}
	} else {
		// Set custom validity message (both what browser displays and what we will display) if value doesn't validate.
		input.setCustomValidity('Please enter ' + input.id + '.');
	}
	// Set the custom error <span> message (notice naming convention).
	document.getElementById(input.id + '_error').innerHTML = input.validationMessage;
}

function update(input) {
	// Reset custom validity message, which is also permanently linked to the actual validity at the time of this writing.
	input.setCustomValidity('');
}

// checkAll() Function for Submit onclick?