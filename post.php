<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
</head>

<body>
    <h1 style="text-align: center">PRAMEPREE VORNTHAISONG</h1>
    <hr>
    
    <center>
        ต้องการดูกระทู้หมายเลข
        <?php echo $_GET['id'];
        $i = $_GET['id'];
        if (($i % 2) == 0)
            echo "<br> เป็นกระทู้หมายเลขคู่";
        else
            echo "<br> เป็นกระทู้หมายเลขคี่";
        ?>
    </center>
    <br>
    <table style="border:2px solid black; width:40%" align="center">
        <tr>
            <td colspan="2" style="background-color: #6cd2fe;">แสดงความคิดเห็น</td>
        </tr>
        <tr>
            <td><textarea style="width: 99%" name="message" cols="40" rows="10"></textarea>
                <br>
                <center>
                    <input type="submit" value="ส่งข้อความ">
            </td>
            </center>
        </tr>
    </table>
    <br>
    <center>
        <a href="index.php">กลับไปหน้าหลัก</a>
    </center>
</body>

</html>