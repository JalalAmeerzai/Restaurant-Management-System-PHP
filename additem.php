<?php
	session_start();
	extract($_GET);
	$myitem=unserialize($input2);
	$_SESSION['mycart'][key($myitem)]=array($myitem,$qty);
	$_SESSION["qty"]=$qty;
	echo "done";
?>