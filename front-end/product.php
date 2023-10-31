<?php
include('./includes/config.php');
$product_search = $_GET['product_search'];
if ($product_search == "") {
    header('location: javascript://history.go(-1)');
}
// sending items to cart table
if (isset($_POST['cart-btn'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $image = $_POST['image'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $select = "select * from cart where product_id = $id";
    $res = mysqli_query($connection, $select);
    if (mysqli_num_rows($res) > 0) {
        echo "<script> alert('product already exists') </script>";
    } else {
        $insert = "insert into cart (product_id, name, image, price, quantity)
		values ($id, '$name', '$image', $price, $quantity)";

        $cart_items = mysqli_query($connection, $insert);
        echo "<script> alert('product added to cart') </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eco Mart | Product</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/global.css" rel="stylesheet">
    <link href="css/product.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>

</head>
<style>
    .prod_2in ul button {
        box-shadow: 0px 1px 7px 0px rgb(117 114 114 / 18%);
        background: #fff;
        width: 50px;
        height: 45px;
        display: block;
        font-size: 24px;
        line-height: 45px;
        border-radius: 3px;
    }

    .prod_2in ul button:hover {
        background: #f7ba01;
        color: white;
    }


    .prod_2in ul i:hover {
        background: #f7ba01;
        color: white;
    }
</style>

<body>
    <?php include('./includes/topnav.php') ?>
    <?php include('./includes/middle_nav.php') ?>
    <?php include('./includes/primary_nav.php') ?>

    <section id="center" class="center_o pt-4 pb-4 bg-light">
        <div class="container-xl">
            <div class="row center_o1 text-center">
                <div class="col-md-12">
                    <h1>PRODUCT</h1>
                    <h6 class="d-inline-block  font_14 col_yell bg-white"><a class="col_light" href="#">Home</a> <span class="me-2 ms-2">/</span> Product</h6>
                </div>
            </div>
        </div>
    </section>

    <section id="prod_pg" class="pt-4 pb-4 bg_light_1">
        <div class="container-fluid">
            <div class="row prod_pg1">
                <div class="col-md-12 col-lg-3">
                    <div class="prod_pg1l">
                        <div class="prod_pg1l1 bg-white p-4">
                            <h6 class="mb-3">PRODUCT CATEGORIES</h6>
                            <?php
                            $select = "select * from product_categories order by category_name desc";
                            $result = mysqli_query($connection, $select);
                            $category_count = mysqli_num_rows($result);
                            if (mysqli_num_rows($result)) {
                                while ($data = mysqli_fetch_array($result)) {
                                    $category = $data['category_id'];
                            ?>

                                    <div class="prod_pg1l1i row mt-2">
                                        <div class="col-md-10 col-10">
                                            <div class="prod_pg1l1il">
                                                <h6 class="font_14 fw-normal mt-1"><a href="shop.php?category/=<?php echo $data['category_name'] ?>"><i class="fa fa-circle-o me-1 col_yell"></i><?php echo $data['category_name'] ?></a></h6>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-2">
                                            <div class="prod_pg1l1ir text-end">
                                                <h6 class="d-inline-block bg_light font_13">
                                                    <?php
                                                    $select = "select * from products where product_category = $category";
                                                    $res = mysqli_query($connection, $select);
                                                    $count = mysqli_num_rows($res);
                                                    echo $count;
                                                    ?>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-9">
                    <div class="prod_pg1r">
                        <div class="prod_pg1r1 row">
                            <div class="col-md-9">
                                <div class="prod_pg1r1l">
                                    <p class="mt-3 mb-0">
                                        <?php

                                        $product_search = $_GET['product_search'];
                                        $select = "SELECT * FROM products WHERE product_name LIKE '%$product_search%'";
                                        $result = mysqli_query($connection, $select);
                                        if (mysqli_num_rows($result) > 0) {
                                            $product_count = mysqli_num_rows($result);
                                            echo "Products found " . $product_count;
                                        } else {
                                            $select_category = mysqli_query($connection, "SELECT * FROM products INNER JOIN product_categories on product_category = category_id and category_name like '%$product_search%'");
                                            $category_count = mysqli_num_rows($select_category);
                                            echo "Products found " . $category_count;
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="prod_pg1r2 mt-4 row">

                            <?php
                            $product_search = $_GET['product_search'];
                            $select = "SELECT * FROM products WHERE product_name LIKE '%$product_search%'";
                            $result = mysqli_query($connection, $select);
                            if (mysqli_num_rows($result) > 0) {
                                while ($data = mysqli_fetch_array($result)) {

                            ?>
                                    <form class="col-md-4 mt-4" method="post">
                                        <div class="prodinm clearfix">
                                            <input type="hidden" name="id" value="<?php echo $data['product_id'] ?>">
                                            <input type="hidden" name="quantity" min="1" value="1" class="form-control mt-4" style="width: 140px; height:50px; margin-right:10px; float:left;">
                                            <div class="prod_2im position-relative clearfix">
                                                <div class="prod_2i1 clearfix">
                                                    <div class="grid clearfix">
                                                        <figure class="effect-jazz mb-0">
                                                            <a href="detail.php?product/=<?php echo $data['product_name'] ?>"><img src="../front-end/uploadimg/<?php echo $data['product_image'] ?>" class="w-100" alt="abc"></a>
                                                            <input type="hidden" name="image" value="<?php echo $data['product_image'] ?>">
                                                        </figure>
                                                    </div>
                                                </div>
                                                <div class="prod_2in clearfix position-absolute bg-light w-100 p-3 text-center">
                                                    <ul class="mb-0">
                                                        <button class="d-inline-block border-0 me-3" type="submit" name="cart-btn"><i class="fa fa-shopping-cart"></i></button>
                                                        <li class="d-inline-block"><a href="detail.php?product/=<?php echo $data['product_name'] ?>"><i class="fa fa-eye"></i></a></li>
                                                        <input type="hidden" name="name" value="<?php echo $data['product_name'] ?>">
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="prod_2i2 pt-4 pb-4 ps-3 pe-3 bg-white clearfix">
                                                <h6 class="mt-2"><a href="detail.php?product/=<?php echo $data['product_name'] ?>"><?php echo $data['product_name'] ?></a></h6>
                                                <hr>
                                                <h6 class="fw-normal mb-0 col_yell fw-bold">Rs. <span class="pull-lef fw-bold col_yell price"><?php echo $data['product_price'] ?></span></h6>
                                                <input type="hidden" name="price" value="<?php echo $data['product_price'] ?>">
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                }
                            } else {
                                $select = mysqli_query($connection, "SELECT * FROM products INNER JOIN product_categories on product_category = category_id and category_name like '%$product_search%'");
                                if (mysqli_num_rows($select) > 0) {
                                    while ($data = mysqli_fetch_array($select)) {
                                    ?>
                                        <form class="col-md-4 mt-4" method="post">
                                            <div class="prodinm clearfix">
                                                <input type="hidden" name="id" value="<?php echo $data['product_id'] ?>">
                                                <input type="hidden" name="quantity" min="1" value="1" class="form-control mt-4" style="width: 140px; height:50px; margin-right:10px; float:left;">
                                                <div class="prod_2im position-relative clearfix">
                                                    <div class="prod_2i1 clearfix">
                                                        <div class="grid clearfix">
                                                            <figure class="effect-jazz mb-0">
                                                                <a href="detail.php?product/=<?php echo $data['product_name'] ?>"><img src="../front-end/uploadimg/<?php echo $data['product_image'] ?>" class="w-100" alt="abc"></a>
                                                                <input type="hidden" name="image" value="<?php echo $data['product_image'] ?>">
                                                            </figure>
                                                        </div>
                                                    </div>
                                                    <div class="prod_2in clearfix position-absolute bg-light w-100 p-3 text-center">
                                                        <ul class="mb-0">
                                                            <button class="d-inline-block border-0 me-3" type="submit" name="cart-btn"><i class="fa fa-shopping-cart"></i></button>
                                                            <li class="d-inline-block"><a href="detail.php?product/=<?php echo $data['product_name'] ?>"><i class="fa fa-eye"></i></a></li>
                                                            <input type="hidden" name="name" value="<?php echo $data['product_name'] ?>">
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="prod_2i2 pt-4 pb-4 ps-3 pe-3 bg-white clearfix">
                                                    <h6 class="mt-2"><a href="detail.php?product/=<?php echo $data['product_name'] ?>"><?php echo $data['product_name'] ?></a></h6>
                                                    <hr>
                                                    <h6 class="fw-normal mb-0 col_yell fw-bold">Rs. <span class="pull-lef fw-bold col_yell price"><?php echo $data['product_price'] ?></span></h6>
                                                    <input type="hidden" name="price" value="<?php echo $data['product_price'] ?>">
                                                </div>
                                            </div>
                                        </form>
                                <?php
                                    }
                                }
                                ?>

                            <?php
                            }
                            ?>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include('./includes/footer.php') ?>

    <script>
        window.onscroll = function() {
            myFunction()
        };

        var navbar_sticky = document.getElementById("navbar_sticky");
        var sticky = navbar_sticky.offsetTop;
        var navbar_height = document.querySelector('.navbar').offsetHeight;

        function myFunction() {
            if (window.pageYOffset >= sticky + navbar_height) {
                navbar_sticky.classList.add("sticky")
                document.body.style.paddingTop = navbar_height + 'px';
            } else {
                navbar_sticky.classList.remove("sticky");
                document.body.style.paddingTop = '0'
            }
        }

        // let filter = document.querySelector('#filter');
        // let allPrices = []
        // filter.addEventListener('change', (e) => {
        //     let prices = document.querySelectorAll('.price')
        //     prices.forEach(price => {
        //         allPrices.push(price.textContent)
        //     })
        //     allPrices.sort(function(a, b) {
        //         return a - b;
        //     })
        //     console.log(allPrices);
        // })
    </script>

</body>

</html>