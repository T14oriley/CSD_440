<!--
Tyler O'Riley
CSD440 Assignment 6
02/06/2024

Code referenced from linked Repo
https://github.com/rsongcuan/csd-440/blob/main/Mod6/RyanMyInteger.php
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>TylerMyInteger.php</title>
    <?php
    class TylerMyInteger {
        public $num;

        function __construct($num) {
            $this->num = $num;
        }

        function isEven(int $var) {
            $var = $this->num;
            if ($var % 2 == 0) {
                return $var . " is Even";
            }
            else {
                return $var . " is not Even";
            }
        }

        function isOdd(int $var) {
            $var = $this->num;
            if ($var % 2 != 0) {
                return $var . " is Odd";
            }
            else {
                return $var . " is not Odd";
            }
        }

        function isPrime(int $var) {
            $var = $this->num;
            if ($var == 1)
                return $var . " is not Prime";
            for ($i = 2; $i <= $var/2; $i++) {
                if ($var % $i == 0)
                    return $var . " is not Prime";
            }
            return $var . " is Prime";
        }


        function set_num($num) {
            $this->num = $num;
        }

        function get_num() {
            return $this->num;
        }
    }
    ?>
</head>
<body>
<h1>Module 6: PHP Objects</h1>
<?php
$newLine = "<br/>";
$twoLine = "<br/><br/>";

$instance1 = new TylerMyInteger(1);
$instance2 = new TylerMyInteger(2);

$instance1->set_num(11);
$instance2->set_num(42);

echo "The first integer is " . $instance1->get_num();
echo $newLine;
echo "The second integer is " . $instance2->get_num();
echo $twoLine;

echo $instance1->isEven($instance1->get_num());
echo $newLine;
echo $instance2->isEven($instance2->get_num());
echo $twoLine;

echo $instance1->isOdd($instance1->get_num());
echo $newLine;
echo $instance2->isOdd($instance2->get_num());
echo $twoLine;

echo $instance1->isPrime($instance1->get_num());
echo $newLine;
echo $instance2->isPrime($instance2->get_num());
?>

</body>
</html>