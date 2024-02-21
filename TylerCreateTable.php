<!--
Tyler O'Riley
02/20/2024
CSD440 Assignment 8
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>TylerCreateTable.php</title>
</head>
<body>
<h1>Creating a table with MySQL and PHP</h1>
<?php
$db = new mysqli("127.0.0.1", "student1", "pass", "baseball_01");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} else {
    echo "Connected successfully<br>";
}

$sql = "CREATE TABLE movies (
    id INT(1) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(30) NOT NULL,
    runtime BIGINT(4) NOT NULL,
    year YEAR NOT NULL,
    director VARCHAR(100) NOT NULL
)";

if ($db->query($sql) === TRUE) {
    echo 'Table "movies" created';
} else {
    echo "Error creating table: " . $db->error;
}

$db->close();
?>

</body>
</html>