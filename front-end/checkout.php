<?php
include('./includes/config.php');
session_start();
if (!isset($_SESSION['useremail'])) {
	header('location: login.php');
}
$shipping = 250;
$select_cart = mysqli_query($connection, "select * from cart");
if (mysqli_num_rows($select_cart) < 1) {
	header('location: cart.php');
}
$customer_id = 0;
$customer_email = $_SESSION['useremail'];
$select = "select * from customers where '$customer_email' = email";
$select_id = mysqli_query($connection, $select);
if (mysqli_num_rows($select_id) > 0) {
	while ($select_user = mysqli_fetch_assoc($select_id)) {

		$customer_id = $select_user['customer_id'];
	}
}
if (isset($_POST['checkout-btn'])) {
	$name = $_POST['name'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$workno = $_POST['workno'];
	$cellno = $_POST['cellno'];
	$dob = $_POST['dob'];
	$remarks = $_POST['remarks'];

	$cart_query = mysqli_query($connection, "select * from cart");
	$price_total = 0;
	if (mysqli_num_rows($cart_query) > 0) {
		while ($product_item = mysqli_fetch_assoc($cart_query)) {
			$product_name[] = $product_item['product_id'] . ') ' . $product_item['name'] . '(' . $product_item['quantity'] . ')';

			$product_price = number_format($product_item['price'] * $product_item['quantity']);
			$pattern = "/,/i";
			$product_price =  preg_replace($pattern, "", $product_price);
			$price_total += $product_price;
			$price_total += $shipping;
		}
	}
	$total_product = implode(' | ', $product_name);
	$detail_query = mysqli_query($connection, "insert into orders (Name, Address, Email, WorkPhoneNo, CellNo, DateOfBirth, Remarks, CustomerId, TotalProducts, TotalPrice)
	values ( '$name', '$address', '$email', $workno, $cellno, '$dob', '$remarks', $customer_id, '$total_product', $price_total)");

	if ($cart_query and $detail_query) {
		echo "<div class='confirm-msg'>
		<div class='container'>
			<div class='confirm-msg-inner'>
				<h4 class='mb-5'>Your order has been placed</h4>
				<p>Your Name : <span> $name </span></p>
				<p>Your Address : <span> $address</span></p>
				<p>Your Number : <span> $cellno</span></p>
				<p>Your Email : <span> $email</span></p>
				<p>Your Total : <span>Rs. $price_total</span></p>
				<a href='../front-end/index.php' class='button mt-3'>Continue Shopping</a>
			</div>
		</div>
	</div>";
	}
	$delete_cart = "delete from cart";
	mysqli_query($connection, $delete_cart);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Eco Mart | Checkout</title>
	<link rel="icon" type="image/x-icon" href="./uploadimg/fav-icon.png">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/global.css" rel="stylesheet">
	<link href="css/checkout.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
	<script src="js/bootstrap.bundle.min.js"></script>

</head>
<style>
	.confirm-msg {
		height: 100vh;
		width: 100%;
		background-color: rgba(0, 0, 0, 0.58);
		position: fixed;
		inset: 0;
		z-index: 99;
	}

	.confirm-msg-inner {
		background-color: rgb(135, 255, 135);
		width: 380px;
		padding: 35px 20px;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		text-align: center;
		border-radius: 4px;
		color: black;
		z-index: 98;
		font-size: 18px;
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
					<h1>CHECKOUT</h1>
					<h6 class="d-inline-block  font_14 col_yell bg-white"><a class="col_light" href="index.php">Home</a>
						<span class="me-2 ms-2">/</span> Checkout
					</h6>
				</div>
			</div>
		</div>
	</section>

	<?php
	if (isset($_SESSION['useremail'])) {
		$useremail = $_SESSION['useremail'];
		$select_email = mysqli_query($connection, "select * from customers where email = '$useremail'");
		if (mysqli_num_rows($select_email) > 0) {
			while ($data = mysqli_fetch_array($select_email)) {
	?>
				<section id="checkout">
					<div class="container-xl">
						<form class="checkout_1 row" method="post">

							<div class="col-md-8">
								<div class="checkout_1l">
									<h5>Make Your Checkout Here</h5>
									<p>Please register in order to checkout more quickly</p>
								</div>
								<div class="checkout_1l1 row">
									<div class="col-md-6 ps-0">
										<h6 class="font_13 fw-bold"> Name <span>*</span></h6>
										<input class="form-control" type="text" required name="name" value="<?php echo $data['name'] ?>">
									</div>
									<div class="col-md-6 ps-0">
										<h6 class="font_13 fw-bold"> Address <span>*</span></h6>
										<input class="form-control" type="text" required name="address" value="<?php echo $data['address'] ?>">
									</div>
								</div>
								<div class=" checkout_1l1 row">
									<div class="col-md-6 ps-0">
										<h6 class="font_13 fw-bold">Email <span>*</span></h6>
										<input class="form-control" type="email" required name="email" value="<?php echo $data['email'] ?>">
									</div>
									<div class=" col-md-6 ps-0">
										<h6 class="font_13 fw-bold">Work Phone No. <span>*</span></h6>
										<input class="form-control" type="number" required name="workno" value="<?php echo $data['number'] ?>">
									</div>
								</div>
								<div class=" checkout_1l1 row">
									<div class="col-md-6 ps-0">
										<?php
										$select_dob = mysqli_query($connection, "select * from orders where email  = '$useremail'");
										if (mysqli_num_rows($select_dob) > 0) {
											$dob = mysqli_fetch_assoc($select_dob);
										}
										?>
										<h6 class="font_13 fw-bold">Cell No. <span>*</span></h6>
										<input class="form-control" type="number" required name="cellno" value="<?php echo $dob['CellNo'] ?>">
									</div>
									<div class="col-md-6 ps-0">
										<h6 class="font_13 fw-bold">Date Of Birth <span>*</span></h6>
										<input class="form-control" type="date" required name="dob" value="<?php echo $dob['DateOfBirth'] ?>">
									</div>
								</div>
								<div class="checkout_1l1 row">
									<div class="col-md-12 ps-0">
										<h6 class="font_13 fw-bold">Remarks <span>*(optional)</span></h6>
										<textarea name="remarks" class="form-control" cols="30" rows="10"></textarea>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="checkout_1r">
									<h5>CART TOTALS</h5>
									<hr class="line">
									<table class="table">
										<thead>
											<tr>
												<th>Product</th>
												<th>Quantity</th>
											</tr>
										</thead>
										<?php
										$select = "select * from cart";
										$result = mysqli_query($connection, $select);
										if (mysqli_num_rows($result)) {
											while ($fetch_cart = mysqli_fetch_array($result)) {
										?>
												<tr>
													<td>
														<?php echo $fetch_cart['name'] ?>
													</td>
													<td class="text-center">
														<?php echo $fetch_cart['quantity'] ?>
													</td>
												</tr>
										<?php
											}
										}
										?>
									</table>
									<?php
									$select_cart = "select * from cart";
									$result = mysqli_query($connection, $select_cart);
									$total = 0;
									$shipping = 250;
									if (mysqli_num_rows($result) > 0) {
										while ($fetch_cart = mysqli_fetch_assoc($result)) {
											$total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
											$pattern = '/,/i';
											$total_price =  preg_replace($pattern, "", $total_price);
											$total = $total + $total_price;
										}
									}

									?>
									<h6 class="fw-bold font_13">Sub Total <span class="pull-right">Rs.
											<?php echo $total ?>
										</span></h6>
									<h6 class="fw-bold mt-3 font_13">(+) Shipping <span class="pull-right">Rs.
											<?php echo $shipping; ?>
										</span></h6>
									<hr>
									<h6 class="fw-bold font_13">Total <span class="pull-right">Rs.
											<?php echo $total + $shipping ?>
										</span></h6><br>
									<button class="mt-3 button border-0 w-100" type="submit" name="checkout-btn">PLACE OREDER</button>
								</div>
							</div>
						</form>
					</div>
				</section>
	<?php
			}
		}
	}
	?>




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