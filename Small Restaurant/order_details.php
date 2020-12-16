<?php
session_start();
extract($_SESSION);
extract($_GET);
extract($_POST);
if(!isset($activeUser))
    {
      header('location:login.php?error=333');
      die();
    }
$user_id=$_SESSION['activeUser'];

try{
  require('connection.php');
  //select order and item details
  $sql = "SELECT * from orders o,order_item i ,menu m where i.item_id=m.item_id  and i.order_id='$order_id' and o.order_id='$order_id' ";
  $rs=$db->query($sql);
  //select user address
  $sq2="SELECT * from address ";
  $rs2=$db->query($sq2);

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
  							Menus
  						</h1>
  						<p class="text-white link-nav"><a href="home.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="menu.php"> Menus</a></p>

  					</div>
  				</div>
  			</div>
  		</section>
  		<!--my cart Area --------------------------------------------------------------------------------------------------->

   <div class="table-striped">
   <div class="table-hover">
   <div class="table-sm">


   <table class="table" >
   <tr><th  > Picture </th><th colspan='2'> Name </th><th> Quantity </th><th> Unit Price </th><th> total </th></tr>


<?php
$totalALL=0;
foreach ($rs as $key ){
       $item_id=$key['item_id'];
       $img=$key['img'];
       $item_name=$key['item_name'];
       $qty=$key['qty'];
       $price=$key['price'];
       $total_peritem=$qty*$price;
       $totalALL=$key['total'];

       echo "<tr>";
       echo "<td><img src='$img' width='100' height='100'></td>";
       echo "<td colspan='2'>".$item_name."</td>";
       echo "<td algin='right'>".$qty."</td>";
       echo "<td>".$price."</td>";
       echo "<td>".$total_peritem."</td>";
        echo "<td></td>";
       echo "</tr>";

      // $totalALL+=$total_peritem;

}

 ?>
           	<form   class="" action="" method="post">
           <tr >
             <td colspan='2'>  <h4> Please select the address: </h4>  </td>
             <td><select    class="genric-btn primary" style="float: left" name='address_id' >
               <?php foreach ($rs2 as  $key){
                 // select only the address for active user
                 if($_SESSION['activeUser']==$key['user_id'])
                 {
                 echo "<option value=".$key['address_id'].'>'.$key['address_des']."</option>" ;
               }} ?>

                   </select>
            </td>
                   <td colspan='1'>  <h4> Please select the payment method: </h4>  </td>
                   <td><select    class="genric-btn primary" style="float: left" name='payment_method'>
                           <option>cash</option>
                           <option>card</option>
                           </select> </td>



     <td >  <h6> Please click here if you want reorder : </h6>  </td>
     <td>	<input class="genric-btn primary" type="submit" name="orderBotton" value="Reorder"></td>
   </tr>


    </form>
  	 </table>


  </div>
  </div>
  </div>

<?php
if (isset($orderBotton)) {

    $userID = $_SESSION["activeUser"];

    try {
      require('connection.php');
      //select order and item details
      $sql = "SELECT * from orders o,order_item i ,menu m where i.item_id=m.item_id  and i.order_id='$order_id' and o.order_id='$order_id' ";
      $rs=$db->query($sql);
      //select user address
      $sq2="SELECT * from address ";
      $rs2=$db->query($sq2);

      $sql1="INSERT INTO orders VALUES (null,'$userID','$address_id',NOW(),'$totalALL','$payment_method','waiting')";
      $db->beginTransaction();
      $stmt = $db->prepare($sql1);
      $stmt->execute();
      $order_id = $db->lastInsertId();


     foreach ($rs as $key ){

        $id=$key['item_id'];
        $img=$key['img'];
        $item_name=$key['item_name'];
        $qty=$key['qty'];
        $price=$key['price'];
        $total_peritem=$qty*$price;
        $Request=$key['Request'];


      $sql="INSERT INTO order_item VALUES ('$id','$order_id','$qty','$Request')";
      $stmt = $db->prepare($sql);
      $stmt->execute();
 }
      $db->commit();
    header('location:home.php');
    die();

    }
     catch (PDOException $e) {
    $db->rollBack();
    header('location:home.php');
    die();
    }

}
?>


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
