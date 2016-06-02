<?php
$EmailFrom = "Customer";
$EmailTo = "dtermine@iogproducts.com";
$Subject = "Impact-O-Graph Devices Customer Information";
$Name = Trim(stripslashes($_POST['FullName'])); 
$Email = Trim(stripslashes($_POST['EmailAddress'])); 
$Company = Trim(stripslashes($_POST['CompanyName'])); 
$Phone = Trim(stripslashes($_POST['PhoneNumber'])); 
$Address = Trim(stripslashes($_POST['CustomerAddress'])); 
$Comments = Trim(stripslashes($_POST['UserComments'])); 
$Referral = Trim(stripslashes($_POST['Howdidyouhearaboutus'])); 

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
$Body .= "Company Name: ";
$Body .= $Company;
$Body .= "\n";
$Body .= "Phone Number: ";
$Body .= $Phone;
$Body .= "\n";
$Body .= "Customer Address: ";
$Body .= $Address;
$Body .= "\n";
$Body .= "User Comments: ";
$Body .= $Comments;
$Body .= "\n";
$Body .= "How Did You Hear About Us?: "; 
$Body .= $Referral;
$Body .= "\n";

// send email 
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

// redirect to success page 
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=contactthanks.php#form_content\">";
}

else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
}

/* Prepare autoresponder subject */
$respond_subject = "Thank you for your inquiry!";

//Change from address
$headers = 'From: dtermine@iogproducts.com' . "\r\n" .
    'Reply-To: ' . $email . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

/* Prepare autoresponder message */
$respond_message = "

We will be in touch with you shortly.

Regards,
Darryl L. Termine
VP Sales
www.impactograph.com
";
/* Send the message using mail() function */
mail($Email, $respond_subject, $respond_message, $headers);

?>