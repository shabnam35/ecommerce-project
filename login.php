<?php
ob_start();
session_start();
					if(isset($_POST["s1"]))
					{
							$un=$_POST["em"];
							$pass=$_POST["pass"];
							include_once("vars.php");
							$conn=mysqli_connect(hname,uname,password,dbname) or die("Error in connection" . mysqli_connect_error());
							$q="select * from signup where Username='$un' and Password='$pass'";
							$res=mysqli_query($conn,$q) or die("Error in query" . mysqli_error($conn));
							$count=mysqli_affected_rows($conn);
							mysqli_close($conn);
						if($count==1)
						{
								$res=mysqli_fetch_array($res);
								$_SESSION["name"]=$res[0];
								$_SESSION["utype"]=$res[5];
								$_SESSION["email"]=$res[3];
								if($res[5]=="admin")
								{
									header("location:admin.php");
								}
							else 
							{
									if(isset($_GET["pid"]))
									{
										$a=$_GET["pid"];
										header("location:showproddetails.php?pid=$a");
									}
								 else 
								{
								header("location:index.php");	
								}
								
							}
						}
							 else 
							{
								$msg="Incorrect Username/Password";
							}
					}
					
					?>
<html>
<head><title>Login Page</title>
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
require_once("header.php");
?>
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home /</a></li>
				<li class="active">Login Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<font color="red"><h2 align="center" style="margin-bottom:20px">Login Form</h2></font>
			<?php
				if(isset($_GET["pid"]))
					print "To add products plz login first!!!!!!!<br/>";
				?>
			<div class="login-form-grids animated wow slideInUp col-sm-8" data-wow-delay=".5s" style="margin:auto;">
				<form method="post" class="creditly-card-form agileinfo_form">
                              <section class="creditly-wrapper wrapper">
                                 <div class="information-wrapper">
                                    <div class="first-row form-group">
                                       <div class="controls">
                                          <label class="control-label">Email Id: </label>
                                          <input type="email" placeholder="Email Address" name="em" class="form-control" style="margin-bottom:10px">
                                       </div>
                                       <div class="card_number_grids">
                                          <div class="card_number_grid_left">
                                             <div class="controls">
                                                <label class="control-label">Password:</label>
                                                <input type="password" placeholder="Password" name="pass"class="form-control" style="margin-bottom:10px"><br/>
					
                                             </div>
                                          </div>
                                          <div class="clear"> </div>
                                       </div>
                                    </div>
                                    <input type="submit" name="s1" value="Login" align="center">
									<?php
					if(isset($msg))
					{
						print $msg;
					}
					?>
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