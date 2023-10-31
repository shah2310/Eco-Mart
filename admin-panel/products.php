<?php
include('config.php');
session_start();
//deleting the product inthis code below
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    $deleteproduct = "delete from products where product_id = $delete_id";
    $result = mysqli_query($connection, $deleteproduct);
    if ($result) {
        $message[] = 'Product deleted';
    } else {
        $message[] = 'Product could not be deleted';
    }
    header('location: products.php');
}


//editing the product in this code below
if (isset($_POST['update-product'])) {
    $update_id = $_POST['update-id'];
    $updated_name = $_POST['updated-name'];
    $updated_price = $_POST['updated-price'];
    $updated_category = $_POST['updated-category'];
    if (isset($_FILES['updated-image']) && $_FILES['updated-image']['error'] === UPLOAD_ERR_OK) {
        $updated_image = $_FILES['updated-image']['name'];
        move_uploaded_file($_FILES['updated-image']['tmp_name'], 'uploadimg/' . $updated_image);
    }
    $updatequery = mysqli_query($connection, "update products set product_name = '$updated_name', product_price = $updated_price, 
    product_image = '$updated_image', product_category = '$updated_category' where product_id = $update_id");

    if ($updatequery) {
        $message[] = "product updated succesfully";
    } else {
        $message[] = "product could not updated";
    }
    header('location: products.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHBORAD | Products</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/customize.css" rel="stylesheet">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <?php
    if (isset($message)) {
        foreach ($message as $message) {
            echo "<div class='alert alert-warning bg-warning alert-dismissible fade show' role='alert'> $message <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
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

            <!-- displaying products start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Products</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-center align-middle table-bordered table-hover mb-0" id="products-table">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Product Id</th>
                                    <th scope="col">Product Title</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <?php
                                    $selectproduct = "select * from products order by product_name";
                                    $selectresult = mysqli_query($connection, $selectproduct);
                                    if (mysqli_num_rows($selectresult) > 0) {
                                        while ($rows = mysqli_fetch_array($selectresult)) {
                                            $category_id = $rows['product_category'];
                                    ?>

                                            <td><?php echo $rows['product_id'] ?></td>
                                            <td><?php echo $rows['product_name'] ?></td>
                                            <td><?php echo $rows['product_price'] ?></td>
                                            <td><img class="img-fluid" src="../front-end/uploadimg/<?php echo $rows['product_image'] ?>" width="40"></td>
                                            <?php
                                            $select = "select category_name from product_categories where category_id = $category_id";
                                            $category = mysqli_query($connection, $select);
                                            if (mysqli_num_rows($category) > 0) {
                                                $cate = mysqli_fetch_array($category);
                                            }
                                            ?>
                                            <td><?php echo $cate['category_name'] ?></td>
                                            <td><a href="products.php?edit=<?php echo $rows['product_id'] ?>" class="edit btn btn-sm btn-primary" title="edit product" id="modaltoggle">Edit</a></td>
                                            <td><a href="products.php?delete=<?php echo $rows['product_id'] ?>" class="btn btn-sm btn-danger" title="delete product" onclick="return confirm('are you sure you want to delete this?')">Delete</a></td>
                                </tr>
                        <?php
                                        }
                                    }
                        ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- displaying products end -->

            <!-- edit product start -->
            <!-- Modal -->
            <div class="update-form">
                <div class="conatiner-fluid pt-4 px-4">
                    <div class="row">

                        <div class="col-sm-12 col-xl-12">
                            <div class="bg-light rounded p-4 form-parent">
                                <?php
                                if (isset($_GET['edit'])) {
                                    $edit_id = $_GET['edit'];
                                    $edit_query = mysqli_query($connection, "select * from products where product_id = $edit_id");
                                    if (mysqli_num_rows($edit_query) > 0) {
                                        while ($fetch_edit = mysqli_fetch_array($edit_query)) {
                                ?>
                                            <form method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="update-id" value="<?php echo $fetch_edit['product_id'] ?>">
                                                <div class="mb-3">
                                                    <label for="product-name" class="form-label">Product name</label>
                                                    <input type="text" class="form-control" name="updated-name" placeholder="product name" value="<?php echo $fetch_edit['product_name'] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="price" class="form-label">Price</label>
                                                    <input type="text" class="form-control" name="updated-price" placeholder="price" value="<?php echo $fetch_edit['product_price'] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="product-image" class="form-label">Product image</label>
                                                    <input type="file" class="form-control" name="updated-image" placeholder="image" accept="image/png, image/jpg, image/jpeg" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="product-category" class="form-label">Price</label>
                                                    <select name="updated-category" class="form-select">
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
                                                <button type="submit" class="btn btn-primary" class="update-btn" name="update-product">Edit Product</button>
                                                <button type="reset" class="btn btn-danger modal-close">Close</button>
                                            </form>
                                <?php
                                        }
                                    }
                                    echo "<script>document.querySelector('.update-form').style.display = 'block'
                                    </script>";
                                }

                                ?>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- edit product end -->

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="../front-end/index.php" target="_blank">Eco Mart</a>, All Right Reserved.
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
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="js/index.js"></script>
    <script>
        let table = new DataTable('#products-table');
    </script>
</body>

</html>