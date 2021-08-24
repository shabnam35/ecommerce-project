<?php
session_start();
?>
<html>
<head>
<title>View Category</title>
<body>
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
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Manage Category</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h2>View Category</h2>
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
			<?php
			require_once("vars.php");
			$conn = mysqli_connect(hname,uname,password,dbname) or die("Error in connection " . mysqli_connect_error());
			$qu="select * from managecat";
			$res=mysqli_query($conn,$qu) or die(mysqli_error($conn));
			$count=mysqli_affected_rows($conn);
			if($count>=1)
			{
				print "<table class='table'>
				<tr>
				<th>Image</th>
				<th>Name</th>
				<th>Update</th>
				<th>Delete</th></tr>";
				while($ans=mysqli_fetch_array($res))
				{
					print "<tr>
					<td><img src='uploads/$ans[2]' width='110px' height='100px'</td>
				<td>$ans[1]</td>
				<td><a href='updatecat.php?catid=$ans[0]'>Update</a></td>
				<td><a href='deletecat.php?catid=$ans[0]'>Delete</a></td></tr>";
				}
				print "</table>";
			}
			?>
			
	
			</div>
			
		</div>
	</div>

<?php
require_once("footer.php");
?>

</body>
</html> 
