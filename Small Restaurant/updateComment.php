<?php
session_start();
extract($_GET);
extract($_POST);
date_default_timezone_set("Asia/Bahrain"); 
$date =date("Y-m-d H:i:s");
if(isset($edit))
    {
         try
         {
            require("connection.php");
            $query= "UPDATE commenter SET comment = '$msg', date= '$date'  WHERE cid= $cid ";
             $db->exec($query);
            header("location: seeComments.php?itemId=$itemId");
         }
        catch(PDOException $ex)
        {
         die( $ex->getMessage());
        } 
        
    }
  elseif(isset($editReply))
 {
        try
        {
        require("connection.php");
        $query= "UPDATE replier SET reply = '$replyMsg', date= '$date'  WHERE rid= $rid ";
            $db->exec($query);
        header("location: seeComments.php?itemId=$itemId");
        }
    catch(PDOException $ex)
    {
        die( $ex->getMessage());
    } 
    

 }
elseif(isset($cancel))
header("location: seeComments.php?itemId=$itemId");

    ?>