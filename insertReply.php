<?php
extract($_GET);

date_default_timezone_set("Asia/Bahrain"); 
$date = date("Y-m-d H:i:s");


try
{
require("connection.php");
if(isset($rb))
   {
$query3= "INSERT INTO  replier (replierId, cid, itemId, comment, reply, date) VALUES ( $sUid, $cid, '$itemId','$comm', '$replyMsg', '$date')";
 $db->exec($query3); 
 header("location:seeComments.php?itemId=$itemId");
   } 
}
catch(PDOException $ex)
{
   header('location:menu.php?error=404');
	die();
}

?>