
<?php
session_start();
extract($_SESSION);
extract($_POST);
extract($_GET);


// error=108 >> email  already used
// error=106 >> invaild phone number
// error=105 >> invaild email
// error=104 >> invaild name
// error=102 >> invaild username
// error=101>> did not update for some reason
// error=99 >> no errors , succssful

$ck_name="/^[A-Za-z0-9 ]{2,20}$/";
$ck_email="/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i";
$ck_phone="/^[0-9]{6,10}$/";




  if(!isset($info_btn))
  {
      header('location:home.php');
      die();
  
}


  if($javaScript=="fales")
  {
    //chekc name
  if(!preg_match($ck_name,$name))
  {
    header('location:Profile.php?error=104');
  die();}
  //check email
  if(!preg_match($ck_email,$email))
  {
    header('location:Profile.php?error=105');
  die();}

    //check phone
  if(!preg_match($ck_phone,$phoneNumber))
  {
    header('location:Profile.php?error=106');
  die();}
}

 
  try{
    require('connection.php');
    $sql1="select * from users";
    $users_recored=$db->query($sql1);
  	$db=NULL;
  }catch(PDOException $ex) {
    header('location:Profile.php?error=101');
  die();
  }
  
    foreach($users_recored as $user)
    {
        
  if($user['email']!=$email){
      
      if($email==$user['email'])
      {
        header('location:Profile.php?error=108');
        die();
      }
    

    }
  }
  





try {
  require('connection.php');
  $SQL="UPDATE  users set  name='$name',email='$email',phone_number='$phoneNumber' WHERE user_id='$activeUser'";
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
