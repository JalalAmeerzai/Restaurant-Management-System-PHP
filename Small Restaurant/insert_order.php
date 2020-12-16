

      <?php
      session_start();
      extract($_POST);
      extract($_SESSION);

       if(!isset($activeUser))
            {
              header('location:login.php?error=333');
              die();
            }
       if(!isset($orderBotton))
        {
          header('location:menu.php');
          die();
        } ?>
<!DOCTYPE html>
<html >
  <body>


<?php




  //if the user don't have address . a error massge should disply
  if(!isset($address_id))
  {

    //echo "<script> alert('Please add address for delvery your order'); </script>";

    header('location:viewcart.php?error=110');
    die();
  }

    $userID = $_SESSION["activeUser"];


    try {
      require('connection.php');
      $sql1="INSERT INTO orders VALUES (null,:user_id,:address_id,NOW(),:total,:payment_method,'waiting')";
      $db->beginTransaction();
      $stmt = $db->prepare($sql1);
      $stmt->execute(array('user_id' => $userID,'address_id' =>$address_id ,'total' => $totalALL,'payment_method' =>$payment_method  ));
      $order_id = $db->lastInsertId();
   //counter for insert the Request
     $i=0;
      foreach($_SESSION['mycart'] as $k=>$v)
      {
        $id=$v[0][$k][0];
      //  $pic=$v[0][$k][4];
      //  $name=$v[0][$k][1];
        $price=$v[0][$k][2];
        $qty=$v[1];
      //  $total_peritem=$price*$qty;
      //  $totalALL+=$total_peritem;

      $sql2="INSERT INTO order_item VALUES ('$id','$order_id','$qty',?)";
      $stmt = $db->prepare($sql2);
       $stmt->execute(array($Request[$i++]));


   }
       $db->commit();

     unset($_SESSION["mycart"]);
     unset($_SESSION["qty"]);
     header('location:menu.php?error=120');
      die();
    }
     catch (PDOException $e) {
      $db->rollBack();
      header('location:menu.php');
      die();
    }

 ?>

  </body>
</html>
