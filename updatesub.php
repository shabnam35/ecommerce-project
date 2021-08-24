<?php
session_start();
require_once("vars.php");
$a=$_GET["subid"];
$conn = mysqli_connect(hname,uname,password,dbname) or die("Error in connection " . mysqli_connect_error());
$q="select * from  managesubcat where subid='$a' ";
$res=mysqli_query($conn,$q) or die("Error in query " . mysqli_error($conn));
$count = mysqli_affected_rows($conn);//1 or 0
if($count==1)
{
	$subinfo=mysqli_fetch_array($res);
}
if(isset($_POST["s1"]))
{
	$catid=$_POST["cat"];
	$sn=$_POST["name"];
	$err = $_FILES["subpic"]["error"];
	
	if($err==0)
	{
		$date = date_create();
		$tstamp = date_timestamp_get($date);
		$picname=$tstamp.$_FILES["subpic"]["name"];
		$tname = $_FILES["subpic"]["tmp_name"];
		move_uploaded_file($tname,"uploads/$picname");
	}
	else
	{
		$picname=$subinfo["subpic"];
	}
	
	require_once("vars.php");
	$conn = mysqli_connect(hname,uname,password,dbname) or die("Error in connection " . mysqli_connect_error());
	$q="update managesubcat set catid=$catid,name='$sn',subpic='$picname' where subid=$a ";
	mysqli_query($conn,$q) or die("Error in query " . mysqli_error($conn));
	$count = mysqli_affected_rows($conn);//1 or 0
	mysqli_close($conn);
	if($count==1)
	{
		header("location:vsub.php");
	}
	else
	{
		$msg="Subcategory not added successfully";
	}
}
?>



<html>
<head><title>Update Subcategory</title>
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
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a> / </li>
				<li class="active">Update Subcategory</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h2 align="center">Update Subcategory</h2>
		
			<div class="login-form-grids animated wow slideInUp col-sm-8" style="margin:auto;" data-wow-delay=".5s">
	<form name="form1" method="post" enctype="multipart/form-data">

		<div class="controls">
							  <label class="control-label">Category: </label>
		<select name="cat" class="form-control" style="margin-bottom:10px">
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
						$catid=$_POST["cat"];
						if($catid==$ans[0])
						{
							print "<option value=$ans[0] selected>$ans[1]</option>";
						}
						else
						{
							print "<option value=$ans[0]>$ans[1]</option>";
						}
					}
					else
					{
						if($subinfo["catid"]==$ans[0])
						print "<option value=$ans[0] selected>$ans[1]</option>";
					else
						print "<option value=$ans[0]>$ans[1]</option>";
					}
					
				}
			}
			else
			{
				print "<option>No category Available</option>";
			}
			?>
		</select><input type="submit" name="go" value="Go" style="margin-bottom:10px">
		</div>
		<div class="controls">
							  <label class="control-label">Subcategory: </label>
			
		
		<br/><input type="text" placeholder="Subcategory Name" class="form-control"  name="name" style="margin-bottom:10px" value="<?php print $subinfo["name"];?>">
		</div>
		<div class="controls">
							  <label class="control-label">Subcategory Picture: </label>
		<img src="uploads/<?php print $subinfo["subpic"];?>" width='90px'><br>
		<input type="file" name="subpic">
		</div>
		<br/><input type="submit" name="s1" value="Update Subcategory">
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