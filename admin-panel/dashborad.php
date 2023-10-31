<?php
include('config.php');
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> Admin Dashboard</title>
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
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">



        <!-- Sidebar Start -->
        <?php include('sidebar.php') ?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php include('navbar.php') ?>
            <!-- Navbar End -->


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total products</p>
                                <h6 class="mb-0">
                                    <?php
                                    $select = "select * from products";
                                    $result = mysqli_query($connection, $select);
                                    $num = mysqli_num_rows($result);
                                    echo $num;
                                    ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Sale</p>
                                <h6 class="mb-0">
                                    Rs.
                                    <?php
                                    $select = "select TotalPrice from orders";
                                    $result = mysqli_query($connection, $select);
                                    $total_sales = 0;
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($data = mysqli_fetch_assoc($result)) {
                                            $total_price = $data['TotalPrice'];
                                            $total_sales += $total_price;
                                        }
                                        echo $total_sales;
                                    } else {
                                        echo "0";
                                    }

                                    ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Top Customer</p>
                                <h6 class="mb-0">
                                    <?php
                                    $select = mysqli_query($connection, "SELECT *, COUNT(Name) AS numbers FROM orders GROUP BY Name ORDER BY numbers DESC LIMIT 1");
                                    if (mysqli_num_rows($select) > 0) {
                                        while ($user = mysqli_fetch_assoc($select)) {
                                            $name = $user['Name'];
                                            echo $name;
                                        }
                                    }
                                    ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Top Seller</p>

                                <h6 class="mb-0">
                                    <?php
                                    $select = mysqli_query($connection, "SELECT COUNT(TotalProducts), TotalProducts AS number from orders GROUP BY TotalProducts limit 1");
                                    if (mysqli_num_rows($select) > 0) {
                                        while ($user = mysqli_fetch_assoc($select)) {
                                            $product = $user['number'];
                                            echo $product;
                                        }
                                    }
                                    ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->




            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Orders</h6>
                        <!-- <a href="">Show All</a> -->
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0 table-responsive" id="orders-tabl">
                            <thead>
                                <tr class="text-dark">
                                    <!-- <th scope="col"><input class="form-check-input" type="checkbox"></th> -->
                                    <th scope="col">Name</th>
                                    <th scope="col">Order Id</th>
                                    <th scope="col">Customer Id</th>
                                    <th scope="col">Total Products</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col">Order Time</th>
                                    <th scope="col">Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $select_order = mysqli_query($connection, "select * from orders order by orderId desc");
                                if (mysqli_num_rows($select_order) > 0) {
                                    while ($data = mysqli_fetch_array($select_order)) {
                                ?>
                                        <tr>
                                            <td><?php echo $data['Name'] ?></td>
                                            <td><?php echo $data['orderId'] ?></td>
                                            <td><?php echo $data['CustomerId'] ?></td>
                                            <td><?php echo $data['TotalProducts'] ?></td>
                                            <td><?php echo $data['TotalPrice'] ?></td>
                                            <td><?php echo $data['OrderTime'] ?></td>
                                            <td><?php echo $data['Remarks'] ?></td>
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
            <!-- Recent Sales End -->





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
    <script>
        let table = new DataTable('#orders-table');

        // Sample string with products
        var productsString = document.querySelectorAll('.product');

        // Replace pipes with <br> tags
        var formattedProducts = productsString.forEach((item) => {
            item.replace(/\|/g, '<br>')
            console.log(item);
        });
    </script>
</body>

</html>