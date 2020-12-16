<?php
	session_start();
	unset($_SESSION['mycart'][$_GET['itemid']]);
	if (empty($_SESSION['mycart'])) unset($_SESSION['mycart']);
	header('location:viewcart.php');

?>
