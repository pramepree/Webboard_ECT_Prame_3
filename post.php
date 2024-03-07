<?php
session_start();
if (isset($_GET['id'])) {
    $post_id = $_GET['id'];
    // ดำเนินการต่อตามความต้องการ
}
?>
<!-- <?php
        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
        $sql = "SELECT * FROM post WHERE id = :post_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $conn = null;
        ?> -->
<!-- <?php

        function showPost()
        {
            $conn1 = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
            // $sql = "SELECT post.title,inner join on (post.user on (post.user_id=user.id) WHERE id = $_GET[id]";
            $sql3 = "select post.title,post.content,post.post_data,user.login from post inner join user on (post.user_id=user.id) where post.id=$_GET[id]";
            $result2 = $conn1->query($sql3);
            while ($row = $result2->fetch()) {
                echo "<div class='card border-primary'>";
                echo "<div class='card-header bg-primary text-white'>$row[0]</div>";
                echo "<div class='card-body'></div>";
                echo "</div>";
            }
            $conn1 = null;
        }

        ?> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <title>Post</title>
</head>

<body>
    <h1 style="text-align: center">PRAMEPREE VORNTHAISONG</h1>
    <hr>
    <div class=" container">
        <?php include "nav.php" ?>
        <!-- <div class="row mt-4">
            <div class="col-lg-3 col-md-2 col-sm-1"></div>
            <div class="col-lg-6 col-md-8 col-sm-10">
                <div class="card border-primary mt-3">
                    <div class="card-header bg-primary text-white"><?php echo $result['title'] . "<br>"; ?></div>
                    <div class="card-body">
                        <?php echo $result['content']; ?>
                        <?php echo "<br><br>" ?>
                        <?php
                        $conn = new PDO("mysql:host=localhost;dbname=webboard;
                        charset=utf8", "root", "");
                        $sql1 = "SELECT * FROM user";
                        foreach ($conn->query($sql1) as $row) {
                            echo "$row[name] - ";
                        }
                        $conn = null;
                        ?><?php echo $result['post_date']; ?>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- <div class="row mt-4">
            <div class="col-lg-3 col-md-2 col-sm-1"></div>
            <div class="col-lg-6 col-md-8 col-sm-10">
                <div class="card border-primary mt-3">
                    <div class="card-header bg-primary text-white"><?php echo $result['title'] . "<br>"; ?></div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div> -->
        <br>

        <?php
        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
        $sql = "select post.title,post.content,post.post_date,user.login
            from post inner join user on
            (post.user_id=user.id) where post.id=$_GET[id]";
        $result = $conn->query($sql);
        while ($row = $result->fetch()) {
            echo "<div class='card border-primary'>";
            echo "<div class='card-header bg-primary text-white'>$row[0]</div>";
            echo "<div class='card-body'>$row[1]<br><br>$row[2] - $row[3]</div>";
            echo "</div>";
        }
        $conn = null;
        ?>

        <br>


        <?php
        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
        $sql = "select comment.content,comment.post_date,user.login
            from comment inner join user on
            (comment.user_id=user.id) where comment.post_id=$_GET[id]";
        $i = 1;
        $result = $conn->query($sql);
        while ($row = $result->fetch()) {
            echo "<div class='card border-info'>";
            echo "<div class='card-header bg-info text-white'>ความคิดเห็นที่ $i</div>";
            echo "<div class='card-body'>$row[0]<br><br>$row[2] - $row[1]</div>";
            echo "</div>";
            echo "<br>";
            $i = $i + 1;
        }
        $conn = null;
        ?>
        <?php
        if (isset($_SESSION['id'])) {


        ?>
            <div class="row mt-4">
                <div class="col-lg-3 col-md-2 col-sm-1"></div>
                <div class="col-lg-6 col-md-8 col-sm-10">
                    <div class="card border-success mt-3">
                        <div class="card-header bg-success text-white">แสดงความเห็น</div>
                        <div class="card-body">
                            <form action="post_save.php" method="post">
                                <input type="hidden" name="post_id" value="<?= $_GET['id']; ?>">
                                <div class="row md-3 justify-content-center">
                                    <div class="col-lg-10">
                                        <textarea name="comment" rows="8" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-12 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success btn-sm text-white">
                                            <i class="bi bi-box-arrow-up-right"> ส่งข้อความ</i>
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm ms-2">
                                            <i class="bi bi-x-square"> ยกเลิก</i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <br>
    <center>
        <a href="index.php">กลับไปหน้าหลัก</a>
    </center>

</body>

</html>