<?php
extract($_GET);

try
{
require("connection.php");
if(isset($rateB))
   {
$query= "INSERT INTO rating ( raterID, itemID, value) VALUES ($raterID,$itemID,$rating)";
 $db->exec($query); 
 $db=NULL;
 header("location:seeComments.php?itemId=$itemID");
   } 
}
catch(PDOException $ex)
{
   header('location:menu.php?error=404');
	die();
}


?>

