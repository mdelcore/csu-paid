<?php

// Email address verification
function isEmail($email) {
	return filter_var($email, FILTER_VALIDATE_EMAIL);
}

if($_POST) {

    // Enter the email where you want to receive the message
    $emailTo = 'nmdelcore@gmail.com';

    $firstName = addslashes(trim($_POST['form-first-name']));
    $lastName = addcslashes(trim($_POST['form-last-name']));
    $clientEmail = addslashes(trim($_POST['form-email']));
    $phone = addslashes(trim($_POST['form-phone']));

    $array = array('emailMessage' => '', 'subjectMessage' => '', 'messageMessage' => '');

    if(!isEmail($clientEmail)) {
        $array['emailMessage'] = 'Invalid email!';
    }
    
    if(isEmail($clientEmail) && $phone != '') {
        // Send email
		$headers = "From: " . $clientEmail . " <" . $clientEmail . ">" . "\r\n" . "Reply-To: " . $clientEmail;
		mail($emailTo, $subject . " (marco)", $message, $headers);
    }

    echo json_encode($array);

}

?>
