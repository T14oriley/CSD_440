<!--
Tyler O'Riley
CSD 440 Assignment 10
03/05/2024
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>TylerForm.php</title>
</head>
<body>
<h1>JSON data entry to intake data and translate it to JSON</h1>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') { ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

        <h3>Final Fantasy Character Profile</h3>

        <label for="cElement">What is your elemental alignment?<br>
            <select name="cElement">
                <option value="" disabled hidden selected>Wheel of Elements</option>
                <option value="Sunday">Fire</option>
                <option value="Monday">Lightning</option>
                <option value="Tuesday">Water</option>
                <option value="Wednesday">Ice</option>
            </select>
        </label><br><br>

        <label for="cName">Character Name</label><br>
        <input type="text" id="cName" name="cName"><br><br>
        <label for="cClass">Final Fantasy Class</label><br>
        <input type="text" id="cClass" name="cClass"><br><br>
        <label for="cFaction">Faction's Name</label><br>
        <input type="text" id="cFaction" name="cFaction"><br><br>
        <label for="cGod">Deity Alignment</label><br>
        <input type="text" id="cGod" name="cGod"><br><br>
        <label for="cLvl">What level is your character?</label><br>
        <input type="number" id="cLvl" name="cLvl"><br><br>
        <label for="cGear">What is your starting gear?</label><br>
        <input type="text" id="cGear" name="cGear"><br><br>
        <label for="lBreak">What is your custom Limit Break?</label><br>
        <input type="text" id="lBreak" name="lBreak"><br><br>
    
        <input type="submit" value="Submit">
    </form>
<?php }
else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cName = $_POST['cName'];
    $cClass = $_POST['cClass'];
    $cFaction = $_POST['cFaction'];
    $cGod = $_POST['cGod'];
    $cLvl = $_POST['cLvl'];
    $cGear = $_POST['cGear'];
    $lBreak = $_POST['lBreak'];
    $cElement = $_POST['cElement'];

    $user = array("Character Name"=>$cName, "Character Class"=>$cClass, "Faction"=>$cFaction, "Deity"=>$cGod,
        "Level"=>$cLvl, "Gear"=>$cGear,"Limit Break"=>$lBreak, "Element"=>$cElement);


    try {
        $jsonData = json_encode($user, JSON_PRETTY_PRINT, JSON_THROW_ON_ERROR);
        echo "<pre>" . $jsonData . "</pre>";
    } catch (JsonException $e) {
        $e->getMessage();
        $e->getCode();
    }
}
else {
    die("Unable to process request");
} ?>
</body>
</html>