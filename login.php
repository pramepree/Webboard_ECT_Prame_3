<?php
session_start();
if (isset($_SESSION['id'])){
    header("location: index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <h1 style="text-align: center;" class="mt-3">Webboard PERM</h1>
        <?php include "nav.php"?>
        <br>
        <div class="row mt-4">
            <div class="col-lg-4 col-md-3 col-sm-2 col-1"></div>
            <div class="col-lg-4 col-md-6 col-sm-8 col-1">
                <?php 
                if(isset($_SESSION['error'])){
                    echo "<div class='alert alert-danger'>
                    ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง</div>";
                    unset($_SESSION['error']);
                }
            ?>
                <div class="card bg-light text-dark">
                    <div class="card-header">เข้าสู่ระบบ</div>
                    <div class="card-body">
                        <form action="verify.php" method="post">
                            <div class="form-group">
                                <label class="form-label">Login:</label>
                                <input type="text" name="login" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label class="form-label">Password:</label>
                                <div class="input-group">
                                    <input type="password" id="pwd" name="pwd" class="form-control">
                                    <span class="input-group-text" onclick="password_show_hide()">
                                        <i class="bi bi-eye" id="show_eye"></i>
                                        <i class="bi bi-eye-slash d-none" id="hide_eye"></i>
                                    </span>
                                </div>

                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <button type="submit" class="btn btn-secondary btn-sm me-2">Login</button>
                                <button type="reset" class="btn btn-danger btn-sm ms-2">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-2 col-1"></div>
        </div>
        <div align="center">
            ถ้ายังไม่ได้เป็นสมาชิก <a href="register.php">กรุณาสมัครสมาชิก</a>
        </div>
    </div>
    <script>
    function password_show_hide() {
        let x = document.getElementById("pwd");
        let show_eye = document.getElementById("show_eye");
        let hide_eye = document.getElementById("hide_eye");
        hide_eye.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            x.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    }
    </script>
</body>

</html>