
<?php
session_start();
extract($_SESSION);
extract($_GET);

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
		<body onload="loding()">
					<!-- navegation bar -->
		<?php  require('navBar.php'); ?>


			<!-- start banner Area -->
			<section class="relative about-banner">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Contact Us
							</h1>
							<p class="text-white link-nav"><a href="home.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="contact.php"> Contact Us</a></p>
							<?php
								if (isset($error) && $error==555) {
									echo "<h3 class='text-white'>sucsssfull</h3>";
									echo "<br/>"; }
							if (isset($error) && $error==666) {
										echo "<h3 class='text-white'>Error</h3>";
										echo "<br/>"; }

					
								 ?>
						</div>
					</div>
				</div>
			</section>
			<!-- End banner Area -->

			<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap">
				<div class="container">
					<div class="row">

						<div class="col-lg-4 d-flex flex-column address-wrap">
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-home"></span>
								</div>
								<div class="contact-details">
									<h5>Bahrain Is-Town </h5>
									<p>
									Road No 1403
									</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-phone-handset"></span>
								</div>
								<div class="contact-details">
									<h5>17224446</h5>
									<p>Sunday to Thursday 8 am to 2 pm</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-envelope"></span>
								</div>
								<div class="contact-details">
									<h5>support@Pasta.com</h5>
									<p>Send us your query anytime!</p>
								</div>
							</div>
						</div>
						<div class="col-lg-8">
							<form class="form-area contact-form text-right"  action="customer_messages.php" method="post">
								<div class="row">
									<div class="col-lg-6 form-group">
										<input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required type="text">

										<input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required type="email">

										<input name="subject" placeholder="Enter subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter subject'" class="common-input mb-20 form-control" required type="text">
									</div>
									<div class="col-lg-6 form-group">
										<textarea class="common-textarea form-control" name="message" placeholder="Enter Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Messege'" required></textarea>
									</div>
									<div class="col-lg-12">
										<div class="alert-msg" style="text-align: left;"></div>
										<input type="submit" name="submit" value="Send Message" style="float: right;" class="genric-btn primary" /> 
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
			<!-- End contact-page Area -->

			<!-- start footer Area -->
			<footer class="footer-area">
				<div class="footer-widget-wrap">
					<div class="container">
						<div class="row section-gap">
							<div class="col-lg-4  col-md-6 col-sm-6">
								<div class="single-footer-widget">
									<h4>Opening Hours</h4>
									<ul class="hr-list">
										<li class="d-flex justify-content-between">
											<span> branch 1:  </span> <span>11.00 am - 12.30 am</span>
										</li>
										<li class="d-flex justify-content-between">
											<span>branch 2: </span> <span>11.00 am - 11.00 pm</span>
										</li>
										<li class="d-flex justify-content-between">
											<span>branch 3: </span> <span>11.00 am - 12.15 am</span>
										</li>
									</ul>
								</div>
							</div>
							<div class="col-lg-4  col-md-6 col-sm-6">
								<div class="single-footer-widget">
									<h4>Contact Us</h4>
									<p>
									 branch 1:	Bahrain,arad Avenue 29 <br><br>
									 branch 2:	Bahrain,Muharraq,Sh Khalifa Bin Salman Avenue <br><br>
									 branch 3:	Bahrain,Jad Ali - Isa Town Avenue 1403 <br>
									</p>
									<p class="number">
									 17001002
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>

			</footer>
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
