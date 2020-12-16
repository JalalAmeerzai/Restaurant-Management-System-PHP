<?php 

session_start();

extract($_POST);
extract($_SESSION);

if (!isset($activeUser)) {
    header('location:Register.php?');
  }
  if(!isset($address_Btn))
  {
      header('location:home.php');
      die();
    
  }


  try {
    require('connection.php');
    $SQL="UPDATE  address set  address_des='$address_dec',note='$address_notes' WHERE user_id='$activeUser' AND address_id='$address_id' ";
    $recored=$db->exec($SQL);
    if ($recored==1) {
     header('location:Profile.php?error=99');
    die();
    }
  
  }
  catch(PDOException $ex) {
    
    header('location:Profile.php?error=101');
    die();
  }
  header('location:Profile.php?error=110');
  die();

   ?>





























?>