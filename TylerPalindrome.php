<!--
Tyler O'Riley
Module 4 Assignment
01/30/2024
Program to test for palindromes
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>TylerPalindrome.php</title>
</head>
<body>
<h1>Module 4: PHP Strings</h1>
<h3>This program tests strings to identify palindromes.</h3>
<?php
    $string1 = "racecar";
    $string2 = "civiv";
    $string3 = "radar";
    $string4 = "refer";
    $string5 = "level";
    $string6 = "apple";

    function palindrome($str) {     //palindrome function to compare each string
        $rev = strrev($str);        //$rev is assigned the reverse version of the string

        echo "String: " . $str . "<br />";
        echo "Reversed: " . $rev . "<br />";
        echo "Is this a palindrome?: ";     //displayed dialogue to visually compare strings before final output

        if ($str == $rev) {
            return "Yes<br />";
        }
        else {
            return "No<br />";          //if else clause to id if $str and $rev equal the same string
        }
    }

    echo palindrome($string1) . "<br />";
    echo palindrome($string2) . "<br />";
    echo palindrome($string3) . "<br />";
    echo palindrome($string4) . "<br />";
    echo palindrome($string5) . "<br />";
    echo palindrome($string6) . "<br />";
?>
</body>
</html>