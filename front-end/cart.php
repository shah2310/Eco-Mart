<?php
include('./includes/config.php');

//deleting the product from cart in this code below
if (isset($_GET['delete'])) {
	$delete_id = $_GET['delete'];

	$deleteproduct = "delete from cart where product_id = $delete_id";
	$result = mysqli_query($connection, $deleteproduct);
	header('location: cart.php');
}
//updating the quantity of cart products in this code below
if (isset($_POST['update'])) {
	$update_id = $_POST['update_id'];
	$quantity = $_POST['quantity'];

	$update_quantity = "update cart set quantity = $quantity where product_id = $update_id";
	$result = mysqli_query($connection, $update_quantity);
	if ($result) {
		header('location: cart.php');
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Eco Mart | Cart</title>
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
	<?php include('./includes/primary_nav.php') ?>

	<section id="center" class="center_o pt-4 pb-4 bg-light">
		<div class="container-xl">
			<div class="row center_o1 text-center">
				<div class="col-md-12">
					<h1>SHOPPING CART</h1>
					<h6 class="d-inline-block  font_14 col_yell bg-white"><a class="col_light" href="index.php">Home</a> <span class="me-2 ms-2">/</span> Shopping Cart</h6>
				</div>
			</div>
		</div>
	</section>

	<section id="cart_page" class="cart pt-4 pb-4">
		<div class="container-xl">
			<div class="cart_2 row">
				<div class="col-md-6">
					<h5>MY CART</h5>
				</div>
				<div class="col-md-6">
					<h5 class="text-end text-uppercase"><a href="index.php">Continue Shopping</a></h5>
				</div>
			</div>
			<div class="cart_3 row mt-3">
				<div class="col-md-8">
					<div class="cart_3l">
						<h6>PRODUCT</h6>
					</div>
					<?php
					$cart_items = "select * from cart";
					$result = mysqli_query($connection, $cart_items);
					if (mysqli_num_rows($result) > 0) {
						while ($data = mysqli_fetch_array($result)) {
					?>
							<div class="cart_3l1 mt-3 row ms-0 me-0">
								<div class="col-md-3 ps-0 col-3">
									<input type="hidden" value="<?php echo $data['product_id'] ?>">
									<div class="cart_3l1i">
										<a href="#"><img src="../front-end/uploadimg/<?php echo $data['image'] ?>" alt="abc" class="w-100"></a>
									</div>
								</div>
								<div class="col-md-9 col-9">
									<div class="cart_3l1i1">
										<h6 class="fw-bold"><?php echo $data['name'] ?></h6>
										<h5 class="col_yell mt-3">Rs. <?php echo $data['price'] ?></h5>
										<h6 class="font_12 mt-3 mb-3">Quantity</h6>
									</div>
									<form class="cart_3l1i2" method="post">
										<input type="hidden" value="<?php echo $data['product_id'] ?>" name="update_id">
										<input type="number" name="quantity" min="1" value="<?php echo $data['quantity'] ?>" class="form-control" placeholder="Qty">
										<h6><a class="button_1 border-0" href="cart.php?delete=<?php echo $data['product_id'] ?>" onclick="return confirm('remove item from cart?')">REMOVE</a></h6>
										<input class="button border-0" type="submit" name="update" value="update cart">
									</form>
								</div>
							</div>

					<?php
						}
					} else {
						echo "<h5 class='mt-5 ms-2 text-uppercase'>No items in cart</h5>";
					}
					?>



				</div>
				<div class="col-md-4">
					<div class="cart_3r">
						<h6 class="head_1">SUBTOTAL</h6>
						<?php
						$select_cart = "select * from cart";
						$result = mysqli_query($connection, $select_cart);
						$total = 0;
						if (mysqli_num_rows($result) > 0) {
							while ($fetch_cart = mysqli_fetch_assoc($result)) {
								$total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
								$pattern = "/,/i";
								$total_price =  preg_replace($pattern, "", $total_price);
								$total = $total + $total_price;
							}
						}

						?>
						<h5 class="text-center col_yell mt-3">
							<?php echo 'Rs. ' . $total ?>
						</h5>
						<hr>
						<h6 class="text-center mt-3"><a class="button" href="checkout.php">PROCEED TO CHECKOUT</a></h6><br>
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
	</script>

</body>

</html>