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
    <title>NewPost</title>
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>
    <div class="container">
        <h1 style="text-align: center;" class="mt-3">WERPERM</h1>
        <?php
        include "nav.php";
        ?>
        <div class="row mt-4">
            <div class="col-lg-6 col-md-2 col-sm-1"></div>
            <div class="col-lg-6 col-md-8 col-sm-10">
                <div class="card border-info">
                    <div class="card-body bg-info text-white">ตั้งกระทู้ใหม่</div>
                    <div class="card-body">
                        <form action="newpost_save.php" method="post">
                            <div class="row">
                                <label class="col-lg-3 col-form-label"> หมวดหมู่</label>
                                <div class="col-lg-9"></div>
                                <select name="category" class="form-select">
                                    <?php
                                    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=ytf8", "root");
                                    $sql = "SELECT * FROM category";
                                    foreach ($conn->query($sql) as $row) {
                                        echo "<option value=$row[id]>$row[name]</option>";
                                    }
                                    $conn  = null;
                                    ?>
                                </select>
                                <div class="row mt-3">
                                    <label class="col-lg-3 col-form-label">หัวข้อ</label>
                                    <div class="col-lg-9">
                                        <input name="topic" class="form-control" type="text" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row" mt-3>
                                <label class="col-lg-3 col-form-label ">เนื้อหา</label>
                                <div class="col-lg-9"><textarea name="comment" class="form-control" cols="30" rows="8" required></textarea>
                                </div>
                            </div>
                            <div class="row mt3">
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-info btn-sm text-white me-2">
                                        <i class="bi bi-caret-right-square">บันทึกข้อความ</i>
                                    </button>
                                    <button type="reset" class="bnt btn-danger btn-sm"><i class="bi bi-x-square"></i>ยกเลิก</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-2 col-sm-1"></div>
        </div>
    </div><br>
</body>


</html>