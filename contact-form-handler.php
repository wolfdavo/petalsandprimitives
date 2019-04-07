<?php
$errors = '';
$myemail = 'contactform@petalsandprimitives.com';//<-----This has a forwarder to petals111@att.net.
if(empty($_POST['Name'])  ||
   empty($_POST['EMail']) ||
   empty($_POST['Message']))
{
    $errors .= "\n Error: Please fill in all fields marked with an *";
}

$name = $_POST['Name'];
$email_address = $_POST['EMail'];
$phone = $_POST['Phone'];
$message = $_POST['Message'];

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail;
	$email_subject = "Contact form submission: $name";
	$email_body = "You have received a new message. ".
	" Here are the details:\n Name: $name \n Email: $email_address \n Phone: $phone \n Message: \n $message";

	$headers = "From: $myemail\n";
	$headers .= "Reply-To: $email_address";

	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: contact-form-thank-you.html');
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<?php include('./includes/head.html'); ?>
</head>

<body>

  <?php include('./includes/navbar.html'); ?>

  <div class="container-light" style="padding: 100px">
    <!-- This page is displayed only if there is some error -->
    <?php
    echo nl2br($errors);
    ?>
    <br><br>
    <a class="button" type="button" href="contact.html">Back to contact page</a>
  </div>


<?php include('./includes/footer.html'); ?>

</body>
</html>
