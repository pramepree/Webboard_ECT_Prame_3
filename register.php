<?php
session_start();
if (isset($_SESSION["id"])) {
header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
</head>

<body>
    <h1 style="text-align: center">PRAMEPREE VORNTHAISONG</h1>
    <hr>
    <h1 style="text-align: center;">สมัครสมาขิก</h1>
    <hr>
    <table style="border: 2px solid black; width: 40%" align="center">
        <tr>
            <td colspan="2" style="background-color: #6cd2fe;">กรอกข้อมูล</td>
        </tr>
        <tr>
            <td>ชื่อบัญชี :</td>
            <td><input type="text" name="newuser" size="40" required></td>
        </tr>
        <tr>
            <td>รหัสผ่าน :</td>
            <td><input type="password" name="newpwd" size="40" required></td>
        </tr>
        <tr>
            <td>ชื่อ-นามสกุล :</td>
            <td><input type="text" name="newname" size="40" required></td>
        </tr>
        <tr>
            <td rowspan="3">เพศ :</td>
            <td><input type="radio" name="man">ชาย</td>
        </tr>
        <tr>
            <td><input type="radio" name="woman">หญิง</td>
        </tr>
        <tr>
            <td><input type="radio" name="LGBTQ+">อื่นๆ</td>
        </tr>
        <tr>
            <td>อีเมล :</td>
            <td><input type="email" name="email" size="40" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;"><input type="submit" value="สมัครสมาขิก"></td>
        </tr>
    </table>
    <div style="text-align: center;"><a href="index.html">กลับไปหน้าหลัก</a></div>
</body>

</html>