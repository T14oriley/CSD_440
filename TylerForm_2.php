<!--
Tyler O'Riley
CSD 440 Assignment 9
02/27/2024
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>TylerForms.php</title>
    <style>
        body {text-align: center;}
        table {text-align:center;width:70%;margin:0 auto 0 auto;}
        .data:hover {background-color:#33C8CC;}
        td:hover {background-color:green;border:2px solid #33C8CC;box-shadow: 0 4px 8px 0 #33C8CC;}
        a {padding:5px;color: black; text-decoration: none;border:1px solid black;border-radius:15px;background-color:#33C8CC;}
        a:hover {background-color: green;}
        .card {border: 1px solid black;text-align:center;width:70%;margin:0 auto 0 auto;padding:10px;}
        input[type=text], input[type=number] {width:40%;}
    </style>
</head>
<body>
<?php

$db = new mysqli("127.0.0.1", "student1", "pass", "baseball_01");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') { ?>
<h3>Form to add more movies to existing list</h3>
<div class="card">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <label for="id">Rank</label><br>
        <input type="number" id="id" name="id"><br><br>
        <label for="title">Movie Title</label><br>
        <input type="text" id="title" name="title"><br><br>
        <label for="runtime">Film Length</label><br>
        <label for="runtime">$</label>
        <input type="number" id="runtime" name="runtime"><br><br>
        <label for="year">Year of Premiere</label><br>
        <input type="number" id="year" name="year" min="1900" max="2022"><br><br>
        <label for="director">Director of Film</label><br>
        <input type="text" id="director" name="director"><br><br>
        <input type="submit" value="Submit">
    </form>
</div>
<?php }
else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rank = $_POST['id'];
    $title = $_POST['title'];
    $runtime = $_POST['runtime'];
    $year = $_POST['year'];
    $director = $_POST['director'];

    $rank_value = (int)$rank;
    $runtime_value = (int)$runtime;
    $year_value = (int)$year;

    if (($rank_value != 0) && ($runtime_value != 0) && ($year_value != 0)) {
        $sql = "INSERT INTO movies (id, title, runtime, year, director)
        VALUES ($rank_value, '$title', $runtime_value, $year_value, '$director');";
    }
    else {
        echo "<footer><a href='TylerIndex.php'>Back to Index Page</a></footer><br><br><br>";
        die("Request Failed<br>" . $db->error);
    }

    if ($db->multi_query($sql) === TRUE) {
        echo "Record Added<br><br>";
        $display = "SELECT * FROM movies WHERE id = $rank LIMIT 1";
        $result = $db->query($display);
        if ($result->num_rows > 0) { ?>
        <table border="1">
            <tr>
                <th>Personal Rank</th>
                <th>Movie Title</th>
                <th>Runtime</th>
                <th>Year Released</th>
                <th>Director</th>
            </tr>
            <?php }
            while($row = $result->fetch_assoc()) { ?>
                <tr class="data">
                    <td><?php echo "{$row['id']}"; ?></td>
                    <td><?php echo "{$row['title']}"; ?></td>
                    <td>$<?php echo "{$row['runtime']}"; ?></td>
                    <td><?php echo "{$row['year']}"; ?></td>
                    <td><?php echo "{$row['director']}"; ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php } else {
        echo "<footer><a href='TylerIndex.php'>Back to Index Page</a></footer><br><br><br>";
        die("Unable to process request" . $sql . "<br>" . $db->error);
    }
}

?>
<footer>
    <br><br><br><br><br>
    <a href="TylerIndex.php">Return Home</a>
</footer>
</body>
</html>