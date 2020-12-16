<?php

session_start();

// if (!isset($activeUser))
// {
// 	header('location:login.php?error=333');
// }
extract($_SESSION);
extract($_GET);
extract($_POST);



try{
  require('connection.php');
  $sql="SELECT * from orders  ";
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
  <body onload="searchScroll()"  >
  <?php  require('navBar.php'); ?>

 		<!-- start banner Area -->
 		<section class="about-banner relative">
 			<div class="overlay overlay-bg"></div>
 			<div class="container">
 				<div class="row d-flex align-items-center justify-content-center">
 					<div class="about-content col-lg-12">
 						<h1 class="text-white">
 							Menu
 						</h1>
 						<p class="text-white link-nav"><a href="home.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="menu.php"> Menu</a></p>
            <?php

              if (isset($error) && $error==777) {
                echo "<h2 class='text-white link-nav'>status Updated  </h2>";
                echo "<br/>";}  ?>
 					</div>
 				</div>
 			</div>
 		</section>
 		<!--my orders Area --------------------------------------------------------------------------------------------------->

  <div class="table-striped">
  <div class="table-hover">
  <div class="table-sm">
   <table class="table"  >
<!-- if the user is a customer -->
<?php if($_SESSION['user_type']=='customer'){ ?>
   <tr><th> order number  </th><th> address number </th><th> data and time </th><th> total </th><th> payment method </th><th > status </th><th > Order details </th></tr>


  <form class="" action="order_details" method="post">


   <?php foreach ($rs as $key ){
      if($_SESSION['activeUser']==$key['user_id']){

   echo '<tr><td>'.$key['order_id'].'</td><td>'.$key['address_id'].'</td><td>'.
   $key['data_time'].'</td><td>'.$key['total'].'</td><td>'.$key['payment_method'].'</td><td>'.$key['status'].'</td>';
   ?>	<td><button type= 'button' class="genric-btn primary" style="float: left; margin-right: 5px; "><a  style = 'color: inherit;' href= 'Order_details.php?order_id=<?php echo $key['order_id'] ?>'> Order details </a></button></td><?php
   echo "</tr>";
   }
   }
   echo "</form>";

   }
   //<!-- if the user is a customer -->

  // <!-- if the user is a admin -->
   if($_SESSION['user_type']=='admin'){ ?>
      <tr><th> order id  </th><th> order id  </th><th> address id </th><th> data and time </th><th> total </th><th> payment method </th><th > status </th></tr>

      <?php foreach ($rs as $key ){

      echo '<tr><td>'.$key['order_id'].'</td><td>'.$key['user_id'].'</td><td>'.$key['address_id'].'</td><td>'.
      $key['data_time'].'</td><td>'.$key['total'].'</td><td>'.$key['payment_method'].'</td><td>'.$key['status'].'</td></tr>';

                    }
     }
  // <!-- if the user is a admin -->

  // <!-- if the user is a staff -->
   if($_SESSION['user_type']=='staff'){ ?>
      <tr><th> Order id  </th><th> User id  </th><th> Address  </th><th> Data and Time </th><th> Total </th><th> Payment method </th><th >  Status </th><th > Status List </th><th > Update </th></tr>

      <?php foreach ($rs as $key ){
        if ($key['status']!='Deleviring') {



      echo '<tr><td>'.$key['order_id'].'</td><td>'.$key['user_id'].'</td><td>'.$key['address_id'].'</td><td>'.
      $key['data_time'].'</td><td>'.$key['total'].'</td><td>'.$key['payment_method'].'</td>';

    echo " <form  method='post' action='Update_status.php'>";
    echo "<td>".$key['status']."</td>";
    echo '<td><select    class="genric-btn primary" style="float: left" name="status">';
    echo "  <option>waiting </option> ";
    echo "  <option>In proccess </option> ";
    echo "  <option>Deleviring </option> ";
    echo "   </select></td>";
   	echo ' <input type="hidden" name="order_id" value='. $key['order_id'].'>';
    echo '<td><input type="submit"  class="genric-btn primary" style="float: left" value="Update status" name="Update_status">' ;
    echo '</td></form></tr>';






    }  }//end foreach


     }
  // <!-- if the user is a staff -->

 ?>


 	 </table>


 </div>
 </div>
 </div>



 	<!--my orders Area ----------------------------------------------------------->



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
