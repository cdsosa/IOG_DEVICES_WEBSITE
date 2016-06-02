<?php
$connect = mysql_connect(“creditcardautho.db.6870551.hostedresource.com”, “creditcardautho”, “IOGdevices2015!”); if (!connect) { die('Connection Failed: ' . mysql_error()); { mysql_select_db(“creditcardautho”, $connect); 

//Fetching from your database table.
$query = "SELECT * FROM $usertable";
$result = mysql_query($query);

if ($result) {
    while($row = mysql_fetch_array($result)) {
        $name = $row["$yourfield"];
        echo "Name $name<br>";
    }
}


$user_info = “INSERT INTO table_name (CompanyName, CardName, BillingAddress, CardCheck, CardNumber, ExpDate, CardID, Initials, Date) VALUES ('$_POST[CompanyName]', '$_POST[CardName]', '$_POST[BillingAddress]', '$_POST[CardCheck]', '$_POST[CardNumber]', '$_POST[ExpDate]', '$_POST[CardID]'  )”; if (!mysql_query($user_info, $connect)) { die('Error: ' . mysql_error()); }
echo “Your information was added to the database.”;
mysql_close($connect);





?>