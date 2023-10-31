<section id="header" class="bg_light">
    <nav class="navbar navbar-expand-md navbar-light pt-0 pb-0" id="navbar_sticky">
        <div class="container-fluid">
            <a class="col_dark navbar-brand" href="index.html"><i class="fa fa-shopping-basket col_yell"></i> Eco
                Mart</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle act_cat nav_hide bg_yell" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-navicon me-1"></i> ALL CATEGORIES
                        </a>
                        <ul class="dropdown-menu drop_cat" aria-labelledby="navbarDropdown">
                            <?php
                            $select = "select * from product_categories order by category_name desc";
                            $result = mysqli_query($connection, $select);
                            $category_count = mysqli_num_rows($result);
                            if (mysqli_num_rows($result)) {
                                while ($data = mysqli_fetch_array($result)) {
                                    $category = $data['category_id'];
                            ?>
                                    <li><a class="dropdown-item" href="shop.php?category/=<?php echo $data['category_name'] ?>">
                                                                                          <?php echo $data['category_name'] ?>
                                        </a>
                                    </li>
                            <?php
                                }
                            }
                            ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../front-end/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../front-end/about.php">About </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../front-end/shop.php">Shop</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../front-end/contact.php">Contact</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</section>