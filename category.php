<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <title>Webboard</title>
    <script>
        function myFunction() {
            var confirmation = confirm("Hello World!\n\nHave a nice day!\n\nPress OK for Button 1 or Cancel for Button 2");

            if (confirmation) {
                alert("You clicked Button 1!");
            } else {
                alert("You clicked Button 2!");
            }
        }
    </script>
    </script>

    <style>
        table {
            border-spacing: 0;
            width: 60%;
        }

        th,
        td {
            text-align: center;
            padding: 16px;
        }

        tr:nth-child(odd) {
            background-color: #f2f2f2
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 style="text-align: center;" class="mt-3">Webboard PERM - Manage Category</h1>
        <?php include "nav.php"; ?>
        <br>
        <center>
            <div class="container">

                <?php
                $conn = new PDO("mysql:host=localhost;dbname=webboard;
                        charset=utf8", "root", "");
                $sql = "SELECT * FROM category";
                echo "<table>
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อหมวดหมู่</th>
                    <th>จัดการ</th>
                </tr>";

                foreach ($conn->query($sql) as $row) {
                    echo "<tr>
                        <td>$row[id]</td>
                        <td>$row[name]</td>
                        <td>
                            <div class='me-2 align-self-center'>
                                <a href='#' class='btn btn-warning'><i class='bi bi-pencil-fill'></i></a>
                                <a href='#' class='btn btn-danger'><i class='bi bi-trash'></i></a>
                            </div>
                        </td>
                    </tr>";
                }
                echo "</table>";
                $conn = null;
                ?>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="bi bi-bookmark-star"></i> เพิ่มหมวดหมู่ใหม่
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">เพิ่มหมวดหมู่ใหม่</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3" style="text-align: left">
                                    <label for="recipient-name" class="col-form-label">ชื่อหมวดหมู่:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" >Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>
        </center>
    </div>

</body>

</html>