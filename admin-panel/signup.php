<?php
include('config.php');
if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $select = "select * from admins where email = '$email'";

    $result = mysqli_query($connection, $select);

    if (mysqli_num_rows($result) > 0) {
        $error[] = "user already exists";
    } else {
        if ($password != $cpassword) {
            $error[] = "passwords do not match";
        } else {
            $insert = "insert into admins (name, email, password, created_at)
        values ('$username', '$email', '$password', CURRENT_TIMESTAMP())";
            mysqli_query($connection, $insert);
            header('location: signin.php');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard - Signup</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">

        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-5">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h3 class="text-primary">ADMIN</h3>
                            <h3>Sign Up</h3>
                        </div>
                        <form method="post">

                            <div class="form-floating mb-3">
                                <input type="text" name="username" class="form-control" id="floatingText" placeholder="jhondoe">
                                <label>Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label>Email address</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="text" name="password" class="form-control" placeholder="Password">
                                <label>Password</label>
                            </div>
                            <div class="form-floating">
                                <input type="text" name="cpassword" class="form-control" placeholder="confirm Password">
                                <label>Confirm Password</label>
                            </div>
                            <?php
                            if (isset($error)) {
                                foreach ($error as $error) {
                                    echo "<span class='text-danger mb-2'> $error </span>";
                                }
                            }
                            ?>
                            <button type="submit" name="signup" class="btn btn-primary py-3 w-100 my-4">Sign Up</button>
                            <p class="text-center mb-0">Already have an Account? <a href="signin.php">Sign In</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>