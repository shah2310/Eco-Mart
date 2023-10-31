<?php
include('./includes/config.php');
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
	<title>Eco Mart | Details</title>
	<link rel="icon" type="image/x-icon" href="./uploadimg/fav-icon.png">

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/global.css" rel="stylesheet">
	<link href="css/detail.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
	<script src="js/bootstrap.bundle.min.js"></script>

</head>

<body>
	<?php include('./includes/topnav.php') ?>
	<?php include('./includes/middle_nav.php') ?>
	<?php include('./includes/primary_nav.php') ?>


	<section id="center" class="center_o pt-4 pb-4 bg-light">
		<div class="container-xl">
			<div class="row center_o1 text-center">
				<div class="col-md-12">
					<h1>PRODUCT DETAIL</h1>
					<h6 class="d-inline-block bg-white font_14 col_yell"><a class="col_light" href="#">Home</a> <span class="me-2 ms-2">/</span> Product Detail</h6>
				</div>
			</div>
		</div>
	</section>

	<section id="detail" class="pt-4 pb-4">
		<div class="container-xl">
			<div class="row detail_1">
				<div class="col-md-6">
					<div class="detail_1l">
						<?php
						if (isset($_GET['product/'])) {
							$viewname = $_GET['product/'];
							$select = "select * from products where product_name = '$viewname'";
							$product = mysqli_query($connection, $select);
							if (mysqli_num_rows($product) > 0) {
								while ($row = mysqli_fetch_assoc($product)) {
						?>
									<img src="../front-end/uploadimg/<?php echo $row['product_image'] ?>" class="d-block w-75" alt="<?php echo $row['product_name'] ?>">
						<?php
								}
							}
						}
						?>


					</div>
				</div>
				<?php
				if (isset($_GET['product/'])) {
					$viewname = $_GET['product/'];
					$select = "select * from products where product_name = '$viewname'";
					$product = mysqli_query($connection, $select);
					if (mysqli_num_rows($product) > 0) {
						while ($row = mysqli_fetch_assoc($product)) {
				?>
							<div class="col-md-6">
								<form class="detail_1r" method="post">
									<input type="hidden" name="id" value="<?php echo $row['product_id'] ?>">
									<input type="hidden" name="image" value="<?php echo $row['product_image'] ?>">
									<h4 class="mt-2"><?php echo $row['product_name'] ?></h4>
									<input type="hidden" name="name" value="<?php echo $row['product_name'] ?>">
									<h4 class="mt-3"><span class="col_yell me-3">Rs. <?php echo $row['product_price'] ?></span></h4>
									<input type="hidden" name="price" value="<?php echo $row['product_price'] ?>">
									<input type="number" name="quantity" min="1" value="1" class="form-control mt-4" style="width: 140px; height:50px; margin-right:10px; float:left;">
									<button type="submit" name="cart-btn" class="text-uppercase mt-4 border-0 button">Add to Cart</button>
									<hr>
									<h6 class="font_13 col_light">CATEGORY : <a class="col_light" href="#"></a>
										<?php
										$category_id = $row['product_category'];
										$select_cateogry = "select category_name from product_categories where category_id = $category_id";
										$res = mysqli_query($connection, $select_cateogry);
										if (mysqli_num_rows($res) > 0) {
											$name = mysqli_fetch_assoc($res);
											echo $name['category_name'];
										}
										?>
									</h6>
								</form>
							</div>
				<?php
						}
					}
				}
				?>
			</div>


			<div class="detail_4 row mt-4">
				<div class="col-md-12">
					<h4>Related Products</h4>
					<hr>
				</div>
			</div>
			<div class="prod_pg1r2 row">

				<?php
				if (isset($_GET['product/'])) {
					$viewname = $_GET['product/'];
					$category = "select * from products where product_name = '$viewname'";
					$result = mysqli_query($connection, $category);
					if (mysqli_num_rows($result) > 0) {
						while ($data = mysqli_fetch_array($result)) {
							$related_product = $data['product_category'];
							$select_product = "select * from products where product_category = $related_product limit 4";
							$res = mysqli_query($connection, $select_product);
							if (mysqli_num_rows($res) > 0) {
								while ($row = mysqli_fetch_array($res)) {
				?>
									<div class="col-md-3">
										<div class="prod_2im position-relative clearfix">
											<div class="prod_2i1 clearfix">
												<div class="grid clearfix">
													<figure class="effect-jazz mb-0">
														<a href="detail.php?product/=<?php echo $data['product_name'] ?>"><img src="../front-end/uploadimg/<?php echo $row['product_image'] ?>" class="w-100" alt="abc"></a>
													</figure>
												</div>
											</div>
											<div class="prod_2i2 pb-2 clearfix">
												<h6 class="mt-3"><a href="detail.php?product/=<?php echo $row['product_name'] ?>"><?php echo $row['product_name'] ?></a></h6>
												<h6 class="fw-normal mt-2">Rs. <?php echo $row['product_price'] ?></h6>
											</div>
										</div>
									</div>
				<?php
								}
							}
						}
					}
				}

				?>
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
	</script>

</body>

</html>