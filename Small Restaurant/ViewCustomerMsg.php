<?php
session_start();
extract($_SESSION); 
if (!isset($activeUser) || $user_type!='admin'){ 
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
            <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="menu.html"> Menus</a></p>
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
              <h1 class="mb-10">All customer messages</h1>
            </div>
          </div>
        </div>
        <div class="filters-content">
          <div class="row grid">
  <?php
        try {
             require('connection.php');
             $sql = "SELECT * from customer_messages";
             $stmt = $db->query($sql);
             while ($rows = $stmt->fetch()) {
                 $id = $rows["MessageID"];
                 $Name = $rows["Name"];
                 $email = $rows["Email"];
                 $subject = $rows["Subject"];
                 $Message = $rows["Message"];




            echo '<div class="col-md-6 all breakfast">';
            echo ' <div class="single-menu">';
            echo ' <div class="title-wrap d-flex justify-content-between">';
            echo '<h4 > name : '.$Name .'</h4>';
            echo '</div>';
            echo '<p>';
            echo 'Subject: '.$subject ;
            echo 'message: '.$Message  ;
            echo  ' </p>';
            echo "email: <a href='mailto:$email'>$email</a><br>";
            echo "<a  class='genric-btn primary' style='float: right'; href='deletecustomermsg.php?id=$id' > Delete </a> ";
            echo '</div>';
                  echo  ' </div>';




                         }
                     } catch (PDOException $error) {
                         die($error->getMessage());
                     } ?>

              </div>
              </div>
              </div>
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
  </body>
</html>
