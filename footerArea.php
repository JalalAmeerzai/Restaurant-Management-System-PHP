<footer class="footer-area">
				<div class="footer-widget-wrap">
					<div class="container">
						<div class="row section-gap">
							<div class="col-lg-4  col-md-6 col-sm-6">
								<div class="single-footer-widget">




							<?php
									if(isset($submitFooter) )
									{
										try{
										require('connection.php');
										$sql2="update websitetexts set textField='$days' where textName='days' ";
										$db->exec($sql2);

										$sql2="update websitetexts set textField='$time' where textName='time' ";
										$db->exec($sql2);

										$sql2="update websitetexts set textField='$SaturdayTime' where textName='SaturdayTime' ";
										$db->exec($sql2);

										$sql2="update websitetexts set textField='$SundayTime' where textName='SundayTime' ";
										$db->exec($sql2);

										$sql2="update websitetexts set textField='$numbers1' where textName='numbers1' ";
										$db->exec($sql2);

										$sql2="update websitetexts set textField='$address' where textName='address' ";
										$db->exec($sql2);

										$sql2="update websitetexts set textField='$numbers2' where textName='numbers2' ";
										$db->exec($sql2);

										$db=NULL;
										}catch(PDOException $e){ die($e->getMessage());}

									}




							try{
								require('connection.php');
									$sql="select * from websitetexts";
									$texts=$db->query($sql);
									$db=NULL;
								}catch(PDOException $e){ die($e->getMessage());}


							foreach($texts as $text){

								if($text['textName']=='days' )
									 $days=$text['textField'];

								if($text['textName']=='daysTime' )
									 $time=$text['textField'];

								if($text['textName']=='SaturdayTime')
									 $SaturdayTime=$text['textField'];

							 if($text['textName']=='SundayTime' )
									 $SundayTime=$text['textField'];

							 if($text['textName']=='numbers1' )
							 $numbers1=$text['textField'];

							 if($text['textName']=='address' )
							  $address=$text['textField'];

							 if($text['textName']=='numbers2' )
							 $numbers2=$text['textField'];



							}


								if(isset($user_type) && $user_type=='admin'){

									?>

								<form action="" method = "POST" >
								<h4>Opening Hours</h4>
									<ul class="hr-list">
										<li class="d-flex justify-content-between">
											<span> <textarea  style="background: transparent; border:none;"  name="days" id="" cols="20" rows="1"><?php echo $days ?></textarea></span> <span><textarea  style="background: transparent; border:none;" name="time" id="" cols="25" rows="1"><?php echo $time?></textarea> </span>
										</li>
										<li class="d-flex justify-content-between">
											<span>Friday</span> <span><textarea  style="background: transparent; border:none;" name="SaturdayTime" id="" cols="20" rows="1"><?php echo  $SaturdayTime ?></textarea> </span>
										</li>
										<li class="d-flex justify-content-between">
											<span>Saturday</span> <span> <textarea  style="background: transparent; border:none;"name="SundayTime" id="" cols="20" rows="1"><?php  echo  $SundayTime?></textarea></span>
										</li>
									</ul>
								</div>
							</div>
							<div class="col-lg-4  col-md-6 col-sm-6">
								<div class="single-footer-widget">
									<h4>Contact Us</h4>
									<p>
									<textarea style="background: transparent; border:none;" name="address" id="" cols="120" rows="1"><?php    echo $address	?></textarea>
										</p>
									<p class="number">
									<textarea style="background: transparent; border:none;" name="numbers1" id="" cols="25" rows="1"> <?php echo $numbers1; ?></textarea>

									<br/>
									<textarea  style="background: transparent; border:none;" name="numbers2" id="" cols="25" rows="1"><?php echo $numbers2;?></textarea>

									</p>
									<span><input  class="primary-btn text-uppercase" style="background: transparent; background-color:black "  type="submit" value="Edit" name="submitFooter"></span>
									</form>
								</div>
							</div>
							<?php
									} else {
							?>
                 <h4>Opening Hours</h4>
									<ul class="hr-list">
										<li class="d-flex justify-content-between">
											<span> <?php echo $days ?></span> <span><?php echo $time?> </span>
										</li>
										<li class="d-flex justify-content-between">
											<span>Saturday</span> <span><?php echo $SaturdayTime ?> </span>
										</li>
										<li class="d-flex justify-content-between">
											<span>Sunday</span> <span> <?php  echo  $SundayTime?></span>
										</li>
									</ul>
								</div>
							</div>
							<div class="col-lg-4  col-md-6 col-sm-6">
								<div class="single-footer-widget">
									<h4>Contact Us</h4>
									<p>
									<?php    echo $address	?>
										</p>
									<p class="number">
									 <?php echo $numbers1; ?>

									<br/>
								<?php echo $numbers2;?>
									</p>
								</div>
							</div>

     </div>
	</footer>

               <?php
									}
							?>
