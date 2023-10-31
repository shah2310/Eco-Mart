<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <section id="top">
        <div class="container-fluid">
            <div class="row top_1">
                <div class="col-md-8 text-white">
                    <?php
                    if (isset($_SESSION['useremail'])) {
                        $email = $_SESSION['useremail'];
                        $select_name = mysqli_query($connection, "select * from customers where email = '$email'");
                        if (mysqli_num_rows($select_name) > 0) {
                            while ($data = mysqli_fetch_assoc($select_name)) {

                                $name = $data['name'];
                                echo "<p class='my-0'><i class='fa fa-user mx-2'></i> $name </p>";
                            }
                        }
                    }
                    ?>

                </div>
                <div class="col-md-4">
                    <div class="top_1i text-end">
                        <ul class="mb-0">
                            <li class="nav-item  d-inline-block font_13 me-2 pe-2">
                                <a class="text-light" href="login.php"><i class="fa fa-sign-in col_yell me-1"></i> Sign In</a>
                            </li>
                            <li class="nav-item  d-inline-block font_13 border-0">
                                <a class="text-light" href="logout.php" onclick="return confirm('are you sure you wanna logout?')"><i class="fa fa-user col_yell me-1"></i>
                                    Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>