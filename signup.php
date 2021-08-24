<?php
ob_start();
?>
<html>
<head><title>Signup</title>
<?php
require_once("extfiles.php");
?>
<script>
function checkName(e)
{
	var a=e.keyCode;
	if((a>=65 && a<=90)||(a>=97 && a<=122)|| a==32)
	{
		return true;
	}
	else
	{
	return false;	
	}
}
function checkPhno(e)
{
	var a=e.keyCode;
	if((a>=48 && a<=57))
	{
		return true;
	}
	else
	{
	return false;	
	}
}
</script>
</head>
<body>
<?php
require_once("header.php");
?>
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Register Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- register -->
	<div class="register">
		<div class="container">
		<font color="red">	<h2 style="margin-bottom:20px" align="center">Register Here</h2></font>
			<div class="login-form-grids" align="center">
				<font color="red"><h5 style="margin-bottom:20px">##Profile Information</h5></font>
				<form name="form1" method="post">
					<input type="text"  name="nm" placeholder="Name..." required onkeypress="return checkName(event)" style="margin-bottom:10px"><br/>
					<input type="text" name="ph" placeholder="Phone " required minlength="10" maxlength="10" onkeypress="return checkPhno(event)" style="margin-bottom:10px"><br/>
					<input type="radio" name="gen" value="male" required>Male
					<input type="radio" name="gen" value="female" required style="margin-bottom:20px">Female
				
				
				<font color="red"><h6 style="margin-bottom:0px">##Login information</h6></font>
					
					<br/><input type="email" name="un" placeholder="Email Address" required style="margin-bottom:10px"><br/>
					<input type="password" name="pass" placeholder="Password" required style="margin-bottom:10px"><br/>
					<input type="password" name="cpass" placeholder="Password Confirmation" required style="margin-bottom:10px"><br/>
				
					<input type="submit" name="s1" value="Register"><br/>
					<?php
					if(isset($_POST["s1"]))
					{
							$n=$_POST["nm"];
							$ph=$_POST["ph"];
							$gen=$_POST["gen"];
							$un=$_POST["un"];
							$pass=$_POST["pass"];
							include_once("vars.php");
							$conn=mysqli_connect(hname,uname,password,dbname) or die("Error in connection" . mysqli_connect_error());
							$q="insert into signup values ('$n','$ph','$gen','$un','$pass','user')";
							mysqli_query($conn,$q) or die("Error in query" . mysqli_error($conn));
							$count=mysqli_affected_rows($conn);
							mysqli_close($conn);
							if($count==1)
							{
								header("location:thanks.php");
							}
							else
							{
								print " Problem in signing up,Please try again";
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
	