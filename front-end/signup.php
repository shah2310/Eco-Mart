<?php
include('./includes/config.php');
if (isset($_POST['signup_btn'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = $_POST['password'];

    $select = "select email from customers where email = '$email'";
    $res = mysqli_query($connection, $select);
    if (mysqli_num_rows($res) > 0) {
        $message[] = "Email already exist";
    } else {
        $insert = "insert into customers (name, address, email, number, password)
        values ('$name', '$address', '$email', $number, '$password')";
        $result = mysqli_query($connection, $insert);
        header('location: login.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eco Mart | Signup</title>
    <link rel="icon" type="image/x-icon" href="./uploadimg/fav-icon.png">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/global.css" rel="stylesheet">
    <link href="css/cart.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>

</head>

<body>

    <?php include('./includes/topnav.php') ?>
	<?php include('./includes/middle_nav.php') ?>
	<hr>

    <section id="checkout" style="background-color: #1d4289;" class="w-50 mx-auto text-white p-5 mt-2">
        <form class="container-xl" method="post">
            <div class="checkout_1 row">
                <?php
                if (isset($message)) {
                    foreach ($message as $msg) {
                        echo "<p class='text-danger fw-bold'> $msg </p>";
                    }
                }
                ?>
                <div class="col-md-12">

                    <div class="checkout_1l1 row">
                        <div class="col-md-6 ps-0">
                            <h6 class="font_13 fw-bold">Your Name*</h6>
                            <input class="form-control" type="text" required name="name">
                        </div>
                        <div class="col-md-6 ps-0">
                            <h6 class="font_13 fw-bold">Your Address*</h6>
                            <input class="form-control" type="text" required name="address">
                        </div>
                    </div>
                </div>

            </div>
            <div class="checkout_1 row">
                <div class="col-md-12">
                    <div class="checkout_1l1 row">
                        <div class="col-md-6 ps-0 my-3">
                            <h6 class="font_13 fw-bold">Your Contact No.*</h6>
                            <input class="form-control" type="text" required name="number">
                        </div>
                        <div class="col-md-6 ps-0 my-3">
                            <h6 class="font_13 fw-bold">Your Email*</h6>
                            <input class="form-control" type="text" required name="email">
                        </div>
                        <div class="col-md-6 ps-0 my-3">
                            <h6 class="font_13 fw-bold">Your Password*</h6>
                            <input class="form-control" type="text" required name="password">
                        </div>
                        <div class="col-md-12 ps-0 my-3">
                            <input type="submit" name="signup_btn" class="button border-0 p-2 px-3 my-3">
                        </div>
                    </div>
                    <div class="checkout_1l">
                        <div class="">
                            <a href="login.php" class="text-white">Already have an account?</a>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </section>




</body>

</html>