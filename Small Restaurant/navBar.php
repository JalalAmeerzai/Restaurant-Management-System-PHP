
<header id="header">
<script  language="JavaScript"  src="search.js" ></script>


				<div class="header-top">
					<div class="container">
				  		<div class="row justify-content-center">
                <div id="logo">
								<a href="home.php"><img src="imgs/<?php echo $logo ?>" width="100" height="70" alt="" title="" /></a>                </div>
				  		</div>
					</div>
				</div>
				<div class="container main-menu">
					<div class="row   d-flex">
				      <nav id="nav-menu-container">
				        <ul class="nav-menu" style="list-style-type:none;" >
				          <li><a href="home.php">Home</a></li>
									<li><a href="menu.php">Menu</a></li>
									<?php if(isset($user_type) && $user_type=='admin'){?>
									<li><a href="ViewCustomerMsg.php">Contact massages</a></li>
									<?php }else  {?>
								<li><a href="contact.php">Contact us</a></li>
									<?php }?>

									<?php
									if (!isset($activeUser)){
									echo "<li><a href='login.php'>Login</a></li>";
                  echo "<li><a href='Register.php'>sign up</a></li>";
                }
									else{ ?>
                <li><a href='disblay_orders.php'>orders</a></li>
								<?php if($user_type=='customer'){ ?>
								<li><a href='viewcart.php'>View cart <span style=" font-size:130%; color:white; background-color:red; border-radius:60%;"><?php if(isset($qty)) echo "01"; ?></span> </a></li>
							<?php } ?>
								<li><a href='logout.php'>Logout</a></li>
								<li><a href='Profile.php'>Profile</a></li>

							<?php }
									?>
									<!--  -->
							   <li style="list-style-type:none;">

										<input type="search" id="searchBar"  class="search fa-search " autocomplete="off"    onkeyup="search1(this.value)" type="text" placeholder="Search" name="search">
										<br/>

										<form  id="searchForm" action="menu.php" method="get" class="searchText">

										<button type="submit" name="searchResult" value="" class="search-btn" id='L1'></button> <br/>
										<button type="submit" name="searchResult" value="" class="search-btn" id='L2'></button> <br/>
										<button type="submit" name="searchResult" value="" class="search-btn" id='L3'></button> <br/>
										<button type="submit" name="searchResult" value="" class="search-btn" id='L4'></button> <br/>
										<button type="submit" name="searchResult" value="" class="search-btn" id='L5'></button> <br/>



									</form>

									</li>



				        </ul>
				      </nav><!-- #nav-menu-container -->
					</div>
				</div>
			</header><!-- #header -->
