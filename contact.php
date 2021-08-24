<?php

session_start();

if(isset($_POST["s1"]))
{
	
	$n=$_POST["nm"];
	$ph=$_POST["ph"];
	$email=$_POST["em"];
	$msg=$_POST["msg"];
	require_once("vars.php");
	
	$conn=mysqli_connect(hname,uname,password,dbname) or die("Error in connection" . mysqli_connect_error());
	
	$q="insert into contact (Name,Phonenumber,email,Message) values('$n','$ph','$email','$msg')";
	
	mysqli_query($conn,$q) or die(mysqli_error($conn));
	
	$count=mysqli_affected_rows($conn);
	
	mysqli_close($conn);
	if($count==1)
	{
		$msg="Thanks for contacting us";
	}
	else
	{
		$msg="Message not sent";
	}
}


?>


<html>
<head>
<title>Contact Us</title>
<?php
include_once("extfiles.php");
?>
<style>
  table, td {
    border: 1px solid grey;
    padding: 10px;
	
  }
  </style>
</head>
<body>
<?php
include_once("header.php");
?>
<div class="page-head_agile_info_w3l">
		<div class="container">
			<marquee width="800px"><h3><b>Gift</b> <span><b>Gallery</b></span></h3></marquee>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   
						 </div>
				</div><br/><br/>
	   <!--//w3_short-->
	</div>
</div>

<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<!--contact -->
		  <section class="contact py-lg-4 py-md-3 py-sm-3 py-3">
			 <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
				<h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Contact US</h3>
				<div class="contact-list-grid">
				   <form action="#" method="post">
					  <div class=" agile-wls-contact-mid">
						 <div class="form-group contact-forms">
							<input type="text" class="form-control" required=" " name="nm" placeholder="Name">
						 </div>
						 <div class="form-group contact-forms">
							<input type="text" class="form-control" required=" " maxlength="10" name="ph" placeholder="Phone no">
						 </div>
						 <div class="form-group contact-forms">
							<input type="email" class="form-control" required=" " name="em" placeholder="Enter Email">
						 </div>
						 <div class="form-group contact-forms">
							<textarea class="form-control" name="msg" rows="3"></textarea>
						 </div>
						 <button type="submit" name="s1" class="btn btn-block sent-butnn">Send</button><br>
						 <?php
					
					if(isset($msg))
					{
						print $msg;
					}
					
					?>
					  </div>
				   </form>
				</div>
			 </div>
			 <!--//contact-map -->
		  </section>
			
			
		</div>
	</div>



<?php
include_once("footer.php");
?>
</body>
</html> 