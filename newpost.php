<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("location:index.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1 style="text-align: center">PRAMEPREE VORNTHAISONG</h1>
    <hr>
    ผู้ใช้ :
    <?php echo $_SESSION['username']; ?>
    <form>
        <table>
            <tr>
                <td>หมวดหมู่ :</td>
                <td><select>
                        <option value="general">เรื่องทั่วไป</option>
                        <option value="study">เรื่องเรียน</option>
                    </select></td>
            </tr>
            <tr>
                <td>หัวข้อ :</td>
                <td><textarea style="width: 60%" name="message" cols="40" rows="1"></textarea>
                    <br>
                </td>

            </tr>
            <tr>
                <td>เนิ้อหา :</td>
                <td><textarea style="width: 60%" name="message" cols="30" rows="2"></textarea>
                    <br>
                    <input type="submit" value="บันทึกข้อความ" style="text-align: center" />
                </td>
            </tr>
        </table>
    </form>
</body>

</html>