
<?php

//error=201 --> Error with password  or username



  extract($_POST);
  if (!isset($Login_btn)){
    header('location:login.php');
      die();}

    session_start();
try{
	require('connection.php');
  $password_encrypted=MD5($password);
	$sql="select * from users where user_name='$username' and password='$password_encrypted' ";
	$users_recored=$db->query($sql);
	$db=NULL;
}
catch(PDOException $e){ die($e->getMessage());}

        $user=$users_recored->fetch();
        if ($user['user_name']!=$username || $user['password']!=$password_encrypted){
            header('location:login.php?error=201');
                 die();}
            else {
              $_SESSION['activeUser']=$user['user_id'];
              $_SESSION['user_type']=$user['user_type'];
              $_SESSION['user_name']=$user['name'];
              header('location:home.php');
            }











?>
