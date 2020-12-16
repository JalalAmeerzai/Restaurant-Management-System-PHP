<?php
session_start();
extract($_SESSION);
// error=108 >> email  already used
// error=107 >> username  already used
// error=106 >> invaild phone number
// error=105 >> invaild email
// error=104 >> invaild name
// error=103 >> invaild password
// error=102 >> invaild username
// error=101>> did not register for some reason
// error=100 >> password dont match
// error=99 >> no errors , succssful

extract($_GET);
if (isset($activeUser)) {
  header('location:Register.php?error=102');
}

$errorMassage="";
if (isset($error) && $error==100) {
	$errorMassage="password dont match.";
		echo "<br/>";}
if (isset($error) && $error==101) {
	$errorMassage="Error while regisrering you, Please try again.";
		echo "<br/>";}
if (isset($error) && $error==102) {
	$errorMassage="invaild username ";
		echo "<br/>";}
if (isset($error) && $error==103) {
	$errorMassage="invaild password ";
		echo "<br/>";}
if (isset($error) && $error==104) {
	$errorMassage= "invaild name";
			echo "<br/>";}
if (isset($error) && $error==105) {
	$errorMassage= "invaild email";
				echo "<br/>";}
if (isset($error) && $error==106) {
	$errorMassage= "invaild phone number";
		echo "<br/>";}
if (isset($error) && $error==107) {
	$errorMassage="username  already used";
		echo "<br/>";}
		if (isset($error) && $error==108) {
			$errorMassage= " email  already used";
				echo "<br/>";}

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
		<title>Macro</title>

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
			
		<!-- navegation bar -->
		<?php  require('navBar.php'); ?>

      <!-- start banner Area -->
      <section class="about-banner relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
          <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
              <h1 class="text-white">
                <!-- start error handling  -->
                 <!-- End error handling -->

                Sign up
              </h1>
            </div>
          </div>
        </div>
      </section>
      <!-- End banner Area -->


<?php
if (!isset($activeUser)) {
 ?>
						<!-- Start Sign up Area -->
						<section class="reservation-area section-gap relative">
							<div class="overlay overlay-bg"></div>
							<div class="container">
								<div class="row justify-content-between align-items-center">
									<div class="col-lg-6 reservation-left">
										<h1 id="signup"  class="text-white">Signing up...</h1>
										<br>

														<!-- Trigger/Open The Modal -->
														<b  class="text-white mt-20 ">Already have an account?</b> <br>
														<button  class="btn" onclick="show()" id="myBtn">Login</button>
													     	<!-- The Modal -->
														    <div id="myModal" class="modal">
														       	<!-- Modal content -->
														         	<div class="modal-content">
																						<span onclick="hide()"class="close">&times;</span>
													                    <form   method="post" class="form-wrap text-center" action="loginCheck.php">
																									<input type="text" class="form-control" name="username" placeholder="Your userName" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your userName'" >
																									<input type="password" class="form-control" name="password" placeholder="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'password'" >
																									<input class="primary-btn text-uppercase mt-20" type="submit" name="Login_btn" value="Login">
																							 </form>
																	  	  </div>
															  	</div> 












										<p class="text-white pt-20">
										</p>
									</div>
									<div  class="col-lg-5 reservation-right">

										<form   method="post" class="form-wrap text-center" action="RegisterCheck.php">

                                      <?php
                                     
                                          echo "<h3 style='color:Tomato;'>$errorMassage</h3>";
                                          echo "<br/>"; 

                                       ?>
																			 <h4 id="FormMassage" style='color:Tomato;' ></h4>
											<input  type="text" id="username" onkeyup="testUserName()"class="form-control" name="username" placeholder="Your userName" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your userName'"  required>
											<input type="password" id="password" onkeyup="testPass()" class="form-control" name="password" placeholder="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'password'" required>
											<input type="password" id="confpassword" onkeyup="testConfPass()" class="form-control" name="conf_password" placeholder="conform password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'conform password'" required>
											<input type="text"  id="name"  onkeyup="testName()" class="form-control" name="name" placeholder="Your Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Name'" required>
											<input type="email" id="email"  onkeyup="testEmail()"  class="form-control" name="email" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address'" required>
											<input type="text" id="phone" onkeyup="testPhone()" class="form-control" name="phoneNumber" placeholder="Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number'" required>
											<input type="hidden" id="JSEnable" name="javaScript" value="fales" >

												<input  id="submit-btn"  class="primary-btn text-uppercase mt-20" type="submit" name="Register_btn"  disabled value="Register">

										</form>
									</div>
								</div>
							</div>
						</section>
						<!-- End Registeration Area -->
<?php } ?>



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
			<script  language="JavaScript"  src="checkInputSinUp.js" ></script>

		</body>
	</html>
