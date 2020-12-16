
<?php
session_start();
extract($_SESSION);
extract($_GET);



try{
	require('connection.php');
	$sql="select * from menu  ";
	$rs=$db->query($sql);
	$db=NULL;
}
catch(PDOException $e){ die($e->getMessage());}

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
	<script  language="JavaScript"  src="search.js" ></script>
	<script  language="JavaScript"  src="checkInputSinUp.js" ></script>

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
		<body onload="searchScroll()"  >

		<?php  require('navBar.php'); ?>


			<!-- start banner Area -->
			<section class="about-banner relative">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								
								<?php
								if (isset($error) && $error==300) {
									echo "<h3 class='text-white'>The cart is empty, Please select some items!!</h3>";
									echo "<br/>"; }
							if (isset($error) && $error==400) {
										echo "<h3 class='text-white'>Please loging first </h3>";
										echo "<br/>"; }
							if (isset($error) && $error==120) {
										echo "<h3 class='text-white'>Succssfully</h3>";
										echo "<br/>"; }
					
							if (isset($error) && $error==404) {
										echo "<h3 class='text-white'>Erroe!</h3>";
										echo "<br/>"; }
					
								 ?>
								 <?php if(!isset($activeUser)) {?>
								 <button  class="btn" onclick="show()" id="myBtn">Login</button>
													     	<!-- The Modal -->
														    <div id="myModal" class="modal">
														       	<!-- Modal content -->
														         	<div class="modal-content">
																						<span onclick="hide()"class="close">&times;</span>
													                    <form   method="post" class="form-wrap text-center" action="loginCheck.php" autocomplete="off">
																									<input type="text" class="form-control" name="username" placeholder="Your userName" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your userName'" >
																									<input type="password" class="form-control" name="password" placeholder="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'password'" >
																									<input class="primary-btn text-uppercase mt-20" type="submit" name="Login_btn" value="Login">
																							 </form>
																	  	  </div>
															  	</div> 
								 <?php } ?>
							</h1>
							<p class="text-white link-nav"><a href="home.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="menu.php"> Menus</a></p>
						</div>
					</div>
				</div>
			</section>
			<!-- End banner Area -->

			<!-- Start menu-area Area -->
            <section class="menu-area section-gap" id="menu">
                <div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">What kind of Foods we serve for you</h1>
								<?php if (isset($activeUser)&& $user_type=='admin') { ?>
              <a href="addTOmenu.php" class="primary-btn text-uppercase">add new item</a> <br><br>
            <?php } ?>

							</div>
						</div>
					</div>
					<ul class="filter-wrap filters col-lg-12 no-padding">
                        <li class="active" data-filter="*">All Menu</li>

												<?php  
												// Extracting all categorys from all menu the secound array for replacing space by _ (ex:hot starters => hot_starters)

								$CatList = (array) null;
								$CatList2 = (array) null;
								$c=0;
							foreach($rs as $r){
						$itemCat=$r['item_cat'];
						$tempCat2=str_replace(" ","_",$itemCat);
						
						$CatList[$c]=$itemCat;
						$CatList2[$c]=$tempCat2;	
						$c++;						
												}
							$CatList=array_unique($CatList)	;				
							$CatList2=array_unique($CatList2)	;	
							foreach(array_combine($CatList2,$CatList) as $temp1=> $temp2) {

						?>
                        <li data-filter=".<?php echo $temp1; ?>"><?php echo $temp2; ?></li>
                      
							<?php }?>
										
<!-- 
                        <li data-filter=".Hot_Starters">Hot Starters</li>
                        <li data-filter=".Cold_Starters">Cold Starters</li>
												<li data-filter=".Soup">Soup</li>
												<li data-filter=".Pasta">Pasta</li>
                        <li data-filter=".Burger">Burger</li>
                        <li data-filter=".International_Dishes">International Dishes</li>
												<li data-filter=".Mocktalis">Mocktalis</li> -->

                    </ul>
						<?php //////////////////////////////////////////// my code ?>

						<div class="filters-content">
							 <div class="row grid">
							 

					<?php
					// when we use  array ($rs) once it dose not work again so we connect to DB again
				
					foreach(array_combine($CatList2,$CatList) as $temp2=> $temp) {

							try{
						require('connection.php');
						$sql="select * from menu";
						$rs=$db->query($sql);
						$db=NULL;
					}
					catch(PDOException $e){ die($e->getMessage());}
					foreach($rs as $r)
					{
						$myitem[$r[0]]=array($r['item_id'],$r['item_name'],$r['price'],$r['item_cat'],$r['img']);
 	        	$sr=serialize($myitem);
 	        	unset($myitem);
           if ($r['item_cat']==$temp){
          ?>


	           <div  class="col-md-6 all <?php echo $temp2;?>" style='background-color:#a30000;' <?php echo "id=".$r["item_id"];?>  >
							<div class="single-menu">
									<div class="title-wrap d-flex justify-content-between">
										<img src="<?php echo $r['img'] ?>" style='border-radius:50%;' height="100" width="100"/>
											<h4> <?php echo $r['item_name']; ?> </h4>
											<h4 class="price"> <?php echo $r['price']; ?> BD</h4>

									</div>
										<p>
										<?php echo $r['item_des'] ?>
										</p>

										<div class="col-lg-12">
											<div class="alert-msg" style="text-align: left;"></div>
									<!-- customer form -->
														<?php if(!isset($activeUser)||$_SESSION['user_type']=='customer'){ ?>

														<input type='hidden' id="<?php echo $r['item_id']."itemArray" ?>" name='itemdetails' value='<?php echo $sr; ?>' />
														<?php if(!isset($activeUser)) { ?> 
															<a  style = 'color: inherit;' href= 'seeComments.php?itemId=<?php echo $r['item_id'] ?>'><button  class="genric-btn primary" style="float: right; margin-right: 5px; "> customers review</button></a>
																													  <?php } else{?>

														<button  onclick="additem(this.value)" id="<?php echo $r['item_id']."btn" ?>" value="<?php echo $r['item_id'] ?>" class="genric-btn primary" style="float: right;">add to cart</button>
														<a  style = 'color: inherit;' href= 'seeComments.php?itemId=<?php echo $r['item_id'] ?>'><button  class="genric-btn primary" style="float: right; margin-right: 5px; "> customers review</button></a>
														<select   id="<?php echo $r['item_id'].'qty'; ?>" class="genric-btn primary" style="position: absolute; left: 355px; top:-20px;" name='qty'>
																<option>1</option>
																<option>2</option>
																<option>3</option>
																<option>4</option>
																<option>5</option>
																<option>6</option>
																<option>7</option>
																<option>8</option>
																<option>9</option>
																<option>10</option>
															</select>
															<?php } ?>
														<!-- customer form -->
														<?php } ?>
														<?php if(isset($activeUser)&&$_SESSION['user_type']=='admin'){ ?>
														<form class=""  method="GET">

														<button  type= 'button' class="genric-btn primary" style="float: right; margin-right: 5px; "><a  style = 'color: inherit;' href= 'delete_menu.php?item_id=<?php echo $r['item_id'] ?>'>delete item</a></button>
														</form>
														<a  style = 'color: inherit;' href= 'seeComments.php?itemId=<?php echo $r['item_id'] ?>'><button  class="genric-btn primary" style="float: right; margin-right: 5px; "> customers review</button></a>

														<?php } ?>

									</div>
								</div>
							</div>


<?php } ?>
<?php } ?>
<?php } ?>


</div>
</div>
<?php//////////////////////////////end of my code ?>
            </section>
            <!-- End menu-area Area -->



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
			<script  language="JavaScript"  src="additemAjacx.js" ></script>



		</body>
	</html>
