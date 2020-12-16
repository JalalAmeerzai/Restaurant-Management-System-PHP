<?php

//if(isset($_SESSION['activeUser'] && $_SESSION['user_type']='admin'))
//{
extract($_GET);


$sql="DELETE FROM menu WHERE item_id=".$_GET['item_id'];

  try{
    require('connection.php');
    $db->exec($sql);
    header('location:menu.php');
    $db=null;
  }
  catch(PDOException $ex) {
    header('location:menu.php?error=404');
    die(); 
  }

//}









 ?>
