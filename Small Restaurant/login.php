
<?php
session_start();
extract($_SESSION);
extract($_GET);

if (isset($activeUser)){
header('location:home.php');
die();}



?>

	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Pasta Express</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/jquery-ui.css">
			<link rel="stylesheet" href="css/nice-select.css">
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body onload="loding()" >
		<?php  require('navBar.php'); ?>

			<!-- start banner Area -->
			<section class="about-banner relative">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">

							<p class="text-white link-nav"><a href="home.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="menu.php"> Menus</a></p><br>
							<?php if (isset($error) && $error==333) {
								echo "<h3 class='text-white' >login fisrt !!! </h3>";
								echo "<br/>";}  ?>
						</div>
					</div>
				</div>
			</section>
			<!-- End banner Area -->



									<!-- Start Login Area -->
									<section class="reservation-area section-gap relative">
										<div class="overlay overlay-bg"></div>
										<div class="container">
											<div class="row justify-content-between align-items-center">
												<div class="col-lg-6 reservation-left">
													<h1 class="text-white">Logging</h1>

												</div>
												<div class="col-lg-5 reservation-right">
													<form   method="post" class="form-wrap text-center" action="loginCheck.php">

														<?php
															if (isset($error) && $error==201) {
																echo "<h5 style='color:Tomato;' >*Error with password  or username</h5>";
																echo "<br/>";}  ?>

														<input type="text" class="form-control" name="username" placeholder="Your userName" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your userName'" >
														<input type="password" class="form-control" name="password" placeholder="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'password'" >

															<input class="primary-btn text-uppercase mt-20" type="submit" name="Login_btn" value="Login">

													</form>
												</div>
											</div>
										</div>
									</section>
									<!-- End Login Area -->



			<!-- start footer Area -->
			<?php require('footerArea.php') ?>

			<!-- End footer Area -->

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="js/popper.min.js"></script>
			<script src="js/vendor/bootstrap.min.js"></script>
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
 			<script src="js/jquery-ui.js"></script>
  			<script src="js/easing.min.js"></script>
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>
			<script src="js/jquery.nice-select.min.js"></script>
			<script src="js/owl.carousel.min.js"></script>
            <script src="js/isotope.pkgd.min.js"></script>
			<script src="js/mail-script.js"></script>
			<script src="js/main.js"></script>
		</body>
	</html>
