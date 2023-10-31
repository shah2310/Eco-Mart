<?php
include('config.php');
session_start();
if (isset($_POST['add-product'])) {
    $product_name = $_POST['product-name'];
    $product_price = $_POST['product-price'];
    $product_category = $_POST['product-category'];
    if (isset($_FILES['product-image']) && $_FILES['product-image']['error'] === UPLOAD_ERR_OK) {
        $product_image = $_FILES['product-image']['name'];

        move_uploaded_file($_FILES['product-image']['tmp_name'], '../front-end/uploadimg/' . $product_image);
    }
    $insertproduct = "insert into products (product_name, product_price, product_image, product_category)
        values ('$product_name', $product_price, '$product_image', $product_category)";
    $result = mysqli_query($connection, $insertproduct);
    if ($result) {
        $message[] = "Product added succesfully.";
    } else {
        $message[] = "Could not add the product";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHBORAD | Add Product</title>
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
    <link href="css/customize.css" rel="stylesheet">
</head>

<body>

    <?php
    if (isset($message)) {
        foreach ($message as $message) {
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'> $message <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        }
    }
    ?>


    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Sidebar Start -->
        <?php include('sidebar.php') ?>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php include('navbar.php') ?>
            <!-- Navbar End -->

            <div class="conatiner-fluid pt-4 px-4">
                <div class="row">

                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Add Product</h6>
                            <form method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="product-name" class="form-label">Product name</label>
                                    <input type="text" class="form-control" name="product-name" placeholder="product name">
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" class="form-control" name="product-price" placeholder="price">
                                </div>
                                <div class="mb-3">
                                    <label for="product-image" class="form-label">Product image</label>
                                    <input type="file" class="form-control" name="product-image" placeholder="image">
                                </div>
                                <div class="mb-3">
                                    <label for="product-category" class="form-label">Price</label>
                                    <select name="product-category" class="form-select">
                                        <option selected>Select category</option>
                                        <?php
                                        $select = "select * from product_categories";
                                        $result = mysqli_query($connection, $select);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_array($result)) {
                                                echo $row['category_name'];
                                        ?>
                                                <option value=<?php echo $row['category_id'] ?>><?php echo $row['category_name'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary" name="add-product">Add Product</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="../front-end/index.php">Eco Mart</a>, All Right Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">Designed By <a>Haris & Team</a></div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Template Javascript -->
    <script src="js/main.js"></script>

</body>

</html>