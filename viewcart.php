<?php

	session_start();
  extract($_SESSION);
  if(!isset($activeUser))
 			{
 				header('location:login.php?error=333');
 				die();
 			}

	extract($_POST);
	extract($_GET);
	if (!isset($_SESSION['mycart']))
	header('location:menu.php?error=300');

	try{
		require('connection.php');
		$sql="SELECT * from address ";
		$rs=$db->query($sql);
		$db=NULL;
	}
	catch(PDOException $e){ die($e->getMessage());}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
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
		<section class="about-banner relative">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row d-flex align-items-center justify-content-center">
					<div class="about-content col-lg-12">
						<h1 class="text-white">
							Menus
						</h1>
						<p class="text-white link-nav"><a href="home.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="menu.php"> Menus</a></p>

						<?php if (isset($error) && $error==110) {
									echo "<h3 class='text-white'> Please add address for delvery your order</h3>";
									echo "<br/>"; } ?>
					</div>
				</div>
			</div>
		</section>
		<!--my cart Area --------------------------------------------------------------------------------------------------->

 <div class="table-striped">
 <div class="table-hover">
 <div class="table-sm">


				 <table class="table" >
				 <tr><th  > Picture </th><th> Name </th><th> Quantity </th><th> Unit Price </th><th> total peritem </th><th > Request </th><th > Delete </th></tr>
				 <?php $total_peritem=0;
				      $totalALL=0;
							$delivery_charges=0.500;

				      foreach($_SESSION['mycart'] as $k=>$v)
				      {
				         $pic=$v[0][$k][4];
				         $name=$v[0][$k][1];
				         $price=$v[0][$k][2];
				         $qty=$v[1];
				         $total_peritem=$price * $qty;
				         $totalALL+=$total_peritem;



								  ?>
				 <tr>
					  <td  > <img  src='<?php echo $pic ?>'  width='100' height='100' /></td>
					  <td align><?php echo $name ?></td>
					  <td ><?php echo $qty ?></td>
					  <td><?php echo $price." BD" ?></td>
				    <td><?php echo $total_peritem." BD" ?></td>
						<!-- start of the form -->

		<form  action="insert_order.php" method="post">

						<td > <textarea  class="input-group-text" name="Request[]" rows="4" cols="30"> </textarea> </td>

				   <div class='col-lg-12'>
				   <div class='alert-msg' style='text-align: left'></div>
					 <td align='center'> <a  class='genric-btn primary'  href='deleteitem.php?itemid=<?php echo $k ?>'>Delete</a> </td>
					 </div>
				</tr>

				       <!-- add the delivery charges to the total -->
				        <?php }  $totalALL+=$delivery_charges ?>


				  <tr ><th align='center' colspan='4' align='right'> total </th>
					<th colspan='2'> <?php echo $totalALL." BD includ 0.500 for delivery " ?> </th>
					<td></td><td></td>

							   <input type="hidden" name="totalALL" value="<?php  echo $totalALL; ?>">




	<tr >
    <td colspan='2'>  <h4> Please select the address: </h4>  </td>
		<td><select    class="genric-btn primary" style="float: left" name='address_id'>
			<?php foreach ($rs as  $key){
				// select only the address for active user
				if($_SESSION['activeUser']==$key['user_id'])
				{
				echo '<option value='.$key['address_id'].'>'.$key['address_des'].'</option>' ;
			}} ?>

					</select> </td>
  	      <td colspan='1'>  <h4> Please select the payment method: </h4>  </td>
					<td><select    class="genric-btn primary" style="float: left" name='payment_method'>
									<option>cash</option>
									<option>card</option>
								</select> </td>

      <td >  <h6> Please click here to conform the order: </h6>  </td>
    	<td>	<input class="genric-btn primary" type="submit" name="orderBotton" value="order"></td>
    </tr>


  </form>
	</tr>

	 </table>


</div>
</div>
</div>



	<!--my cart Area -->



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
