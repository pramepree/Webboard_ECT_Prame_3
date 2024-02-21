<?php
    $m = $_GET["months"];
    $y = $_GET["Year"];
    $d = $_GET["Day"];
    $feb = ($y + 543) % 4;
    if($feb == 3){
        $feb = 29;
    }
    else{
        $feb = 28;
    }

    if($m == 1 || $m == 3 || $m == 5 || $m == 7 || $m == 8 || $m == 10 || $m == 12){
        $m = 31;
    }
    elseif($m == 2){
        $m = $feb;
    }
    else{
        $m = 30;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        เดือน 
    </div>
    <div>
        <table style="border: 2px black;">
            <tr><th>จ.</th><th>อ.</th><th>พ.</th><th>พฤ.</th><th>ศ.</th><th>ส.</th><th>อา.</th></tr>
            <tr>
            <?php
                for($i = 1;$i <= $m;$i++){

                    if($i == 8){
                        echo "<tr>";
                    }
                    if($i == 15){
                        echo "</tr>";
                        echo "<tr>";
                    }
                    if($i == 22){
                        echo "</tr>";
                        echo "<tr>";
                    }
                    if($i == 29){
                        echo "</tr>";
                    }
                    echo "<td>$i</td>";
                }
            ?>
            </tr>
        </table>
    </div>
</body>
</html>