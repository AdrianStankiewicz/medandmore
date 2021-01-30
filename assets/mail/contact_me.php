<?php
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$to = 'stona1@gmail.com'; // Add your email address in between the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Formularz kontaktowy ze strony MedAndMore:  $name";
$email_body = "Wiadomość z formularza kontaktowego.\n\n"."Poniżej zawarte są szczegóły wiadomości:\n\nImię i nazwisko: $name\n\nEmail: $email_address\n\nTelefon: $phone\n\nWiadomość:\n$message";
$headers = "From: as@esluch.pl\n"; // This is the email address the generated message will be from. We recommend using something like noWiadomośćourdomain.com.
$headers .= "Reply-To: $email_address";   
mail($to,$email_subject,$email_body,$headers);
return true;         
?>
