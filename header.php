<style>
	a{
		color:#000!important;
		
	}
	.info-contact-agile ul li
	{
		padding-left:10px;
	}
	
	
</style>
         <div class="header-bar">
            <div class="info-top-grid">
               <div class="info-contact-agile">
                  <ul>
				  <?php
					if(isset($_SESSION["name"]))
					{
						$a=$_SESSION["name"];
			
						print "<li><a href='showcart.php'>Show Cart</a></li>
								<li><a href='cpass.php'>Change Password</a></li>
								<li><a href='logout.php'>Logout</a></li>
								<li><a href='#'>Welcome $a</a></li>";
					}
					else
						{
						print "<li><a href='signup.php'>Create Account</a></li>
								<li><a href='login.php'>Login</a></li>
								<li><a href='#'>Welcome Guest</a></li>";
					}
					?>
                    
                     <li>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="container-fluid">
               <div class="hedder-up row">
                  <div class="col-lg-3 col-md-3 logo-head">
                     <h1><a class="navbar-brand" href="index.html">gift shop</a></h1>
					 </div>
				 <div class="col-lg-5 col-md-6 search-right">
                     <form class="form-inline my-lg-0" action="searchres.php">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" name="srch">
                        <button class="btn" type="submit" name="s">Search</button>
                     </form>
                  </div>
                  <div class="col-lg-4 col-md-3 right-side-cart">
                     <div class="cart-icons">
                       
                     </div>
                  </div>
               </div>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light">
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                  <ul class="navbar-nav ">
                     <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                     </li>
                     <li class="nav-item">
                        <a href="showcat.php" class="nav-link">Buy Products</a>
                     </li>
					  <li class="nav-item">
                        <a href="order.php" class="nav-link">My Orders</a>
                     </li
					  <li class="nav-item">
                        <a href="contact.php" class="nav-link">Contact</a>
                     </li>
					  <li class="nav-item">
                        <a href="feedback.php" class="nav-link">Feedback</a>
                     </li>
                     
                    
                     
                    
                  </ul>
               </div>
            </nav>
         </div>
         <!-- Slideshow 4 -->
         <div class="slider text-center">
            <div class="callbacks_container">
               <ul class="rslides" id="slider4">
                  <li>
 <div class="slider-img one-img">
                        <div class="container">
                           <div class="slider-info ">						   
						   
						   <div class="container23">
						   <span class="text1">Pick The Best Gifts</span>
						   <span class="text2">For Your Family And Relatives</span>
						   </div>
</div>
</div>
</div>
                  </li>
                 
                 
               </ul>
            </div>
            <!-- This is here just to demonstrate the callbacks -->
            <!-- <ul class="events">
               <li>Example 4 callback events</li>
               </ul>-->
            <div class="clearfix"></div>
         </div>
