<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "creditcardautho";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO DataTable (CompanyName, CardName, BillingAddress, CardCheck, CardNumber, ExpDate, CardID, Initials, Date, Notes)
VALUES ('$_POST[topic]', '$_POST[topic]', '$_POST[topic]')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>