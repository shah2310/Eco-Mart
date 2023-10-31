<?php
include('./includes/config.php');
if (isset($_POST['msg-btn'])) {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$msg = $_POST['msg'];

	$insert = "insert into messages (firstname, lastname, email, phone, message)
	values ('$fname', '$lname', '$email', $phone, '$msg')";

	mysqli_query($connection, $insert);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Eco Mart | Contact</title>
	<link rel="icon" type="image/x-icon" href="./uploadimg/fav-icon.png">

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/global.css" rel="stylesheet">
	<link href="css/contact.css" rel="stylesheet">
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
					<h1>CONTACT US</h1>
					<h6 class="d-inline-block  font_14 col_yell bg-white"><a class="col_light" href="#">Home</a> <span class="me-2 ms-2">/</span> Contact Us</h6>
				</div>
			</div>
		</div>
	</section>

	<section id="contact" class="pt-4 pb-4 bg_light_1">
		<div class="container-xl">
			<div class="row contact_1 ">
				<div class="col-md-4">
					<div class="contact_1i text-center  bg-white">
						<span class="bg_yell text-white fs-2 span_1"><i class="fa fa-map-marker"></i></span>
						<h5 class="mt-3">Our Location</h5>
						<p class="mb-0 mt-3"><a href="https://www.google.com/maps/place/Aptech+Computer+Education+North+Karachi+Center/@24.9819629,67.0626888,17z/data=!3m1!4b1!4m6!3m5!1s0x3eb340e584b891c3:0x29b2cbc198ba2dbd!8m2!3d24.9819581!4d67.0652637!16s%2Fg%2F1q62dtbrn?entry=ttu" target="_blank">A-563 Shahrah-e-Usman, Sector 11-A North Karachi, Karachi, 75850.</a></p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="contact_1i text-center  bg-white">
						<span class="bg_yell text-white fs-2 span_1"><i class="fa fa-envelope"></i></span>
						<h5 class="mt-3">Our Email</h5>
						<p class="mb-0 mt-3"><span class="fw-bold">Email Us:</span><br> <a href="mailto:team@gmail.com">team@gmail.Com</a></p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="contact_1i text-center  bg-white">
						<span class="bg_yell text-white fs-2 span_1"><i class="fa fa-phone"></i></span>
						<h5 class="mt-3">Contact Number</h5>
						<p class="mb-0 mt-4"><a href="tel:021-36930102">021-36930102</a></p>
						
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="contact_o" class="pt-4 pb-4">
		<div class="container-xl">
			<div class="row prod_1 mb-4 text-center">
				<div class="col-md-12">
					<h6 class="h_line font_13">LET’S TALK</h6>
					<h2 class="col_yell mt-3">SEND US A MASSAGE</h2>
					<p class="mb-0">We are always happy to talk with you. Be sure to write to us if you have any <br> questions or need help and support.</p>
				</div>
			</div>
			<div class="row contact_o1">
				<div class="col-md-6">
					<form class="contact_o1l" method="post">
						<div class="contact_o1li row">
							<div class="col-md-6">
								<div class="contact_o1lil">
									<div class="input-group p-2 bg_light">
										<input type="text" class="form-control border-0 bg-transparent" placeholder="First Name*" name="fname" required>
										<span class="input-group-btn">
											<button class="btn btn-primary bg-transparent border-0 fs-6" type="button">
												<i class="fa fa-user col_light"></i> </button>
										</span>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="contact_o1lil">
									<div class="input-group p-2 bg_light">
										<input type="text" class="form-control border-0 bg-transparent" placeholder="Last Name*" name="lname" required>
										<span class="input-group-btn">
											<button class="btn btn-primary bg-transparent border-0 fs-6" type="button">
												<i class="fa fa-user col_light"></i> </button>
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="contact_o1li row mt-3">
							<div class="col-md-6">
								<div class="contact_o1lil">
									<div class="input-group p-2 bg_light">
										<input type="email" class="form-control border-0 bg-transparent" placeholder="Your Email*" name="email" required>
										<span class="input-group-btn">
											<button class="btn btn-primary bg-transparent border-0 fs-6" type="button">
												<i class="fa fa-envelope col_light"></i> </button>
										</span>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="contact_o1lil">
									<div class="input-group p-2 bg_light">
										<input type="number" class="form-control border-0 bg-transparent" placeholder="Phone*" name="phone" required>
										<span class="input-group-btn">
											<button class="btn btn-primary bg-transparent border-0 fs-6" type="button">
												<i class="fa fa-phone col_light"></i> </button>
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="contact_o1li row mt-3">
							<div class="col-md-12">
								<div class="contact_o1lil">
									<textarea placeholder="Enter Your Message" class="form-control bg_light border-0 form_area" name="msg"></textarea>
									<button class="mb-0 mt-4 button border-0" name="msg-btn">SUBMIT</button>
								</div>
							</div>

						</div>
					</form>
				</div>
				<div class="col-md-6">
					<div class="contact_o1r">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3616.534049991727!2d67.06268877535322!3d24.981962940385003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb340e584b891c3%3A0x29b2cbc198ba2dbd!2sAptech%20Computer%20Education%20North%20Karachi%20Center!5e0!3m2!1sen!2s!4v1698514706803!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
	</script>

</body>

</html>