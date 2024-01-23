<!DOCTYPE html>
<html lang="en">

<head>
    <title>TylerTable2.php</title>
</head>

<body>
<table border="1" width="500">
    <caption>
        HTML Table using PHP Nested Loop Structure
    </caption>
    <thead>
    <tr>
        <td colspan="8">
            Displaying Random Numbers Between 1 - 500
        </td>
    </tr>
    </thead>
    <tbody>
        <?php for($i = 0; $i < 8; ++$i){ ?>
        <tr>
            <?php for($j = 0; $j < 8; ++$j){ ?>
                <td>
                    <?php echo(rand(1, 500)); ?>
                </td>
            <?php }
        } ?>
    </tbody>
</table>
</body>
</html>