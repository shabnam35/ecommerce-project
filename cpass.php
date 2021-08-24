   <?php
   session_start();
   if(!isset($_SESSION["name"]))
   {
       header("location:login.php");
   }
                if(isset($_POST["s1"]))
                    {
                       $cu=$_POST["cupass"];
                       $pass=$_POST["npass"];
                       $chpass=$_POST["cpass"];
                       if ($pass==$chpass)
                       {
                       $un=$_SESSION["email"];
                           
                          
                                include_once("vars.php");
                           $conn=mysqli_connect(hname,uname,password,dbname)or die("Error in connection" . mysqli_connect_error());
                           $q="select * from signup where username='$un' and password='$cu'";
                           $res=mysqli_query($conn,$q)or die ("error in query".mysqli_error($conn));
                          $count= mysqli_affected_rows($conn);
                          print $un;
                          print $count;
                          if ($count==1)
                          {
                           $qu="update signup set password='$pass' where username='$un'";
                           mysqli_query($conn,$qu)or die ("error in query".mysqli_error($conn));
                           $count= mysqli_affected_rows($conn);
                           mysqli_close($conn);
                           if ($count==1)
                           {
                           $msg="password changed";
                           }
                           else
                           {
                               $msg="problem";
                           }
                          }     
                           else
                           {
                               $msg="current password is wrong";
                           }
                          
                       }
                           
                               
                         
                    }
                    ?>




<html>
<head><title> LOGIN page</title>
<?php
require_once("extfiles.php");
?>
<style>
	a{
		color:#000!important;
		
	}
	.info-contact-agile ul li
	{
		padding-left:10px;
	}
</style>
</head>
<body>
<?php
if($_SESSION["utype"]=="admin")
require_once("adminheader.php");
else	
require_once("header.php");
?>
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a> / </li>
				<li class="active">Change Password</li>
			</ol>
		</div>
	</div>
     <div class="login">
		<div class="container">
			<h2>Change Password</h2>
			<div class="login-form-grids animated wow slideInUp col-sm-8" data-wow-delay=".5s" style="margin:auto;">
				<form method="post" class="creditly-card-form agileinfo_form">
				  <section class="creditly-wrapper wrapper">
						<div class="information-wrapper">
							<div class="first-row form-group">
								<div class="controls">
									<label class="control-label">Current Password: </label>
									<input type="password" name="cupass" class="form-control" placeholder="Current Password"> 
								</div>
								<div class="controls">
									<label class="control-label">New Password </label>
									<input type="password" name="npass" class="form-control" placeholder="New Password">
								</div>
								<div class="controls">
									<label class="control-label">Confirm Password: </label>
									<input type="password" name="cpass" class="form-control" placeholder="Confirm Password">
								</div>
								<input type="submit" name="s1" value="Change password"><br>
								<?php 
									if (isset($msg))
									{
										print $msg;
									}
								
								?>
							</div>
						</div>
					</section>
				</form>
			</div>
			
		</div>
	</div>
    <?php
    require_once("footer.php");
    ?>
    </body>
    </html>