<?php
$EmailFrom = "Mailing List Recipient";
$EmailTo = "dtermine@iogproducts.com";
$Subject = "Impact-O-Graph Devices, LLC Mailing List";
$Name = Trim(stripslashes($_POST['YourFullname'])); 
if (filter_var($_POST['Youremail'], FILTER_VALIDATE_EMAIL)) {
    $email  = $_POST['Youremail'];
} else $validationOK = false;

// validation
$validationOK=true;
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
  exit;
}

// prepare email body text
$Body = "";
$Body .= "Full Name: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "Email Address: "; 
$Body .= $Email;
$Body .= "\n";


// send email 
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

// redirect to success page 
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=subscribethanks.php#subscribe\">";
}
else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
}

/* Prepare autoresponder subject */
$respond_subject = "Thank you for your joining our e-mail list!";

//Change from address
$headers = 'From: dtermine@iogproducts.com' . "\r\n" .
    'Reply-To: ' . $email . "\r\n" .
    'X-Mailer: PHP/' . phpversion();


/* Prepare autoresponder message */
$respond_message = "

We will e-mail you with all our latest news.

Regards,
Darryl L. Termine
VP Sales
www.impactograph.com

";
/* Send the message using mail() function */
mail($Email, $respond_subject, $respond_message, $headers);


?>