<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <title style="text-align: center; font-size: 54px;">WEB PERM WEB PERM</title>
</head>

<body>
    <div class="container-lg">
        <h1 style="text-align: center;font-size: 54px;" class="mt-3">WEB PERM ECT</h1>
        <nav class="navbar navbar-expand-lg" style="background-color:#d3d3d3;">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><i class="bi bi-house-door-fill"></i> Home</a>
                <ul class="navbar-nav">
                    <?php if (!isset($_SESSION['id'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="login.php"><i class="bi bi-pencil-square"></i> เข้าสู่ระบบ</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item dropdown">
                            <a class="btn btn-outline-secondary btn-sm dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle"></i> <?php echo $_SESSION['username']; ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="logout.php"><i class="bi bi-power"></i> ออกจากระบบ</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>

        <div class="mt-3 d-flex justify-content-between">
            <div>

                <label>หมวดหมู่</label>
                <span class="dropdown">
                    <button class="btn btn-light dropdown-toggle btn-sm" type="button" id="Button2" data-bs-toggle="dropdown" aria-expanded="false">--ทั้งหมด--
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="Button2">
                        <li><a href="#" class="dropdown-item">ทั้งหมด</a></li>
                        <?php
                        $conn = new PDO("mysql:host=localhost;dbname=webboard;
                        charset=utf8", "root", "");
                        $sql = "SELECT * FROM category";
                        foreach ($conn->query($sql) as $row) {
                            echo "<li><a class=dropdown-item href=#>$row[name]</a></li>";
                        }
                        $conn = null;
                        ?>
                    </ul>
                </span>

            </div>
            <container>
                <hr>
                <hr>
            </container>
            <?php if (isset($_SESSION['id'])) { ?>
                <div><a href="newpost.php" class="btn btn-success btn-sm"><i class="bi bi-plus-circle">
                        </i> สร้างกระทู้ใหม่</a></div>
            <?php } ?>
        </div>
        <table class="table table-striped">
            <?php
            $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
            $sql = "SELECT category.name, post.title, post.id, user.login, post.post_date FROM post
            INNER JOIN user ON (post.user_id = user.id)
            INNER JOIN category ON (post.cat_id = category.id) ORDER BY post.post_date DESC";
            $result = $conn->query($sql);
            while ($row = $result->fetch()) {
                echo "<tr><td>[ $row[0] ] <a href=\"post.php?id=$row[2]\" style=\"text-decoration:none\">$row[1]</a><br>$row[3] - $row[4]</td></tr>";
                
            }
            $conn = null;
            ?>
        </table>


        <!-- <table class="table table-striped mt-4 ">
        <?php
        for ($i = 1; $i <= 10; $i++) {
            echo "<tr><td class = 'd-flex justify-content-between'><a href = post.php?id=$i style = text-decoration:none>กระทู้ $i</a>";
            if (isset($_SESSION['id']) && $_SESSION['role'] == 'a') {
                echo "&nbsp;&nbsp;<a href=delete.php?id=$i
                class = 'btn btn-danger btn-sm'><i class='bi bi-trash'></i></a>";
            }
            echo "</td></tr>";
        }
        ?>
    </table> -->
    </div>
</body>

</html>