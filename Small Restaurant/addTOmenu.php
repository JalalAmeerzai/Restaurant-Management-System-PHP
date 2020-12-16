
<?php   
extract($_POST);

session_start();
extract($_SESSION); 
if(!isset($activeUser))
{
header('location:login.php?error=333');
die();
 }
if($user_type!='admin')
{
header('location:home.php');
die();
}
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
		<?php  require('navBar.php'); ?>


			<section class="about-banner relative">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
          Adding item to menu
					
					<?php 
								if (isset($error) && $error==404) {
								echo "<h3 class='text-white'>Erroe!(img size <2mb ,type(png,jpeg,ipg,pjpeg)only</h3>";
								echo "<br/>"; }
																	?>
							</h1>
							<p class="text-white link-nav"><a href="home.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="menu.php"> Menus</a></p>
						</div>
					</div>
				</div>
			</section>
			<!-- End banner Area -->

			<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap align-items-center justify-content-center">
				<div class="container">
					<div class="row">


						<div class="col-lg-8">
							<form class="form-area contact-form text-right"   method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col-lg-6 form-group">

										<input name="item_name" placeholder="Enter item name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter item name'" class="common-input mb-20 form-control" required type="text">
										<input name="item_des" placeholder="Enter item description"  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter item description'" class="common-input mb-20 form-control" required type="text">
                   	<input name="price" placeholder="Enter item price"  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter item price'" class="common-input mb-20 form-control" required type="text">

										</div>
										<b>Category will be created automatically if not already exist </b>

                  <div class="col-lg-6 form-group ">
                    <input name="item_cat" placeholder="Enter item category"  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter item category'" class="common-input mb-20 form-control" required type="text">
										<input   type="file"  class="genric-btn " name="img"> <br>

									</div>



									<div class="col-lg-12">

										<div class="alert-msg" style="text-align: left;"></div>

									</div>
									<button  name='add' class="genric-btn primary" style="float: right;">Add the new item</button>

								</div>

							</form>
						</div>
					</div>
				</div>
			</section>
			<!-- End contact-page Area -->





      <?php


			if (isset($add))
			  {
                  // print_r($_FILES);
									$error = $_FILES["img"]["error"];
									$imgName = $_FILES["img"]["name"];

									$tmp = explode( "." , $imgName);
									$imgExt = strtolower ($tmp[1]);
									$imgType= $_FILES["img"]["type"];
									$imgSize= $_FILES["img"]["size"];
									$imgTmpName= $_FILES["img"]["tmp_name"];
									$accExt = array("jpeg" , "jpg" , "pjpeg" , "gif");


          if(!in_array($imgExt , $accExt))

          {

						header('location:home.php?addTOmenu=404');
						die(); 
          }


          if ($imgSize > 2000000)
          {
						header('location:home.php?addTOmenu=404');
						die(); 
          }


          if($error != 0)
          {
						
						header('location:home.php?addTOmenu=404');
						die(); 
          }


                // these are called named params, another way using positional params

                $query="INSERT INTO menu  VALUES (null,:item_name, :item_des , :price,:item_cat,'')";
                    try{
                        require('connection.php');
                        $st = $db->prepare($query);
                    $st->execute( array("item_name" => $item_name, "item_des" => $item_des, "price" => $price , "item_cat"=> $item_cat  ) );
                    $item_id= $db->lastInsertId();
                    $db=null;

                       }
                  catch(PDOException $ex)
                   {
										header('location:home.php?addTOmenu=404');
										die(); 
                   }

                  //if user enter new category the system will great new file for the new category
 									if (!file_exists('imgs/'.$item_cat)) { mkdir('imgs/'.$item_cat, 0777, true); }

                  $destName = "imgs/".$item_cat.'/'. $item_name .".". $imgExt;

                  if(!move_uploaded_file($imgTmpName,  $destName))
                  {
										header('location:home.php?addTOmenu=404');
										die(); 
                  }


                    $query=" UPDATE menu SET img='$destName' WHERE item_id= $item_id ";
                  try{
                      require('connection.php');
                      $db->exec($query);
                        echo "<script> alert('The new item was added successfully'); </script>";
                      $db=null;
                      }
                catch(PDOException $ex)
                      {
												header('location:home.php?addTOmenu=404');
												die(); 
                      }
}







    ?>













			
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
