<?php
session_start();
extract($_SESSION);
// error=112 >> pic succssful updated
// error=111 >> pic type should be(png,jpeg,ipg,pjpeg) and size up to 10M
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
extract($_POST);
try{
require('connection.php');
	$sql="select * from websitetexts";
	$texts=$db->query($sql);
	$db=NULL;
}catch(PDOException $e){ die($e->getMessage());}


if(!isset($_SESSION['logo'])){
try{
	require('connection.php');
	$sql5="SELECT  textField from websitetexts where textName='logo' ";
	$rs5=$db->query($sql5);
	$db=NULL;
	}catch(PDOException $e){ die($e->getMessage());}
foreach ($rs5 as $key) {
	$logo=$key['textField'];

}
$_SESSION['logo']=$logo;
}
 ?>



	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>

	<script  language="JavaScript"  src="checkInputSinUp.js" ></script>
	<script  language="JavaScript"  src="search.js" ></script>
	<script type="text/javascript" src="//w.24timezones.com/l.js" async></script>


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
			<section class="banner-area">
				<div class="container">
					<div class="row fullscreen align-items-center justify-content-between">
						<div class="col-lg-12 banner-content">
								<?php
								if (isset($activeUser) && isset($user_name)) {
									echo "<h3 class='text-white' >Weclome $user_name </h3>";
									echo "<br/>";
								}

                    if (isset($error) && $error==99 && isset($user_name)) {
                        echo "<h3 class='text-white' >Thanks for sign up in our webside $user_name</h3>";
                          echo "<br/>"; }
                    if (isset($error) && $error==102  && isset($user_name)) {
                      echo "<h3 class='text-white' >you are already sign up $user_name</h3>";
                       echo "<br/>";}
                    if (isset($error) && $error==111 ) {
                      echo "<h3 class='text-white' >pic type should be(png,jpeg,ipg,pjpeg) and size up to 10M</h3>";
                       echo "<br/>";}
                    if (isset($error) && $error==112 ) {
                      echo "<h3 class='text-white' >Succssful updated</h3>";
											 echo "<br/>";}
											 if (isset($error) && $error==404) {
												echo "<h3 class='text-white'>Erroe!</h3>";
												echo "<br/>"; }



								 ?>


							<h6 class="text-white">Wide Options of Choice</h6>
							<h1 class="text-white">Delicious Recipes</h1>
							<p id="homeP1"  class="text-white">
							<?php
								if(isset($homeP11) && trim($homeP11)!=null )
								{
									try{
									require('connection.php');
									$sql2="update websitetexts set textField='$homeP11' where textName='homeP1' ";
									$db->exec($sql2);
									$db=NULL;
									}catch(PDOException $e){ die($e->getMessage());}

								}

							foreach($texts as $text){

								if($text['textName']=='homeP1')
									$homeP1=$text['textField'];
							}


								if(isset($user_type) && $user_type=='admin'){

									?>

									<form  id="homeP1forn" action="" method = "POST">

									<textarea class="homeP1text" id="123"rows="2" cols="50" name="homeP11" ><?php 	echo "$homeP1"; ?> </textarea> <br/>
									<input id="123"  class="primary-btn text-lowercase " type="submit" value="Edit text">
									</form>

									<?php
									}
									else 	echo "$homeP1";
							?>


							</p>
							<?php if(isset($activeUser)&&$user_type=='customer'){?>
							<a href="menu.php" class="primary-btn text-uppercase">Check Our Menu</a>
							<?php } ?>

							<?php if(isset($activeUser)&&$user_type=='staff'){?>
							<a href="disblay_orders.php" class="primary-btn text-uppercase">orders</a>

							<?php } ?>

															<?php 	try{
									require('connection.php');
									$sql5="SELECT  textField from websitetexts where textName='logo' ";
									$rs5=$db->query($sql5);
									$db=NULL;
									}catch(PDOException $e){ die($e->getMessage());}
								foreach ($rs5 as $key) {
									$logo=$key['textField'];
								}
								?>

						<?php if(isset($user_type) && $user_type=='admin'){ ?>
									<form class="" action="checkLogo.php" method="post" enctype="multipart/form-data">
										<input class="upload" type="file"  name="PicToBeUplode" id="file">
										<input class="primary-btn" type="submit" name="picBtn" value="Change restaurant logo">
									</form>

								<?php } ?>
						</div>
					</div>
				</div>
				<?php if(isset($activeUser)&&$user_type=='admin'){
					//error massge for add admin and staff and delete them
					if (isset($error) && $error==313 ) {
						echo "<h3 class='text-white' >  the  admin  was added succssful</h3>";
						 echo "<br/>";}
						 if (isset($error) && $error==212 ) {
							 echo "<h3 class='text-white' >  the  staff  was added succssful</h3>";
								echo "<br/>";}
								if (isset($error) && $error==414 ) {
								 echo "<h3 class='text-white' >  the  admin or staff   was deleded succssful</h3>";
									echo "<br/>";}	?>


				<form  align='center' method="post" class="navbar-form" action="editAdmin.php">
				<h4 id="FormMassage1" style='color:Tomato;' ></h4>
				<input type="text"   onkeyup="check_Customer(this.value)" class="form-control" name="UserName" placeholder=" User Name"  required>
				<input  class="primary-btn text-uppercase" type="submit" name="addstaff" value="add staff">
				<input  class="primary-btn text-uppercase" type="submit" name="addadmin" value="add admin">
				<input  class="primary-btn text-uppercase" type="submit" name="delete" value="delete admin or staff">
				</form>

			<?php } ?>
			</section>
			<!-- End banner Area -->



<?php
if (!isset($activeUser)) {
 ?>
						<!-- Start Registeration Area -->
						<section class="reservation-area section-gap relative">
							<div class="overlay overlay-bg"></div>
							<div class="container">
								<div class="row justify-content-between align-items-center">
									<div class="col-lg-6 reservation-left">
										<h1 class="text-white">sign up now.</h1> <br>
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

									</div>
									<div class="col-lg-5 reservation-right">
										<form   method="post" class="form-wrap text-center" action="RegisterCheck.php">
										      <h4 id="FormMassage" style='color:Tomato;' ></h4>
											<input  type="text" id="username" onkeyup="testUserName()"class="form-control" name="username" placeholder="Your userName" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your userName'"  required>
											<input type="password" id="password" onkeyup="testPass()" class="form-control" name="password" placeholder="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'password'" required>
											<input type="password" id="confpassword" onkeyup="testConfPass()" class="form-control" name="conf_password" placeholder="conform password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'conform password'" required>
											<input type="text"  id="name"  onkeyup="testName()" class="form-control" name="name" placeholder="Your Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Name'" required>
											<input type="email" id="email"  onkeyup="testEmail()"  class="form-control" name="email" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address'" required>
											<input type="text" id="phone" onkeyup="testPhone()" class="form-control" name="phoneNumber" placeholder="Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number'" required>
											<input type="hidden" id="JSEnable" name="javaScript" value="fales" >

												<input  id="submit-btn"  class="primary-btn text-uppercase mt-20" type="submit" name="Register_btn" value="Register">


										</form>
									</div>
								</div>
							</div>
						</section>
						<!-- End Registeration Area -->
<?php } ?>

			<!-- Start home-about Area -->

			<!-- End home-about Area -->


			<!-- Start review Area -->




			<?php
			// Gettting Revew

			?>
			<section class="review-area section-gap">
				<?php


				// Gettting offers
				try{
					require('connection.php');
					$sql="SELECT * from offers  ";
					$rs3=$db->query($sql);
					$db=NULL;
				}
				catch(PDOException $e){ die($e->getMessage());}

				?>

				<section class="review-area section-gap">
					<?php if (isset($error) && $error==909 ) {
						echo "<h3 align='center' style='color:Tomato  ;'>uploading the offer img was succssful</h3>";
						 echo "<br/>";} ?>
					<div class="container">
						<div class="row">
							<div class="active-review-carusel">

								<?php foreach ($rs3 as $key ){

									echo '<div class="single-review">';
									echo '<img src='.$key['img'] .' height="300" width="300">';

									echo'</div>';
								} ?>
							</div>
						</div>
					</div>
					<?php if(isset($activeUser)&&$user_type=='admin'){ ?>
					<form align='center'  action="offer.php" method="post" enctype="multipart/form-data">
				   	<input  class="upload" type="file"  class="genric-btn " name="img">
						<input type="submit"  name='add' value="add" class="genric-btn primary">
					</form>
				<?php } ?>
			</section>
			<!-- End review Area -->


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
			<script  language="JavaScript"  src="CheckCustomer.js" ></script>

		</body>
	</html>
