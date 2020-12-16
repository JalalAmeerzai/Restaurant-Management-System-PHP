<?php
extract($_GET);
try{
	require('connection.php');
	$sql="select * from users where user_type='customer' AND user_name LIKE '%$q%' ";
	$users_recored=$db->query($sql);
	$db=NULL;
}
catch(PDOException $e){ die($e->getMessage());}
$respond="";
foreach($users_recored as $user)
{
$respond=$user['user_name'].",".$respond;
}
if(isset($respond))
echo $respond;
else echo "Not eixst."
?>