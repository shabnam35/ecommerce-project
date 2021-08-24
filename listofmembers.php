<?php
session_start();
?>
<html>
<head><title>List of Members</title>
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
			<h2>List of Members</h2><br/>
		
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				
					<?php
					
							require_once("vars.php");
							
							$conn=mysqli_connect(hname,uname,password,dbname) or die("Error in connection" . mysqli_connect_error());
							$q="select * from signup where user='user'";
							$res= mysqli_query($conn,$q) or die("Error in query" . mysqli_error($conn));
							$count=mysqli_affected_rows($conn);
							mysqli_close($conn);
							if($count==0)
							{
								$msg="No records foung";
								
							}
							else
							{
								print "<table class='table table-striped'>
								<tr><th>Name</th>
								<th>Phone</th>
								<th>Gender</th>
								<th>Username</th></tr>";
								while($x=mysqli_fetch_array($res))
								{
									print "<tr>
									<td> $x[0] </td>
									<td> $x[1] </td>
									<td> $x[2] </td>
									<td> $x[3] </td></tr>";
								}
								print "</table>";
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