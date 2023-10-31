<?php
include('config.php');
if (!isset($_SESSION['username'])) {
    header('location: signin.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

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



    <!-- Sidebar Start -->
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-light navbar-light">
            <a href="dashborad.php" class="navbar-brand mx-3 mb-3">
                <h3 class="text-primary">Dashboard</h3>
            </a>
            <div class="d-flex align-items-center mb-4">
                <div class="ms-3">
                    <h4 class="mb-0"><?php echo $_SESSION['username'] ?></h4>
                    <span>Admin</span>
                </div>
            </div>
            <div class="navbar-nav w-100">
                <a href="dashborad.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="addproduct.php" class="nav-item nav-link"><i class="fa fa-plus me-2"></i>Add Product</a>
                <a href="products.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Products</a>
                <a href="./messages.php" class="nav-item nav-link"><i class="fa fa-envelope me-2"></i>Messages</a>
                <a href="users.php" class="nav-item nav-link"><i class="fa fa-user me-2"></i>Users</a>
                <a href="./topcustomers.php" class="nav-item nav-link"><i class="fa fa-user me-2"></i>Top Customers</a>
            </div>
        </nav>
    </div>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
    </script>
</body>

</html>