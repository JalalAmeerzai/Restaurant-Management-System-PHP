<?php
extract($_GET);
 require('connection.php');
 $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
 session_start();
extract($_SESSION);
?>

<!DOCTYPE html>
     <html >
    <head>
        <link rel='stylesheet'  href= ' my css/post.css' />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link rel='stylesheet'  href= 'my css/rating.css' />
        <style> 
        .avatar{margin-bottom: 70px;} 
        .details{position: relative; top: 7px; color: red;} 
        .mainButton{position: relative; bottom: 50px;}
        .rb{position: relative; bottom: 50px;}
        textarea{resize: none;}
    
  }
        </style>


      <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
            <!--
            CSS
            ============================================= -->
            <link rel="stylesheet" href="css/linearicons.css">
            <link rel="stylesheet" href="css/font-awesome.min.css">
            <link rel="stylesheet" href="css/bootstrap.css">
            <link rel="stylesheet" href="css/magnific-popup.css">
            <link rel="stylesheet" href="css/jquery-ui.css">
            <link rel="stylesheet" href="css/nice-select.css">
            <link rel="stylesheet" href="css/animate.min.css">
            <link rel="stylesheet" href="css/owl.carousel.css">
            <link rel="stylesheet" href="css/main.css">

    </head>
   <body onload="loding()">



   <?php  require('navBar.php'); ?>


      <!-- start banner Area -->
      <section class="about-banner relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
          <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
              <h1 class="text-white">
              
                <!-- start error handling  -->
                <?php if(!isset($activeUser)) {?>
                <h2 class="text-white">You have to be logged in to share the discussion, and rate the item</h2>
                <?php }?>
                 <!-- End error handling -->

              </h1>
            </div>
          </div>
        </div>
      </section>
      <!-- End banner Area -->

		 <!-- item details table -->
		 

   <?php 
     $query= "select * from menu where item_id= $itemId";
     $pdoS= $db->query($query);
     $obj= $pdoS->fetch();
     $img = $obj->img;
     $desc = $obj->item_des;
     $name = $obj->item_name;
     $price= $obj->price;
		 $cat= $obj->item_cat;
             if(isset($activeUser))
             {
		 $query2= "select userPic  from users  where user_id= $activeUser";
		 $pdoS= $db->query($query2);
		 $row= $pdoS->fetch();
             $userPic= $row->userPic;
             }
             
     ?>
     

  
      <table class="table">
            <tr><th> picture </th> <th> name </th> <th>category </th>  <th> description <th> <th> price </th> </tr>
            <tr>
                              <td rowspan="3"> <img src= '<?php echo $img ?>' width= 200px; height= 200px;> </td>


                              <td> <?php echo $name ?> </td><br>
                              <td> <?php echo $cat ?></td><br>

                              <td><p><?php echo $desc ?></td>
                                    <td > <?php echo $price ?> </p></td>
                              </tr>
      </table>


              <!-- rating -->

     
           <?php   if(isset($activeUser)) {?>
            <div class="row d-flex align-items-center justify-content-center">
            
            <form class="" action="insertRating.php" >
                  
			<input id="star-5"   type="radio" name="rating" value="5"   />
			<label for="star-5" title="5 stars">
					<i class="active fa fa-star" aria-hidden="true"></i>
			</label>
			<input id="star-4"  type="radio" name="rating" value="4" />
			<label for="star-4" title="4 stars">
					<i class="active fa fa-star" aria-hidden="true"></i>
			</label>
			<input id="star-3" type="radio" name="rating" value="3"  checked />
			<label for="star-3" title="3 stars">
					<i class="active fa fa-star" aria-hidden="true"></i>
			</label>
			<input id="star-2"  type="radio" name="rating" value="2"  />
			<label for="star-2" title="2 stars">
					<i class="active fa fa-star" aria-hidden="true"></i>
			</label>
			<input id="star-1"  type="radio" name="rating" value="1" />
			<label for="star-1" title="1 star">
					<i class="active fa fa-star" aria-hidden="true"  ></i>
			</label>
                  <input class= 'genric-btn primary' type= submit name=rateB value='rate  <?php echo $name ?>' >
                  <input type= hidden name= raterID value= <?php echo $activeUser ?>  >
                  <input type= hidden name= itemID value= <?php echo $itemId ?>  >
             </form>
		</div>
    
            <?php } ?>

            <?php 
            $count= 0;
            $t=0;
            $avgInt=0;
     $query= "select value from rating where itemID= $itemId ";
     $pdosR= $db->query($query);
      foreach ($pdosR as $rating)
      {
      $t= $t + $rating->value;
      $count++;
      }
      if($count== 0)
      $count=1;
      $avgInt= round($t/$count);
      
     ?>
            <br><br>
            <div class="row d-flex align-items-center justify-content-center">
            <span> customers average rating </span>

        <?php 
        for($i=5 ;  $i>=1 ; $i--) 
        {
        if ( $avgInt == $i)
        echo
        "<input id= test  class = read type='radio' name='rated' value='$i'  />
        <label  title='$i stars'>
                    <i class='active fa fa-star' ></i>
        </label>";
        else
        echo
        "<input   class = read type='radio' name='rated' value='$i'  />
        <label  title='$i stars'>
                    <i class='active fa fa-star' ></i>
        </label>";
        }
       ?>

     </div>
     

  <div class= "  align-items-center justify-content-center">
  <!-- new comment -->

       <?php
               if(isset($_SESSION["activeUser"]))
               {
                 $name= $_SESSION['user_name'];
                 date_default_timezone_set("Asia/Bahrain"); 
                 $date = date("Y-m-d H:i:s");
									$sid= $_SESSION["activeUser"];
									
									 

        ?>

                     <div class= comment>
                           <div class= 'details'> <span id= name> <?php echo $name ?> </span>  </div> 
                            <form action= 'insertComment.php'>
                              <img class=  avatar src= '<?php echo $userPic  ?>'  />               
                              <textarea class= post name= 'msg'>   </textarea>
                              <div> <input   type= submit id= 'cb'  class= 'mainButton genric-btn primary'  value= comment name= cb /> </div>
                              <input type= hidden name='sUid' value= '<?php echo $sid ?>' />
                              <input type= hidden name='date' value='<?php echo $date?>' /> 
                              <input type= hidden name='itemId'value='<?php echo $itemId ?>'>
                           </form>
                     </div>

            <?php } ?>
            


            <?php

            // retrieving comments
            
            $i=0;
            $query2 = "SELECT * from commenter c,users u where c.commenterId = u.user_id and itemId= '$itemId' ORDER BY date DESC ";
            $pdoS2= $db->query($query2);
            echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";
         
            foreach($pdoS2 as $obj2)
            {
                   
                     $name= $obj2->name;  // or we can use $_SESSION["user_name"]
                     $date= $obj2->date;
                     $comm= $obj2->comment;
                     $cid=  $obj2->cid;
                     $cUserPic= $obj2->userPic;
                     //info to be submitted to "editComment.php"
                     $commenterId= $obj2->commenterId;   
                     $itemId= $obj2->itemId;
                     if( isset($sid) && $sid == $commenterId)
                     $editable = 'edit';
                     else
                     $editable= 'noEdit';

                  ?>
                      <div class=  comment>
                           <div class= 'details'> 
                           <span > <?php echo $name ?> </span> <span class= date> <?php echo $date ?> </span> 
                           <a  class = '<?php echo $editable ?>' href= '<?php echo "editComment.php?cid=$cid&comm=$comm&itemId=$itemId&userPic=$userPic"; ?>'> edit</a> 
                           </div> 
                           <form>
                           <img class=  avatar src= '<?php echo $cUserPic ?>' /> 
                           <textarea class= post disabled> <?php echo $comm ?>  </textarea>
                           </form>


                              <div class= vreps>
                                       <button id= 'b<?php echo $i ?>' class= 'mainButton genric-btn primary'>Reply and see other replies</button>
                                       <div id='myDropdown<?php echo $i ?>' class='dropdown-content' >
                                              <?php if(isset($_SESSION['activeUser'])) { ?>
                                                                                           <!-- new reply -->
                                                                                          <div class= reply>
                                                                                                <div class= 'details rDetails'> <span > <?php echo $_SESSION['user_name']; ?> </span>  </div>
                                                                                             <form action = 'insertReply.php' method= 'get' > 
                                                                                                   <img class=  'avatar ravatar' src='<?php echo $userPic ?>'  /> 
                                                                                                   <textarea class = 'post rPost' name= 'replyMsg'>    </textarea><br>
                                                                                                   <div> <input type= submit value= reply  class = 'rb genric-btn primary' name= rb /> </div>
                                                                                                   <input type= hidden name='sUid' value= '<?php echo $sid ?>' />
                                                                                                   <input type= hidden name='cid' value= '<?php echo $cid ?>' />
                                                                                                   <input type= hidden name='itemId' value= '<?php echo $itemId ?>' />
                                                                                                   <input type= hidden name='commenterID' value= '<?php echo $commenterId ?>' />
                                                                                                   <input type= hidden name='comm' value= '<?php echo $comm ?>' />
                                                                                             </form>
                                                                                                      
                                                                                          
                                                                                          </div>
                                                                            <?php } ?>
                                                         <?php

                                                         // retrieving replies
                                                         $q= "SELECT * from replier r,commenter c where r.cid= c.cid AND r.cid= $cid ORDER BY r.date DESC ";
                                                         $pdoS3 = $db->query($q);
                                                              
                                                        


                                                               foreach($pdoS3 as $replier)
                                                               {
                                                                   
                                                                     $rid= $replier->rid; 
                                                                     $reply= $replier->reply;
                                                                     $rDate= $replier->date;
                                                                     $replierId= $replier->replierId;
                                                                     //print_r($replier);
                                                                     $q2= "SELECT * from replier r,users u WHERE replierId= user_id  AND  rid=$rid ORDER BY r.date ";
                                                                     $pdoS4= $db->query($q2);
                                                                     $object= $pdoS4->fetch();
                                                                     //print_r($object);
                                                                     $replierName= $object->name;
                                                                     $rUserPic= $object->userPic;
                                                                     if( isset($sid) && $sid== $replierId)
                                                                     $editable = 'edit';
                                                                     else
                                                                     $editable= 'noEdit';

                                                               ?>

                                                                     <div class= reply>
                                                                        <div class= 'details rDetails'>
                                                                          <span> <?php echo    $replierName ?>  </span> <span class= date> <?php echo $rDate ?> </span> 
                                                                          <a  class = '<?php echo $editable ?>' href= '<?php echo "editComment.php?rid=$rid&reply=$reply&itemId=$itemId&rUserPic=$rUserPic"; ?>'> edit</a> 
                                                                        </div>
                                                                        <img class=  'avatar ravatar' src='<?php echo $rUserPic ?>' /> 
                                                                        <textarea class = 'post rPost' disabled> <?php echo $reply ?> </textarea><br>
                                                                     </div>
                                                            <?php } ?>
                                          </div>
                             </div>


                                          <script>
                                                   $(document).ready(function(){
                                                   $("#b<?php echo $i ?>").click(function(){
                                                   $('#myDropdown<?php echo $i ?>').slideToggle(function(){                                  // $(selector).slideToggle(speed,easing,callback)
                                                   if(document.getElementById("b<?php echo $i ?>").innerHTML == "Reply and see other replies")
                                                   $("#b<?php echo $i ?>").html('hide Replies');
                                                   else
                                                $("#b<?php echo $i ?>").html('Reply and see other replies');
                                                }); 
                                                });
                                                });
                                          </script> 
                     </div>       
 <?php  $i++;  }  ?>

 </div>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script>
			$(".read").attr('disabled', true);
			$("#test").attr('checked' , true);
            </script>
            <?php require('footerArea.php') ?>
 <?php require("my main html/mainJS.html") ?>
 
 
</body>
</html>

 
