<?php
		  session_start();
		  
          extract($_POST);
          extract($_SESSION);
try {
    require ('connection.php');

    if (isset($_POST["submit"])) {

        if (! empty($_POST['name']) && ! empty($_POST['email']) && ! empty($_POST['subject']) && ! empty($_POST['message'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];

            global $db;

            $sql = "INSERT INTO Customer_messages VALUES(null,:name,:email, :subject,:message)";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':subject', $subject);
            $stmt->bindValue(':message', $message);
            $execute = $stmt->execute();
            if ($execute) {
				header("location:contact.php?error=555");
				die();
              
            }
        } else {
			header("location:contact.php?error=666");
			die();        }
    }
} catch (PDOException $ex) {
	header("location:contact.php?error=666");
	die();}

?>

