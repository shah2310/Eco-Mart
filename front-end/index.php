<?php
include('./includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Eco Mart</title>
	<link rel="icon" type="image/x-icon" href="./uploadimg/fav-icon.png">

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/global.css" rel="stylesheet">
	<link href="css/index.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
	<script src="js/bootstrap.bundle.min.js"></script>


</head>

<body>
	<?php include('./includes/topnav.php') ?>
	<?php include('./includes/middle_nav.php') ?>
	<?php include('./includes/primary_nav.php') ?>

	<section id="center" class="center_home">
		<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-indicators">
				<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-label="Slide 1"></button>
				<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2" class="" aria-current="true"></button>
				<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
			</div>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="img/slider1.jpeg" class="d-block w-100" alt="..." height="600">
					<div class="carousel-caption d-md-block">
						<h1 class="text-white fw-normal font_50 text-uppercase">Top Deal Today ! <br> <span class="fw-bold">Cosmetics</span></h1>
						<p class="fs-6 mt-4">Get up to <span class="col_yell fw-bold">50%</span> off Today Only</p>
						<h6 class="text-uppercase mt-4 mb-0"><a class="button" href="./shop.php">SHOP NOW</a></h6>
					</div>
				</div>
				<div class="carousel-item">
					<img src="img/slider2.jpeg" class="d-block w-100" alt="..." height="600">
					<div class="carousel-caption d-md-block">
						<h1 class="text-white fw-normal font_50 text-uppercase">Top Deal Today ! <br> <span class="fw-bold">Jewelry</span></h1>
						<p class="fs-6 mt-4">Get up to <span class="col_yell fw-bold">50%</span> off Today Only</p>
						<h6 class="text-uppercase mt-4 mb-0"><a class="button" href="./shop.php">SHOP NOW</a></h6>
					</div>
				</div>
				<div class="carousel-item">
					<img src="img/slider3.jpeg" class="d-block w-100" alt="..." height="600">
					<div class="carousel-caption d-md-block">
						<h1 class="text-white fw-normal font_50 text-uppercase">Best! <br> <span class="fw-bold">Necklace</span></h1>
						<p class="fs-6 mt-4">Get up to <span class="col_yell fw-bold">50%</span> off Today Only</p>
						<h6 class="text-uppercase mt-4 mb-0"><a class="button" href="./shop.php">SHOP NOW</a></h6>
					</div>
				</div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div>
	</section>

	<section id="prod" class="pt-4 pb-4">
		<div class="container-xl">
			<div class="row prod_1 mb-4 text-center">
				<div class="col-md-12">
					<h4 class="h_line mb-0">Super Deals</h4>
				</div>
			</div>
			<div class="row prod_2 text-center">
				<?php
				$select = "select * from products limit 4";
				$result = mysqli_query($connection, $select);
				if (mysqli_num_rows($result) > 0) {
					while ($data = mysqli_fetch_array($result)) {
				?>
						<div class="col-md-3">
							<div class="prod_2im position-relative clearfix">
								<div class="prod_2i1 clearfix">
									<div class="grid clearfix">
										<figure class="effect-jazz mb-0">
											<a href="detail.php?product/=<?php echo $data['product_name'] ?>"><img src="../front-end/uploadimg/<?php echo $data['product_image'] ?>" class="w-100" alt="abc"></a>
										</figure>
									</div>
								</div>
								<div class="prod_2i2 pb-2 clearfix">
									<h6 class="mt-3"><a href="detail.php?product/=<?php echo $data['product_name'] ?>"><?php echo $data['product_name'] ?></a></h6>
									<h6 class="fw-normal mt-2">Rs. <?php echo $data['product_price'] ?></h6>
								</div>
								<div class="prod_2i3 clearfix position-absolute">
									<h6 class="bg_yell d-inline-block pt-1 pb-1 font_13 text-white ps-3 pe-3">NEW</h6>
								</div>
							</div>
						</div>
				<?php
					}
				}
				?>

			</div>

			<div class="row prod_2 text-center mt-4">
				<?php
				$select = "select * from products where product_category = 10 limit 4";
				$result = mysqli_query($connection, $select);
				if (mysqli_num_rows($result) > 0) {
					while ($data = mysqli_fetch_array($result)) {
				?>
						<div class="col-md-3">
							<div class="prod_2im position-relative clearfix">
								<div class="prod_2i1 clearfix">
									<div class="grid clearfix">
										<figure class="effect-jazz mb-0">
											<a href="detail.php?product/=<?php echo $data['product_name'] ?>"><img src="../front-end/uploadimg/<?php echo $data['product_image'] ?>" class="w-100" alt="abc"></a>
										</figure>
									</div>
								</div>
								<div class="prod_2i2 pb-2 clearfix">
									<h6 class="mt-3"><a href="detail.php?product/=<?php echo $data['product_name'] ?>"><?php echo $data['product_name'] ?></a></h6>
									<h6 class="fw-normal mt-2">Rs. <?php echo $data['product_price'] ?></h6>
								</div>
								<div class="prod_2i3 clearfix position-absolute">
									<h6 class="bg_yell d-inline-block pt-1 pb-1 font_13 text-white ps-3 pe-3">NEW</h6>
								</div>
							</div>
						</div>
				<?php
					}
				}
				?>

			</div>
		</div>
	</section>

	<section id="deal" class="pt-4 bg-light">
		<div class="container-fluid">
			<div class="row deal_1">
				<div class="col-md-8 col-lg-4">
					<div class="deal_1l position-relative clearfix">
						<div class="clearfix deal_1li">
							<div class="grid clearfix">
								<figure class="effect-jazz mb-0">
									<a href="./shop.php"><img src="img/sidepic.jpeg" height="584" class="w-100" alt="abc"></a>
								</figure>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12  col-lg-8">
					<div class="deal_1r">
						<div class="deal_1r1 row">
							<div class="col-md-6">
								<div class="deal_1r1l">
									<h4 class="mb-0">DEAL OF THE DAY</h4>
								</div>
							</div>
							<div class="col-md-6">
								<div class="deal_1r1r text-end">
									<h6 class="mb-0"><a class="col_yell" href="shop.php" type="submit"><i class="fa fa-caret-right"></i> View All</a></h6>
								</div>
							</div>
						</div>
						<div class="row prod_2 text-center">
							<?php
							$select = "select * from products where product_category = 3 limit 4";
							$result = mysqli_query($connection, $select);
							if (mysqli_num_rows($result) > 0) {
								while ($data = mysqli_fetch_array($result)) {
							?>
									<div class="col-md-3">
										<div class="prod_2im position-relative clearfix">
											<div class="prod_2i1 clearfix">
												<div class="grid clearfix">
													<figure class="effect-jazz mb-0">
														<a href="detail.php?product/=<?php echo $data['product_name'] ?>"><img src="../front-end/uploadimg/<?php echo $data['product_image'] ?>" class="w-100" alt="abc"></a>
													</figure>
												</div>
											</div>
											<div class="prod_2i2 pb-2 clearfix">
												<h6 class="mt-3"><a href="detail.php?product/=<?php echo $data['product_name'] ?>"><?php echo $data['product_name'] ?></a></h6>
												<h6 class="fw-normal mt-2">Rs. <?php echo $data['product_price'] ?></h6>
											</div>
											<div class="prod_2i3 clearfix position-absolute">
												<h6 class="bg_yell d-inline-block pt-1 pb-1 font_13 text-white ps-3 pe-3">50%</h6>
											</div>
										</div>
									</div>
							<?php
								}
							}
							?>

						</div>
						<div class="row prod_2 text-center mt-4">
							<?php
							$select = "select * from products where product_category = 4 limit 4";
							$result = mysqli_query($connection, $select);
							if (mysqli_num_rows($result) > 0) {
								while ($data = mysqli_fetch_array($result)) {
							?>
									<div class="col-md-3">
										<div class="prod_2im position-relative clearfix">
											<div class="prod_2i1 clearfix">
												<div class="grid clearfix">
													<figure class="effect-jazz mb-0">
														<a href="detail.php?product/=<?php echo $data['product_name'] ?>"><img src="../front-end/uploadimg/<?php echo $data['product_image'] ?>" class="w-100" alt="abc"></a>
													</figure>
												</div>
											</div>
											<div class="prod_2i2 pb-2 clearfix">
												<h6 class="mt-3"><a href="detail.php?product/=<?php echo $data['product_name'] ?>"><?php echo $data['product_name'] ?></a></h6>
												<h6 class="fw-normal mt-2">Rs. <?php echo $data['product_price'] ?></h6>
											</div>
											<div class="prod_2i3 clearfix position-absolute">
												<h6 class="bg_yell d-inline-block pt-1 pb-1 font_13 text-white ps-3 pe-3">50%</h6>
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
			</div>
		</div>
	</section>

	<section id="prod_o" class="pt-4 pb-4">
		<div class="container-xl">
			<div class="row prod_1 mb-4 text-center">
				<div class="col-md-12">
					<h6 class="h_line font_13">EXCLUSIVE COLLECTION</h6>
					<h2 class="mb-0 col_yell mt-3">BEST SELLING PRODUCTS</h2>
				</div>
			</div>

			<div class="prod_o2 row mt-4">
				<div class="tab-content">
					<div class="tab-pane active" id="home">
						<div class="prod_o2i row">

							<?php
							$select = "select * from products where product_category = 7 limit 4";
							$result = mysqli_query($connection, $select);
							if (mysqli_num_rows($result) > 0) {
								while ($data = mysqli_fetch_array($result)) {
							?>
									<div class="col-md-3">
										<div class="prod_2im position-relative clearfix text-center">
											<div class="prod_2i1 clearfix">
												<div class="grid clearfix">
													<figure class="effect-jazz mb-0">
														<a href="detail.php?product/=<?php echo $data['product_name'] ?>"><img src="../front-end/uploadimg/<?php echo $data['product_image'] ?>" class="w-100" alt="abc"></a>
													</figure>
												</div>
											</div>
											<div class="prod_2i2 pb-2 clearfix">
												<h6 class="mt-3"><a href="detail.php?product/=<?php echo $data['product_name'] ?>"><?php echo $data['product_name'] ?></a></h6>
												<h6 class="fw-normal mt-2">Rs. <?php echo $data['product_price'] ?></h6>
											</div>
											<div class="prod_2i3 clearfix position-absolute">
												<h6 class="bg_yell d-inline-block pt-1 pb-1 font_13 text-white ps-3 pe-3">40%</h6>
											</div>
										</div>
									</div>
							<?php
								}
							}
							?>
						</div>
						<div class="prod_o2i row mt-4">

							<?php
							$select = "select * from products where product_category = 5 limit 4";
							$result = mysqli_query($connection, $select);
							if (mysqli_num_rows($result) > 0) {
								while ($data = mysqli_fetch_array($result)) {
							?>
									<div class="col-md-3">
										<div class="prod_2im position-relative clearfix text-center">
											<div class="prod_2i1 clearfix">
												<div class="grid clearfix">
													<figure class="effect-jazz mb-0">
														<a href="detail.php?product/=<?php echo $data['product_name'] ?>"><img src="../front-end/uploadimg/<?php echo $data['product_image'] ?>" class="w-100" alt="abc"></a>
													</figure>
												</div>
											</div>
											<div class="prod_2i2 pb-2 clearfix">
												<h6 class="mt-3"><a href="detail.php?product/=<?php echo $data['product_name'] ?>"><?php echo $data['product_name'] ?></a></h6>
												<h6 class="fw-normal mt-2">Rs. <?php echo $data['product_price'] ?></h6>
											</div>
											<div class="prod_2i3 clearfix position-absolute">
												<h6 class="bg_yell d-inline-block pt-1 pb-1 font_13 text-white ps-3 pe-3">40%</h6>
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
			</div>

			<div class="arrive row mt-4 me-0 ms-0 position-relative">
				<div class="arrive_m text-center col-md-12">
					<div class="position-absolute" style="inset: 0;">
						<img src="img/slider1.jpeg" alt="" width="100%" height="100%">
					</div>
					<h6 class="text-uppercase bg_blue ps-3 pe-3 pt-2 pb-2 d-inline-block text-white font_13">New Arrival
					</h6>
					<h1 class="text-uppercase mt-3 text-white"><span class="fw-normal">Top deal</span> <br> New
						Accessories</h1>
					<p class="mt-3 text-light">Get up to <span class="col_yell fw-bold">50%</span> off Today Only</p>
					<h6 class="text-uppercase mt-4 mb-0"><a class="button" href="detail.html">SHOP NOW</a></h6>
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