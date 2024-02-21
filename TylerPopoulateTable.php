<!--
Tyler O'Riley
02/20/2024
CSD440 Assignment 8
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>TylerPopulateTable.php</title>
</head>
<body>
<h1>Creating a table with MySQL and PHP</h1>
<?php
$db = new mysqli("127.0.0.1", "student1", "pass", "baseball_01");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$sql = "INSERT INTO movies (id, title, gross, year, director)
VALUES (1, 'Alien', 105, 1991, 'Ridley Scott');";
$sql .= "INSERT INTO movies (title, gross, year, director)
VALUES (2, 'Predator', 90, 1987, 'John McTiernan');";
$sql .= "INSERT INTO movies (title, gross, year, director)
VALUES (3, 'AVP', 110, 2004, 'Paul W.S. Anderson');";
$sql .= "INSERT INTO movies (title, gross, year, director)
VALUES (4, 'Prometheus', 124, 2012, 'Ridley Scott');";
$sql .= "INSERT INTO movies (title, gross, year, director)
VALUES (5, 'Alien: Covenant', 120, 2018, 'Ridley Scott')";

if ($db->multi_query($sql) === TRUE) {
    echo "New records entered successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

$db->close();
?>

</body>
</html>