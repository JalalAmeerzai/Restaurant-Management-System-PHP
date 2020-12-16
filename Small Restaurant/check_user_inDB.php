<?php
extract($_GET);
try{
	require('connection.php');
	$sql="select * from users  ";
	$users_recored=$db->query($sql);
	$db=NULL;
}
catch(PDOException $e){ die($e->getMessage());}
$respond="";
foreach($users_recored as $user)
{
if($q==$user['user_name'])
$respond="taken";

}
echo $respond;
?>