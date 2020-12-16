 <?php

 // error=111 >> pic type should be(png,jpeg,ipg,pjpeg) and size up to 10M

 session_start();
 extract($_POST);
 extract($_SESSION);

 if (!isset($activeUser)) {
    header('location:Register.php?');
  }
  if(!isset($picBtn))
  {
      header('location:home.php');
      die();
    
  }
  //echo "Upload: " . $_FILES["PicToBeUplode"]["name"] . "<br />";
  //echo "Type: " . $_FILES["PicToBeUplode"]["type"] . "<br />";
 // echo "Size: " . ($_FILES["PicToBeUplode"]["size"] / 1024) . " Kb<br />";
// echo "Temp file: " . $_FILES["PicToBeUplode"]["tmp_name"] . "<br />";

 if ((($_FILES["PicToBeUplode"]["type"] == "image/gif")
 || ($_FILES["PicToBeUplode"]["type"] == "image/jpeg")
 || ($_FILES["PicToBeUplode"]["type"] == "image/pjpeg")
 || ($_FILES["PicToBeUplode"]["type"] == "image/png")
 || ($_FILES["PicToBeUplode"]["type"] == "image/jpg"))
 && ($_FILES["PicToBeUplode"]["size"] < 200000000)) {
 if ($_FILES["PicToBeUplode"]["error"] > 0) {
    header('location:Profile.php?error=111');
    die();}
 else {
 // echo "Upload: " . $_FILES["file"]["name"] . "<br />";
 // echo "Type: " . $_FILES["file"]["type"] . "<br />";
 // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
 // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";


//extract the type
 $fileType=$_FILES["PicToBeUplode"]["type"];
 $Type=explode("/", $fileType);

 //chang the name of the img to save it in the database
 $nemName="users_mgs/user_".$activeUser.".".$Type[1];
 move_uploaded_file($_FILES["PicToBeUplode"]["tmp_name"],  $nemName);

 //chang the name of the img to save it in the file

//chang the name of the img to save it in the database


 $sql="UPDATE users SET userPic='$nemName' WHERE user_id='$activeUser'";
        try{
	          	require('connection.php');
	          	$recored=$db->exec($sql);
                $db=null;
                if($recored==1){
                    header('location:Profile.php?error=99');
                    die();}

	          }
	      catch(PDOException $ex) {
	           header('location:Profile.php?error=111');
                    die();
               	} 
 }
 }
 else { header('location:Profile.php?error=111');
    die(); } ?>