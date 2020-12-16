
<?php
extract($_POST);
// error=108 >> email  already used
// error=107 >> username  already used
// error=106 >> invaild phone number
// error=105 >> invaild email
// error=104 >> invaild name
// error=103 >> invaild password
// error=102 >> invaild username
// error=101>> did not register for some reason
// error=100 >> password dont match
// error=99 >> no errors , succssful

$ck_username="/^[A-Za-z0-9_.-]{3,20}$/";
$ck_password="/^[A-Za-z0-9!@#$%^&*()_]{6,20}$/";
$ck_name="/^[A-Za-z0-9 ]{2,20}$/";
$ck_email="/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i";
$ck_phone="/^[0-9]{6,10}$/";



session_start();
if (!isset($Register_btn)){
  header('location:home.php');
  die();}

  if($javaScript=="fales")
  {
  //check password
  if ($password!=$conf_password) {
    header('location:Register.php?error=100');
  die();}
  
  //check username
  if(!preg_match($ck_username,$username))
  {
    header('location:Register.php?error=102');
  die();}
    //check password
  if(!preg_match($ck_password,$password))
  {
    header('location:Register.php?error=103');
  die();}
    //chekc name
  if(!preg_match($ck_name,$name))
  {
    header('location:Register.php?error=104');
  die();}
  //check email
  if(!preg_match($ck_email,$email))
  {
    header('location:Register.php?error=105');
  die();}

    //check phone
  if(!preg_match($ck_phone,$phoneNumber))
  {
    header('location:Register.php?error=106');
  die();}

 
  try{
    require('connection.php');
    $sql1="select *from users";
    $users_recored=$db->query($sql2);
  	$db=NULL;
  }catch(PDOException $ex) {
    header('location:Register.php?error=101');
  die();
  }
  
    foreach($users_recored as $user)
    {
      if($username==$user['user_name'])
      {
        header('location:Register.php?error=107');
      die();
      }
      if($email==$user['email'])
      {
        header('location:Register.php?error=108');
      die();
      }

    }
  }




$hashedPass=md5($password);
$SQL="INSERT INTO users VALUES ('NULL','$username','$name','customer','$hashedPass','$phoneNumber','$email','users_mgs/defaultPic.png')";

try {
  require('connection.php');
$recored=$db->exec($SQL);
  if ($recored==1) {
    $_SESSION['activeUser']=$user_id;
    $_SESSION['user_name']=$name;
    $_SESSION['user_type']='customer';
   header('location:home.php?error=99');}

}
catch(PDOException $ex) {
  header('location:Register.php?error=101');}

 ?>
