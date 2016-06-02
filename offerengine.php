<?php
$EmailFrom = "Customer";
$EmailTo = "dtermine@iogproducts.com";
$Subject = "Impact-O-Graph Devices OMNI-GWS Offer Customer Information";

foreach($_POST as $key => $value) {
  $post_key = $key;
  $$post_key = trim(stripslashes($value));
}

// validation
$validationOK=true;
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
  exit;
}

// prepare email body text
$Body = "";
$Body .= "Full Name: ";
$Body .= $FirstLastName;
$Body .= "\n";
$Body .= "Company Name: "; 
$Body .= $CompanyName;
$Body .= "\n";
$Body .= "Full Address: "; 
$Body .= $FullAddress;
$Body .= "\n";
$Body .= "Full Address Cont.: "; 
$Body .= $FullAddressLineTwo;
$Body .= "\n";
$Body .= "Country Name: "; 
$Body .= $CountryName;
$Body .= "\n";
$Body .= "Email Address: "; 
$Body .= $EmailAddress;
$Body .= "\n";
$Body .= "Phone Number: "; 
$Body .= $PhoneNumber;
$Body .= "\n";
$Body .= "I Currently: "; 
$Body .= $CheckUse;
$Body .= "\n";
if ($_POST['GForce']) {
    $Body .= "G Force:";
    $Body .= $GForce;
    $Body .= "\n";
}
$Body .= "Fragility: "; 
$Body .= $Fragility;
$Body .= "\n";
$Body .= "My Goods are transported by: "; 
$Body .= $Transportation;
$Body .= "\n";
if ($_POST['Weight']) {
    $Body .= "Weight:";
    $Body .= $Weight;
    $Body .= "\n";
}
if ($_POST['Kilo']) {
    $Body .= "Kilograms:";
    $Body .= $Kilo;
    $Body .= "\n";
}

// send email 
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

// redirect to success page 
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=omnigwsofferthankyou.html\">";
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