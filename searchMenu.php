<?php
extract($_GET);

try{
	require('connection.php');
	$sql="select * from menu where item_name like  '%$input%' ";
	$rs=$db->query($sql);
	$db=NULL;
}
catch(PDOException $e){ die($e->getMessage());}
$count=0;
foreach($rs as $row )
{
if($count<=5){
echo $row['item_name']."#".$row['item_id'];
echo "|";
}
$count++;
    
}

?>