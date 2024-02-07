<!--
Tyler O'Riley 
CSD 440 Assignment 5
02/06/2024
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>TylerCustomers.php</title>
</head>
<body>
<h1>Customer Index With Data Display</h1>
<h3>
    Using 10 customers, we will filter various information from them.
</h3>

<?php
$cust1 = array("First Name" => "Dave", "Last Name" => "Brown", "Age" => 17, "Phone Number" => "317-234-8635");
$cust2 = array("First Name" => "Sadie", "Last Name" => "Sailor", "Age" => 24, "Phone Number" => "317-234-5643");
$cust3 = array("First Name" => "Bill", "Last Name" => "Tav", "Age" => 52, "Phone Number" => "317-234-6345");
$cust4 = array("First Name" => "Trevor", "Last Name" => "Renolds", "Age" => 35, "Phone Number" => "317-234-2345");
$cust5 = array("First Name" => "Sue", "Last Name" => "Paxton", "Age" => 63, "Phone Number" => "317-234-7456");
$cust6 = array("First Name" => "Wally", "Last Name" => "Wetherly", "Age" => 45, "Phone Number" => "317-234-3654");
$cust7 = array("First Name" => "Wes", "Last Name" => "Connors", "Age" => 34, "Phone Number" => "317-234-8646");
$cust8 = array("First Name" => "Kiera", "Last Name" => "Marril", "Age" => 23, "Phone Number" => "317-234-4567");
$cust9 = array("First Name" => "Sally", "Last Name" => "Teeve", "Age" => 43, "Phone Number" => "317-234-2543");
$cust10 = array("First Name" => "Betty", "Last Name" => "Piper", "Age" => 63, "Phone Number" => "317-234-8658");
$cust11 = array("First Name" => "Mike", "Last Name" => "Riley", "Age" => 34, "Phone Number" => "317-234-0644");
$cust12 = array("First Name" => "Milly", "Last Name" => "Sever", "Age" => 44, "Phone Number" => "317-234-2745");

$customers = array($cust1, $cust2, $cust3, $cust4, $cust5, $cust6, $cust7, $cust8, $cust9, $cust10, $cust11, $cust12);

$arrlength = count($customers);
$num = 0;



echo "We currently have " . $arrlength . " total customers.";
echo "<br/><br/>";
foreach ($customers as $person) {
    $num += 1;
    echo "<b>Customer " . $num . ":</b><br/>";
    foreach ($person as $x => $x_value) {
        echo $x . ": ". $x_value;
        echo "<br/>";
    }
    echo "<br/>";
}
?>

<hr>
<h3>Last names in descending order</h3>
<br/><br/>
<?php
$last_name = array_column($customers, "Last Name", "First Name");
array_multisort($last_name, SORT_DESC);
foreach ($last_name as $x => $x_value) {
    echo $x . " " . $x_value;
    echo "<br/>";
}
echo "<br/>";
?>

<hr>
<h3>Age from youngest to oldest</h3>
<br/><br/>
<?php
$age = array_column($customers, "Age");
asort($age);
echo "youngest is" . array_shift($age) . " years old.";
echo "<br/>";
echo "oldest is " . array_pop($age) . " years old.";
echo "<br/><br/>";
?>

<hr>
<h3>Phone numbers sorted by ascending entry</h3>
<br/><br/>
<?php
$phone_number = array_column($customers, "Phone Number");
array_multisort($phone_number, $customers);
foreach ($customers as $person) {
    foreach ($person as $x => $x_value) {
        echo $x . ": " . $x_value;
        echo "<br/>";
    }
    echo "<br/>";
}
?>

<hr>
<h3>Ages greater than 60</h3>
<br/><br/>
<?php
$age2 = array_column($customers, "Age", "Last Name");
array_multisort($age2);
$over_sixty = array_slice($age2, 7);
foreach ($over_sixty as $x => $x_value) {
    echo $x . " " . $x_value;
    echo "<br/>";
}
echo "<br/>";
?>

<hr>
<h3>In Array</h3>
<b>Array Checker to find is Betty exists.</b>
<br/><br/>
<?php
$var = "Betty";
if (in_array($var, $customers)) {
    echo $var . " was a customer.";
}
else {
    echo $var . " was not a customer.";
}
?>

</body>
</html>