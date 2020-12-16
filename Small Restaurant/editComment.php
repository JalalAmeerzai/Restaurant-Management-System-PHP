<?php
 extract ($_GET);
 session_start();
 ?>


<!DOCTYPE html>
     <html>
    <head>
        <link rel='stylesheet'  href= ' my css/post.css' />
    </head>
   <body>


<?php if(isset($cid)) { ?>

<div class=  comment>
<div class= 'details'> 
<span > <?php echo  $_SESSION['user_name'] ?> 
</div> 
<form action= updateComment.php>
 <img class=  avatar src= 'my img/selena.jpg' /> 
 <textarea class= post name= msg > <?php echo $comm ?>  </textarea>
  <div>
    <input  class= mainButton type= 'submit' name= 'edit'  value= 'edit'/>
    <input  class= mainButton type= 'submit' name= 'cancel'  value= 'cancel'/>
    <input type= hidden name='itemId' value= <?php echo $itemId ?> />
    <input type= hidden name='cid' value= <?php echo $cid ?> />
  </div>
</form>


<?php } ?>

<?php if(isset($rid)) { ?>

   <div class=  comment>
  <div class= 'details'> 
<span > <?php echo  $_SESSION['user_name'] ?> 
</div> 
<form action= updateComment.php>
  <img class=  avatar src= 'my img/selena.jpg' /> 
  <textarea class= post name= replyMsg > <?php echo $reply ?>  </textarea>
  <div>
    <input  class= mainButton type= 'submit' name= 'editReply'  value= 'edit'/>
    <input  class= mainButton type= 'submit' name= 'cancel'  value= 'cancel'/>
    <input type= hidden name='itemId' value= <?php echo $itemId ?> />
    <input type= hidden name='rid' value= <?php echo $rid?> />
  </div>
</form>

<?php } ?>

