<!--
Tyler O'Riley
CSD 440
1/23/2024

PHP program to have a functions processed the produced table from a separate file
-->


<!DOCTYPE html>
<html lang="en">

<head>
    <title>TylerTable2.php</title>
</head>

<body>
<table border="1" width="500">
    <thead>
    <tr>
        <td colspan="8">
            Displaying the sum of two random numbers between 1 and 800
        </td>
    </tr>
    </thead>
    <tbody>
    <?php
        include "TylerTable3.php";
        for($i = 0; $i < 8; ++$i){ 
    ?>
        <tr>
            <?php for($j = 0; $j < 8; ++$j){ ?>
                <td>
                    <?php
                        $z = rand(1,800);
                        $x = rand(1,800);
                        echo ranSum($z, $x);
                    ?>
                </td>
            <?php }
        } ?>
    </tbody>
</table>
</body>
</html>