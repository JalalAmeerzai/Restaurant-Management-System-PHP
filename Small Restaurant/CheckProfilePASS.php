
<?php
session_start();

extract($_POST);
extract($_SESSION);
// error=109 >> Old password is not currect 
// error=103 >> invaild password
// error=101>> did not update for some reason
// error=100 >> password dont match
// error=99 >> no errors , succssful
if (!isset($activeUser)) {
    header('location:Register.php?');
  }

$ck_password="/^[A-Za-z0-9!@#$%^&*()_]{6,20}$/";





if(!isset($pass_btn))
{
    header('location:home.php');
    die();
  
}
 


  if($javaScript=="fales")
  {
  //check password
  if ($password!=$conf_password) {
    header('location:Profile.php?error=100');
  die();}
  

    //check password
  if(!preg_match($ck_password,$password))
  {
    header('location:Profile.php?error=103');
  die();}
  }
    

 
  try{
    require('connection.php');
    $user_SQL="select * from users where user_id='$activeUser' ";
    $user_recored=$db->query($user_SQL);
    $user=$user_recored->fetch();
    $OldHashedPass=$user['password'];
    $name=$user['name'];


    
  	$db=NULL;
  }catch(PDOException $ex) {
    header('location:Profile.php?error=101'."one");
  die();
  }
 

  $hashedPass=md5($old_password);    
    if( $OldHashedPass!=$hashedPass)
    {
    header('location:Profile.php?error=109');
    die();
    }


$newPass= md5($password);
$SQL="UPDATE  users set  password='$newPass' WHERE user_id='$activeUser'";


try {
  require('connection.php');
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
