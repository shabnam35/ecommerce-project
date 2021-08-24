<?php
session_start();
if(isset($_POST["s1"]))
{
	$st=$_POST["newstatus"];
	$oid=$_GET["orderid"];
	require_once("vars.php");
	$conn = mysqli_connect(hname,uname,password,dbname) or die("Error in connection " . mysqli_connect_error());
	$q="update checkout set status='$st' where orderid='$oid'";
	mysqli_query($conn,$q) or die("Error in query " . mysqli_error($conn));
	$count = mysqli_affected_rows($conn);//1 or 0
	mysqli_close($conn);
	if($count==1)
	{
		header("location:order.php");
	}
	else
	{
		$msg="Order not added successfully";
	}
}
?>
<html>
<head>
<title>Update Status</title>
<?php
require_once("extfiles.php");
?></head>
<body>
<?php
require_once("adminheader.php");
?>
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Update status</</li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--login--><div class="login-page">
		<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
			<h3 class="title">Update<span> Status</span></h3>
		</div>
		<div class="widget-shadow">
			<div class="login-body wow fadeInUp animated" data-wow-delay=".7s">
				<form name="form1" method="post" enctype="multipart/form-data">
				<select name="newstatus">
				<option value="choose new status"> choose new status</option>
				<option >Processing</option>
				<option >Packed</option>
				<option >Shipped</option>
				<option >In-Transit</option>
				<option >Cancelled</option>
				<option >Delivered</option>
				<option >Delayed</option>
				</select>



		<input type="submit" name="s1" value="Update Status">
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
