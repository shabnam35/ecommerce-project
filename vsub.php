<?php
session_start();

?>



<html>
<head><title>Manage Subcategory</title>
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
				<li class="active">Manage Subcategory</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h2>Manage Subcategory</h2>
		
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
<form name="form1" method="post" enctype="multipart/form-data">
	<select name="cat" class="form-control">
	<option>Choose Category</option>
	<?php
	require_once("vars.php");
	$conn = mysqli_connect(hname,uname,password,dbname) or die("Error in connection " . mysqli_connect_error());
	$qu="select * from managecat";
	$res=mysqli_query($conn,$qu) or die(mysqli_error($conn));
	$row=mysqli_affected_rows($conn);
	if($row>=1)
	{
		while($ans=mysqli_fetch_array($res))
		{
			if(isset($_POST["go"]))
			{
				$c=$_POST["cat"];
				if($c==$ans[0])
				{
					print "<option value='$ans[0]' selected>$ans[1]</option>";
				}
				else
				{
					print "<option value='$ans[0]' >$ans[1]</option>";
				}
			}
			else
			{
				print "<option value='$ans[0]' >$ans[1]</option>";
			}
			
		}
	}
	else
	{
		print "<option>No Category Available</option>";
	}
	?>
	</select>
	<input type="submit" name="go" value="Go" style="margin-bottom:10px">
	
	<?php
	if(isset($_POST["go"]))
{
		$catid=$_POST["cat"];
		require_once("vars.php");
		$conn = mysqli_connect(hname,uname,password,dbname) or die("Error in connection " . mysqli_connect_error());
		$qu="select * from managesubcat where catid='$catid'";
		$res=mysqli_query($conn,$qu) or die(mysqli_error($conn));
		$count=mysqli_affected_rows($conn);
		mysqli_close($conn);
			
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
				<td><img src='uploads/$ans[3]' width='110px' height='100px'</td>
				<td>$ans[2]</td>
				<td><a href='updatesub.php?subid=$ans[0]'>Update</a></td>
				<td><a href='deletesub.php?subid=$ans[0]'>Delete</a></td></tr>";
				}
				print "</table>";
			}
                    }
		
		
					?>
				</form>
			</div>
			
		</div>
	</div>



<?php
include_once("footer.php");
?>
</body>
</html>
