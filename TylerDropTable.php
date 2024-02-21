<!--
Tyler O'Riley
02/20/2024
CSD440 Assignment 8
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>TylerDropTable.php</title>
</head>
<body>
<h1>Creating a table with MySQL and PHP</h1>
<?php
$db = new mysqli("127.0.0.1", "student1", "pass", "baseball_01");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$sql = "DROP TABLE IF EXISTS movies";

if ($db->query($sql) === TRUE) {
    echo 'Table "movies" dropped successfully.';
} else {
    echo "Error dropping table: " . $db->error;
}

$db->close();
?>

</body>
</html>