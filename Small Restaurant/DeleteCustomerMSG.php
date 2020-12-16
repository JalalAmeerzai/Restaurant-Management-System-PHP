<?php
extract($_GET);


$sql="DELETE FROM Customer_messages WHERE MessageID=".$_GET['id'];

  try{
    require('connection.php');
    $db->exec($sql);
    header('location:ViewCustomerMsg.php?error=121');
    $db=null;
  }
  catch(PDOException $ex) {
    header('location:home.php?error=404');
    die(); 
  }











 ?>
