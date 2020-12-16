<?php
 // error=111 >> pic type should be(png,jpeg,ipg,pjpeg) and size up to 10M
// error=110 >> NO change in data
// error=109 >> Old password is not currect
// error=108 >> email  already used
// error=106 >> invaild phone number
// error=105 >> invaild email
// error=104 >> invaild name
// error=103 >> invaild password
// error=102 >> invaild username
// error=101>> did not register for some reason
// error=100 >> password dont match
// error=99 >> no errors , succssful
session_start();
extract($_GET);
extract($_SESSION);
if (!isset($activeUser)){
	header('location:home.php');
	die();}


	try{
		// getting user details
		require('connection.php');
		$user_SQL="select * from users where user_id='$activeUser' ";
		$user_recored=$db->query($user_SQL);
		$user=$user_recored->fetch();

		$ID=$user['user_id'];
		$name=$user['name'];
		$username=$user['user_name'];
		$email=$user['email'];
		$phone=$user['phone_number'];
		$type=$user['user_type'];
		$pic=$user['userPic'];


		//getting number of orders for user
		$orderCount_SQL="SELECT COUNT(*) oc FROM orders  where user_id='$activeUser' ";
		$resule=$db->query($orderCount_SQL);
		$row=$resule->fetch();
		$order_count=$row['oc'];




		$address_SQL="select * from address where user_id='$activeUser' ";
		$address_recored=$db->query($address_SQL);

	}
	catch(PDOException $e){ 
		header('location:Profile.php');
		die();;}










?>

	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
	<script  language="JavaScript"  src="CheckProfileInfo.js" ></script>

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

		</head >
		<body onload="loding()">
	
<header id="header">
<script  language="JavaScript"  src="search.js" ></script>


				<div class="header-top">
					<div class="container">
				  		<div class="row justify-content-center">
                <div id="logo">
								<a href="home.php"><img src="imgs/<?php echo $logo ?>" width="70" height="60" alt="" title="" /></a>                </div>
				  		</div>
					</div>
				</div>
				<div class="container main-menu">
					<div class="row align-items-center justify-content-center d-flex">
				      <nav id="nav-menu-container">
				        <ul class="nav-menu" style="list-style-type:none;" >
				          <li><a href="home.php">Home</a></li>
									<li><a href="menu.php">Menu</a></li>
									<?php if(isset($user_type) && $user_type=='admin'){?>
									<li><a href="ViewCustomerMsg.php">Contact massages</a></li>
									<?php }else  {?>
								<li><a href="contact.php">Contact us</a></li>
									<?php }?>

									<?php
									if (!isset($activeUser)){
									echo "<li><a href='login.php'>Login</a></li>";
                  echo "<li><a href='Register.php'>sign up</a></li>";
                }
									else{ ?>
                <li><a href='disblay_orders.php'>orders</a></li>
								<?php if($user_type=='customer'){ ?>
								<li><a href='viewcart.php'>View cart <span style=" font-size:130%; color:white; background-color:red; border-radius:60%;"><?php if(isset($qty)) echo "01"; ?></span> </a></li>
							<?php } ?>
								<li><a href='logout.php'>Logout</a></li>
								<li><a href='Profile.php'>Profile</a></li>

							<?php }
									?>
									<!--  -->
							   <li style="list-style-type:none;">

										<input type="search" id="searchBar"  class="search fa-search " autocomplete="off"    onkeyup="search1(this.value)" type="text" placeholder="Search" name="search">
										<br/>

										<form  id="searchForm" action="menu.php" method="get" class="searchText">

										<button type="submit" name="searchResult" value="" class="search-btn" id='L1'></button> <br/>
										<button type="submit" name="searchResult" value="" class="search-btn" id='L2'></button> <br/>
										<button type="submit" name="searchResult" value="" class="search-btn" id='L3'></button> <br/>
										<button type="submit" name="searchResult" value="" class="search-btn" id='L4'></button> <br/>
										<button type="submit" name="searchResult" value="" class="search-btn" id='L5'></button> <br/>



									</form>

									</li>



				        </ul>
				      </nav><!-- #nav-menu-container -->
					</div>
				</div>
			</header><!-- #header -->

<!-- start banner Area -->

<section class="about-banner relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
          <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
              <h1 class="text-white">
                <!-- start error handling  -->

								<?php  $errorMassage="";
														if (isset($error) && $error==100) {
															$errorMassage="password dont match.";
																echo "<br/>";}
														if (isset($error) && $error==101) {
															$errorMassage="Error while updateing your data, Please try again.";
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

															if (isset($error) && $error==108) {
																$errorMassage= " email  already used";
																	echo "<br/>";}
														if (isset($error) && $error==109) {
															$errorMassage="curent password is not currect .";
                                                                      echo "<br/>";}
                                if (isset($error) && $error==110) {
                                $errorMassage="No change in data .";
																		 echo "<br/>";}
														 if (isset($error) && $error==111) {
															$errorMassage="pic type should be(png,jpeg,ipg,pjpeg) and size up to 10M .";
																	 echo "<br/>";}

																if (isset($error) && $error==99) {
																	$errorMassage="Succssfully .";
																		echo "<br/>";}


																		 echo "<h3 style='color:Tomato;'>$errorMassage</h3>";
																		 echo "<br/>";

																		 if(!isset($error))
																		 echo "<h1 class='text-white'> User Profile </h1>";
																	?>


                 <!-- End error handling -->

              </h1>
            </div>
          </div>
        </div>
      </section>
			<!-- End banner Area -->
	<section class="reservation-area section-gap relative">
					<div class="overlay overlay-bg"></div>
					<div class="container">
						<div class="row justify-content-between align-items-center">
						<div class="container emp-profile">
		<div class="row">
			<div class="col-md-4">
				<div class="profile-img">


					<img src="<?php echo $pic; ?>" alt="Profile Pic"/>

				</div>
			</div>
			<div class="col-md-6">
				<div class="profile-head ">
							<h5>
							<?php echo $name; ?>
							</h5>
							<br>
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="home-tab"  onclick="userPic(1)" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" onclick="userPic(2)" aria-controls="profile" aria-selected="false">Edit Profile</a>
						</li>

					</ul>
				</div>
			</div>
			<div class="col-md-2">
			<!-- <a href="Edit_Profile.php?">
			<input type="button" value="Edit Profile" name="EditProfileBtn" class="profile-edit-btn">  </a> -->
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
			<div class="profile-work">
				<br>
			 <div  id="profilePicDiv" class="custom-file-upload" style="display:none; position: absolute;">
			 <form  method="post" class="form-wrap text-center" action="ProfilePic.php" enctype="multipart/form-data">
					<input class="upload" type="file"  name="PicToBeUplode" id="file">
					<input  id=""  class="primary-btn mt-10" type="submit" name="picBtn" value="Change Profile Picture">


					</form>
						</div>
         <br>
			<br><br><br>


			<div  id="addressDiv"style="display:none; position: absolute;">
											<form   method="post" class="form-wrap text-center" action="AddAddress.php">
										  <p> Address: </p> <textarea  class="form-control" name="address_dec"cols="30" rows="2" require> </textarea>
											<p> Notes:</p> <span><input  type="text"  col="4"  class="form-control"name="address_notes"  require id=""></span>

											<input  id="address-btn"  class="primary-btn mt-10" type="submit" name="address_Btn" value="Add Address">
									  </form>

											</div>

    </div>

			</div>
			<div class="col-md-8">
				<div class="tab-content profile-tab" id="myTabContent">
					<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
								<div class="row">
									<div class="col-md-6">
										<label>Username</label>
									</div>
									<div class="col-md-6">
										<p> <?php echo $username; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label>Name</label>
									</div>
									<div class="col-md-6">
										<p> <?php echo $name; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label>Email</label>
									</div>
									<div class="col-md-6">
										<p> <?php  echo $email; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label>Phone</label>
									</div>
									<div class="col-md-6">
										<p> <?php  echo  $phone ;?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label>Type</label>
									</div>
									<div class="col-md-6">
										<p> <?php echo $type; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label>Number of orders</label>
									</div>
									<div class="col-md-6">
										<p> <?php echo $order_count; ?></p>
									</div>
								</div>
								<br>
								<br>
								<div class="row">
								<div >
										<table>

										<th colspan="2" >Saved Addresses </th>


										<?php
										$c=0;
										foreach($address_recored as $addressInfo){
															$address_Dec=$addressInfo['address_des'];
															$address_note=$addressInfo['note'];
															$c++;
											?>
											<tr>
											<td><?php echo $address_Dec ?></td>
											<td>, <?php echo $address_note ?></td>
											</tr>
										<?php  }	?>

										<script type="text/javascript">
															c=1;
															function showAddressDiv(){
															document.getElementById("addressDiv").style.display = 'block';
															if(c%2==0)
															document.getElementById("addressDiv").style.display = 'none';
															c++;
															}

															</script>

										</table>
										<?php
											if($c==0)
										echo " <p> No address saved!</p>"; ?>
										<button class="primry-btn" style=" border-radius: 20%; color:darkblue;  " id="address-btn"  onclick="showAddressDiv()">Add address</button>


									</div>
								</div>
					</div>
					<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
						   <div class="row">

								<div class="col-md-6">
										<form   method="POST" class="form-wrap text-center" action="profileInfoCheck.php">
												<input type="text"  id="name"  onkeyup="testName()" class="form-control" name="name"  value="<?php echo $name; ?>"placeholder="" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Name'"  required>
												<input type="email" id="email"  onkeyup="testEmail()"  class="form-control" name="email"   value=" <?php  echo $email; ?>" placeholder="" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address'" required>
												<input type="text" id="phone" onkeyup="testPhone()" class="form-control" name="phoneNumber"    value="<?php  echo  $phone ;?>"placeholder="" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number'"required >
												<input type="hidden" id="JSEnable" name="javaScript" value="fales" >
												<input  id="submit-btn"  class="primary-btn text-uppercase mt-20" type="submit" name="info_btn" value="Change info">
											</form>
							   </div>
								 <div class="col-md-6">
										<form   method="post" class="form-wrap text-center" action="CheckProfilePASS.php">
											<input type="password" id="old_password"  class="form-control" name="old_password" placeholder="Current password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Current password'" required>
											<input type="password" id="password" onkeyup="testPass()" class="form-control" name="password" placeholder="New password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'New password'" required>
											<input type="password" id="confpassword" onkeyup="testConfPass()" class="form-control" name="conf_password" placeholder="conform password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'conform password'" required>
											<input type="hidden" id="JSEnable" name="javaScript" value="fales" >
											<input  id="pass-btn"  class="primary-btn text-uppercase mt-20" type="submit" name="pass_btn" value="Change password">
									  </form>
									</div>
									<div class="row">
									<div class="col-md-6">
									</div>
									<div class="col-md-6">

									</div>





										<?php
									try{
										$address_SQL="select * from address where user_id='$activeUser' ";
										$address_recored=$db->query($address_SQL);
										$db=NULL;

									}
									catch(PDOException $e){ die($e->getMessage());}


										foreach($address_recored as $addressInfo){
															$address_Dec=$addressInfo['address_des'];
															$address_note=$addressInfo['note'];
															$address_id=$addressInfo['address_id']
											?>

												<br><br><br>
							      <form   method="post" class="form-wrap text-center" action="CheckAddress.php">
										  <p> Address: </p> <textarea  class="form-control" name="address_dec"cols="30" rows="2" require> <?php echo $address_Dec ?></textarea>
											<p> Notes:</p> <span><input  type="text"   value=" <?php echo $address_note ?>"col="4"  class="form-control"name="address_notes"  require id=""></span>
											<input type="hidden" name="address_id" value="<?php echo $address_id ?>">
											<input  id="address-btn"  class="primary-btn mt-10" type="submit" name="address_Btn" value="Change Address">
									  </form>

									<?php  }?>


							</div>
							</div>


							<div >








							</div>


								</div>


								</div>



						</div>
					</div>
				</div>
			</div>
		</div>
</div>
						</div>
					</div>
				</section>






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
			<script  language="JavaScript"  src="CheckProfileInfo.js" ></script>

		</body>
	</html>
