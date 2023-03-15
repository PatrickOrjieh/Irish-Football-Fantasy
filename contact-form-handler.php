<?php

$errors = '';
$myemail = 'D00251785@student.dkit.ie';// <-----Put your DkIT email address here.

// Important: Create email headers to avoid spam folder
$headers .= 'From: '.$myemail."\r\n".
    'Reply-To: '.$myemail."\r\n" .
    'X-Mailer: PHP/' . phpversion();

// let firstname = document.getElementById('firstname').value;
// let lastname = document.getElementById('lastname').value;
// let email = document.getElementById('email').value;
// let telnum = document.getElementById('telnum').value;
// let address1 = document.getElementById('address1').value;
// let city = document.getElementById('city').value;
// let county = document.getElementById('county').value;
// let country = document.getElementById('country').value;
// let postcode = document.getElementById('postcode').value;
// let feedback = document.getElementById('feedback').value;
// let phonetype = document.getElementsByName('phonetype').value;

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$telnum = $_POST['telnum'];
$address1 = $_POST['address1'];
$city = $_POST['city'];
$county = $_POST['county'];
$country = $_POST['country'];
$postcode = $_POST['postcode'];
$feedback = $_POST['feedback'];
$phonetype = $_POST['phonetype'];



if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
        $to = $myemail;
        $email_subject = "Contact form submission: $firstname";
        $email_body = "You have received a new message. ".
        " Here are the details:\n Name: $firstname $lastname \n ". 
        "Email: $email\n Phone: $telnum\n Address: $address1\n City: $city\n County: $county\n Country: $country\n Postcode: $postcode\n Feedback: $feedback\n Phone Type: $phonetype\n";

        mail($to,$email_subject,$email_body,$headers);
        //redirect to the 'thank you' page
        header('Location: contact-form-thank-you.html');
}
?>
<!DOCTYPE HTML>
<html>
<head>
        <title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>
</body>
</html>