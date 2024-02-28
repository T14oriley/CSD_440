<!--
Tyler O'Riley
CSD 440 Assignment 9
02/27/2024
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>TylerIndex.php</title>
    <style>
        body {text-align: center;}
        table {width: 70%;margin:1 auto 1 auto;border-radius: 5px;}
        td {width:33%;border:2px blue;border-radius:15px;}
        td:hover {background-color:white;border:1px solid #33C8CC;box-shadow: 0 4px 8px 0 #33C8CC;border-radius:15px;}
        a {text-decoration:none;color:black;display:block;padding:10px 0 10px 0;}
    </style>
</head>
<body>
<?php
echo "<h1>My Top Movies and Their Data</h1><br>";

echo "<table>";
echo "<caption><h3>Database Queries</h3></caption>";
echo "<tr>";
echo "<td><a href='TylerCreateTable.php'>Create Table</a>";
echo "<td><a href='TylerDropTable.php'>Drop Table</a>";
echo "<td><a href='TylerPopulateTable.php'>Populate Table</a>";
echo "</tr>";
echo "</table><br>";

echo "<table>";
echo "<caption><h3>Database Queries</h3></caption>";
echo "<tr>";
echo "<td><a href='TylerQueryTable.php'>Top 20 Highest-Grossing Films</a>";
echo "<td><a href='TylerQuery.php'>Search</a>";
echo "<td><a href='TylerForms.php'>Add a Record</a>";
echo "</tr>";
echo "</table><br>";
?>
</body>
</html>