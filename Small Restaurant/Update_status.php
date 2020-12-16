<?php


extract($_POST);

  if (isset($Update_status)) {
    $sql="UPDATE orders SET status='$status' WHERE order_id='$order_id'";
    try{
          require('connection.php');
          $db->exec($sql);
          header('location:disblay_orders.php?error=777');
          $db=null;
        }
    catch(PDOException $ex) {
          echo "Connection Error occured!"; //user friendly message
          die ($ex->getMessage());
            }

}



 ?>
