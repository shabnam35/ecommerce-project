<?php
session_start();
$a=$_GET["catid"];
require_once("vars.php");
$conn = mysqli_connect(hname,uname,password,dbname) or die("Error in connection " . mysqli_connect_error());
$q="select * from managecat where catid='$a'";
$res=mysqli_query($conn,$q) or die("Error in query " . mysqli_error($conn));
$count=mysqli_affected_rows($conn);
if($count==1)
{
	$catinfo=mysqli_fetch_array($res);
}
if(isset($_POST["s1"]))
{
	$cname=$_POST["catname"];
	$err = $_FILES["catpic"]["error"];
	
	if($err==0)
	{
		$date = date_create();
		$tstamp = date_timestamp_get($date);
		$picname=$tstamp.$_FILES["catpic"]["name"];
		$tname = $_FILES["catpic"]["tmp_name"];
		move_uploaded_file($tname,"uploads/$picname");
	}
	else
	{
		$picname="nopic.jpg";
	}
	
	require_once("vars.php");
	$conn = mysqli_connect(hname,uname,password,dbname) or die("Error in connection " . mysqli_connect_error());
	$q="update managecat set catname='$cname',catpic='$picname' where catid='$a'";
	mysqli_query($conn,$q) or die("Error in query " . mysqli_error($conn));
	$count = mysqli_affected_rows($conn);//1 or 0
	mysqli_close($conn);
	if($count==1)
	{
		header("location:vcat.php");
	}
	else
	{
		$msg="Category not added successfully";
	}
}
?>



<html>
<head><title>Update Category</title>
<?php
require_once("extfiles.php");
?>
</head>
<body>
<?php
require_once("adminheader.php");
?>
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Update Category</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h2>Update Category</h2>
		
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
	<form name="form1" method="post" enctype="multipart/form-data">
		<input type="text" placeholder="Category Name" name="catname">
		<br/>
		<img src="uploads/<?php print $catinfo["catpic"];?>" width='90px'>
		<input type="file" name="catpic">
		
		<br/><input type="submit" name="s1" value="Update Category">
		<?php
		if(isset($msg))
		{
			print $msg;
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
