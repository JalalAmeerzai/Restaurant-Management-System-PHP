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

if ((($_FILES["PicToBeUplode"]["type"] == "image/gif")
|| ($_FILES["PicToBeUplode"]["type"] == "image/jpeg")
|| ($_FILES["PicToBeUplode"]["type"] == "image/pjpeg")
|| ($_FILES["PicToBeUplode"]["type"] == "image/png")
|| ($_FILES["PicToBeUplode"]["type"] == "image/jpg"))
&& ($_FILES["PicToBeUplode"]["size"] < 200000000)) {
if ($_FILES["PicToBeUplode"]["error"] > 0) {
   header('location:home.php?error=111');
   die();}
else {


//extract the type
$fileType=$_FILES["PicToBeUplode"]["type"];
$Type=explode("/", $fileType);

//chang the name of the img to save it in the database
$nemName="PastaExpress.".$Type[1];
move_uploaded_file($_FILES["PicToBeUplode"]["tmp_name"],  $nemName);

//chang the name of the img to save it in the file

//chang the name of the img to save it in the database


$sql="UPDATE websitetexts SET textField='$nemName' WHERE textName='logo'";
       try{
                 require('connection.php');
                 $recored=$db->exec($sql);
               $db=null;
               if($recored==1){
                   header('location:home.php?error=112');
                   die();}

             }
         catch(PDOException $ex) {
              header('location:home.php?error=111');
                   die();
                  } 
}
}
else { header('location:home.php?error=111');
   die(); } ?>