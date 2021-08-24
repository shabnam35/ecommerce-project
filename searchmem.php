<?php
session_start();
?>
<html>
<head><title>Search Member</title>
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
require_once("adminheader.php");
?>
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a> / </li>
				<li class="active">Login Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h2 align="center"> Search Member</h2>
		
			<div class="login-form-grids animated wow slideInUp col-sm-8" style="margin:auto;" data-wow-delay=".5s">
				<form name="form1" method="post">
					<input type="email" class="form-control" placeholder="Enter Email Address to search" name="em"><br>
					
					
					<input type="submit" name="s1" value="Login"><br/>
					<?php
					if(isset($_POST["s1"]))
					{
							$un=$_POST["em"];
							
							require_once("vars.php");
							
							$conn=mysqli_connect(hname,uname,password,dbname) or die("Error in connection" . mysqli_connect_error());
							$q="select * from signup where Username='$un' ";
							$res= mysqli_query($conn,$q) or die("Error in query" . mysqli_error($conn));
							$count=mysqli_affected_rows($conn);
							mysqli_close($conn);
							if($count==1)
							{
								$x=mysqli_fetch_array($res);
								print "<b>Name:-</b> $x[0]<br/>";
								print "<b>Phone:-</b> $x[1]<br/>";
								print "<b>Gender:-</b> $x[2]<br/>";
								print "<b>Username:-</b> $x[3]<br/>";
							}
							else
							{
								$msg="No records foung";
							}
					}
					?>
				</form>
			</div>
			
		</div>
	</div>
	<?php
	require_once("footer.php");
	?>
	</body>
	</html>