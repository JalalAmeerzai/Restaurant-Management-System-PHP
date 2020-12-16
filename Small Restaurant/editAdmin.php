<?php
extract($_POST);
if(isset($addadmin))

{
  try{
  	require('connection.php');
  	$sql2="UPDATE users SET user_type = 'admin' WHERE user_name= '$username' ";
  	$db->exec($sql2);
  	$db=NULL;
    header('location:home.php?error=313');

    die();
  }
  catch(PDOException $e){     
    header('location:home.php?error=404');
    die(); }

//echo $UsersName;
}
if(isset($deleteadmin))
{

  try{
    require('connection.php');
    $sql2="UPDATE users SET user_type = 'customer' WHERE user_name= '$username' ";
    $db->exec($sql2);
    $db=NULL;
    header('location:home.php?error=212');
    die();
  }
  catch(PDOException $e){ 
    header('location:home.php?error=404');
    die();  }

}





 ?>
