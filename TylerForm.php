<!--
Tyler O'Riley
CSD 440 Assignment 7
02/13/2024

Code structure based on linked repository
https://github.com/rsongcuan/csd-440/tree/main/Mod7
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>TylerForm.php</title>
</head>
<body>
<h1>Input and Display Form</h1>
<?php
//Variables for posted inputs
$cname = $_POST['cname'];
$class = $_POST['class'];
$level = $_POST['level'];
$email = $_POST['email'];
$day = $_POST['day'];
$num = $_POST['num'];
$consent = $_POST['consent'];

//Consent to provide data
$tried = ($_POST['tried'] == 'yes');

//entered holds posted results if results are not empty
if ($tried) {
    $entered = (!empty($cname) && !empty($class) && !empty($level) && !empty($email) && !empty($day) &&
        !empty($num) && !empty($consent));
}

//all variables are set to a blank entry
$cnameTest = $classTest = $emailTest = $numTest = "";
$cnameErr = $classErr = $emailErr = $numErr = "";

//if consent and results return the same
if ($tried && $entered) {
    $cnameTest = test_input($cname);
    //preg_match verifies the only white space and letters are used after test_input strips variables
    if (!preg_match("/^[a-zA-Z-' ]*$/",$cnameTest)) {
        $cnameErr = "Only letters and white space allowed in 'Character Name' field<br>";
    }
    $classTest = test_input($class);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$classTest)) {
        $classErr = "Only letters and white space allowed in 'Class' field<br>";
    }
    $emailTest = test_input($email);
    if (!filter_var($emailTest, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format<br>";
    }
    if (is_int($num) == 1) {
        $numErr = "Only integers without decimals allowed in the 'Favorite Number' field<br>";
    }
}

//function runs data to remove white space from beginning end/remove special characters/remove quotes
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function daySelected($selection) {
    global $weekDay;
    if ($weekDay == $selection) {
        echo "selected";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') { ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <h3>User Profile</h3>
        <p>*All fields required</p>
        <label for="cname">First Name</label><br>
        <input type="text" id="cname" name="cname" value="<?php echo $cname; ?>">
        <span>&nbsp;<?php echo $cnameErr?></span><br><br>
        <label for="class">Last Name</label><br>
        <input type="text" id="class" name="class">
        <span>&nbsp;<?php echo $classErr?></span><br><br>
        <label for="level">Date of Birth</label><br>
        <input type="date" id="level" name="level"><br><br>
        <label for="email">Email Address</label><br> 
        <input type="text" id="email" name="email">
        <span>&nbsp;<?php echo $emailErr?></span><br><br>
        <label for="day">What day of the week are you completing this form?<br>
            <select name="day">
                <option value="" disabled hidden selected>Choose Day of the Week</option>
                <option value="Sunday" <?php daySelected("Sunday");?> >Sunday</option>
                <option value="Monday" <?php daySelected("Monday");?> >Monday</option>
                <option value="Tuesday" <?php daySelected("Tuesday");?> >Tuesday</option>
                <option value="Wednesday" <?php daySelected("Wednesday");?> >Wednesday</option>
                <option value="Thursday" <?php daySelected("Thursday");?> >Thursday</option>
                <option value="Friday" <?php daySelected("Friday");?> >Friday</option>
                <option value="Saturday" <?php daySelected("Saturday");?> >Saturday</option>
            </select>
        </label><br><br>
        <label for="num">Enter your favorite number (no decimals)</label><br>
        <input type="number" id="num" name="num">
        <span>&nbsp;<?php echo $numErr?></span><br><br>
        <input type="checkbox" id="consent" name="consent" value="active"
            <?php if ($consent == "active") {echo "checked";} ?> >
        <label for="consent">I consent to the use of my personal data entered above</label><br><br>
        <input type="hidden" name="tried" value="yes">
        <input type="submit" value="<?php echo $tried ? "Continue" : "Submit"; ?>">
    </form>
<?php }
else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = "";
    $error = $cnameErr . $classErr . $emailErr . $emailErr . $numErr;
    if (!$entered) {
        echo "All fields must be completed for the form to be submitted.";
        echo "<br>";
        echo "Please go back, correct the errors, and try again.";
    }
    else if ($error != "") {
        echo $error;
        echo "Please go back, correct the errors, and try again.";
    }
    else {
        echo "<h3>Your Input</h3>";
        echo "Character name: " . $cname . " " . $class;
        echo "<br>";
        echo "Character Level: " . $level;
        echo "<br>";
        echo "Email Address: " . $email;
        echo "<br>";
        echo "The elements align to this day: " . $day;
        echo "<br>";
        echo "Favorite Number: " . $num;
    }
}
else {
    die("Unable to process request");
} ?>
</body>
</html>