
<?php
extract($_GET);

try
{
require("connection.php");
if(isset($cb))
   {
$query3= "INSERT INTO commenter (commenterId, itemId, comment, date) VALUES ($sUid,'$itemId','$msg','$date')";
 $db->exec($query3); 
 $db=NULL;
 header("location:seeComments.php?itemId=$itemId");
   } 
}
catch(PDOException $ex)
{
   header('location:menu.php?error=404');
	die();}


?>