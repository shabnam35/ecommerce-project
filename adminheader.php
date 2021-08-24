<style>
	a{
		color:#000!important;
		
	}
	.info-contact-agile ul li
	{
		padding-left:10px;
	}
</style>
<?php

if(!isset($_SESSION["name"]))
{
	header("location:login.php");
}
else if($_SESSION["utype"]!="admin")
{
	header("location:login.php");
}
?>
         <div class="header-bar">
            <div class="info-top-grid">
               <div class="info-contact-agile">
                  <ul>
				  <?php
					if(isset($_SESSION["name"]))
					{
						$a=$_SESSION["name"];
						print "<li><a href='cpass.php'>Change Password</a></li>
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
                     <h1><a class="navbar-brand" href="admin.php">gift Shop</a></h1>
                  </div>
                  <div class="col-lg-5 col-md-6 search-right">
                     <form class="form-inline my-lg-0">
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
                    
					  <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        All Services
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                           <a class="nav-link" href="managecat.php">Add Category</a>
                           <a class="nav-link " href="managesubcat.php">Add Subcategory</a>
						    <a class="nav-link " href="manageprod.php">Add Product</a>
                        </div>
                     </li>
					  <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Update/Delete
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                           <a class="nav-link" href="vcat.php">Category</a>
                           <a class="nav-link " href="vsubcat.php">Subcategory</a>
						    <a class="nav-link " href="vprod.php">Product</a>
                        </div>
                     </li>
					  <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Members
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                           <a class="nav-link" href="listofmembers.php">List of Members</a>
                           <a class="nav-link " href="searchmem.php">Search Members</a>
						   
                        </div>
                     </li>
                     <li class="nav-item">
                        <a href="order.php" class="nav-link">All Orders</a>
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
                              <h5>Pick The Best gifts For <br>Your Family & Relatives</h5>
                              
                              
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
