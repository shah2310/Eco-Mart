<style>
    .cart-count {
        text-align: center;
        left: -10px;
        top: 10px;
        bottom: 2px;
        border-radius: 100px;
    }
</style>
<section id="header_top" class="pt-4 pb-4">
    <div class="container-fluid">
        <div class="row header_top1">
            <div class="col-md-3">
                <div class="header_top1l">
                    <h3 class="mb-0"><a class="col_dark" href="../front-end/index.php"><i class="fa fa-shopping-basket col_yell"></i> Eco Mart</a></h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="header_top1m">
                    <form class="input-group" action="../front-end/product.php">
                        <input type="text" class="form-control" placeholder="Search for your item" name="product_search">
                        <span class="input-group-btn">
                            <button class="btn btn-primary bg_yell" type="submit">
                                <i class="fa fa-search"></i> </button>
                        </span>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
                <div class="header_top1r pull-right">
                    <ul class="mb-0">
                        <li class="nav-item dropdown  d-inline-block position-relative">
                            <a class="col_dark nav_hide" href="cart.php">
                                <i class="fa fa-shopping-bag fs-2 align-middle me-1 col_yell"></i> My Cart
                            </a>
                            <div class="position-absolute bg_blu text-white fw-bold cart-count">
                                <p class="bg_blue rounded-pill px-2">
                                    <?php
                                    include('./includes/config.php');
                                    $select = "select * from cart";
                                    $result = mysqli_query($connection, $select);
                                    $cart_count = mysqli_num_rows($result);
                                    echo $cart_count;
                                    ?>
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>