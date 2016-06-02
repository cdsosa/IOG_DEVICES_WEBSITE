<?php
const HOST = 'creditcardautho.db.6870551.hostedresource.com';
const USERNAME = 'creditcardautho';
const PASSWORD = 'password';
const DATABASE = 'creditcardautho';

$con = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

// Check connection
if($con->connect_errno) {
    die('Could not connect to the database using those database information. Please check for typos. If this error continues, most likely the database engine is down.');
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(preg_match('/^\w+$/i', $_POST['CompanyName'], $out) == 0) {
        die('Company name is invalid - can only contain letters numbers and spaces');
    } else {
        $CompanyName = $out[0];
    }

    if(preg_match('/^\w+$/i', $_POST['CardName'], $out) == 0) {
        die('Card name is invalid - can only containletters and spaces');
    } else {
        $CardName = $out[0];
    }

    if(preg_match('/^\w+$/i', $_POST['BillingAddress'], $out) == 0) {
        die('Billing address is invalid - can only contain letters numbers and spaces');
    } else {
        $BillingAddress = $out[0];
    }

    if(preg_match('/^\w+$/i', $_POST['CardCheck'], $out) == 0) {
        die('Card type is invalid - can only containletters and spaces');
    } else {
        $CardCheck = $out[0];
    }

    if(preg_match('/^\w+$/i', $_POST['CardNumber'], $out) == 0) {
        die('Card number is invalid - can only contain numbers and spaces');
    } else {
        $CardNumber = $out[0];
    }

    if(preg_match('/^\w+$/i', $_POST['ExpDate'], $out) == 0) {
        die('Expiration date is invalid - can only contain numbers and spaces');
    } else {
        $ExpDate = $out[0];
    }

    if(preg_match('/^\w+$/i', $_POST['CardID'], $out) == 0) {
        die('Card ID is invalid - can only containnumbers and spaces');
    } else {
        $CardID = $out[0];
    }

    if(preg_match('/^\w+$/i', $_POST['Initials'], $out) == 0) {
        die('Initials is invalid - can only containletters and spaces');
    } else {
        $Initials = $out[0];
    }

    if(preg_match('/^\w+$/i', $_POST['Date'], $out) == 0) {
        die('Date is invalid - can only containnumbers and spaces');
    } else {
        $Date = $out[0];
    }

    if(preg_match('/^\w+$/i', $_POST['Notes'], $out) == 0) {
        die('Notes is invalid - can only contain letters numbers and spaces');
    } else {
        $Notes = $out[0];
    }

    $sqlinsert = "INSERT INTO DataTable (CompanyName, CardName, BillingAddress, CardCheck, CardNumber, ExpDate, CardID, Initials, Date, Notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if($p = $con->prepare($sqlinsert)) {
        $p->bind_param('ssssiiisis', $CompanyName, $CardName, $BillingAddress, $CardCheck, $CardNumber, $ExpDate, $CardID, $Initials, $Date, $Notes);
        $p->execute();
        $p->close();
        die("New records created successfully");
    }

} else {

    // The form hasn't been submitted yet.
    // If this is on a separate page, you might want to redirect the user back to the form page.

}
    
?>