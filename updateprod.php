<?php
session_start();
require_once("vars.php");
$a=$_GET["pid"];
$conn = mysqli_connect(hname,uname,password,dbname) or die("Error in connection " . mysqli_connect_error());
$q="select * from product where pid=$a";
$res=mysqli_query($conn,$q) or die("Error in query " . mysqli_error($conn));
$count = mysqli_affected_rows($conn);//1 or 0
if($count==1)
{
	$prodinfo=mysqli_fetch_array($res);
}
if(isset($_POST["s1"]))
{
	$catid=$_POST["cat"];
	$subcat=$_POST["subcat"];
	$pn=$_POST["prodname"];
	$pr=$_POST["price"];
	$d=$_POST["dis"];
	$stock=$_POST["st"];
	$des=$_POST["desc"];
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
		$picname=$prodinfo["prodpic"];
	}
	
	require_once("vars.php");
	$conn = mysqli_connect(hname,uname,password,dbname) or die("Error in connection " . mysqli_connect_error());
	$q="update product set catid=$catid,subid=$subcat,name='$pn',price=$pr,discount=$d,stock=$stock,description='$des',prodpic='$picname' where pid=$a";
	mysqli_query($conn,$q) or die("Error in query " . mysqli_error($conn));
	$count = mysqli_affected_rows($conn);//1 or 0
	mysqli_close($conn);
	if($count==1)
	{
		header("location:vprod.php");
	}
	else
	{
		$msg="Subcategory not added successfully";
	}
}
?>



<html>
<head><title>Update Product</title>
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
				<li class="active">Update Product</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h2 align="center">Update Product</h2>
		
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
						if($prodinfo["catid"]==$ans[0])
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
		<select name="subcat" class="form-control" style="margin-bottom:10px">
			<option>Choose Subcategory</option>
			<?php
			if(isset($_POST["go"]) || isset($_GET["pid"]))
			{
				if(isset($_POST["go"]))
				$cat=$_POST["cat"];
			else
				$cat=$prodinfo["catid"];
				require_once("vars.php");
				$conn = mysqli_connect(hname,uname,password,dbname) or die("Error in connection " . mysqli_connect_error());
				$qu="select * from managesubcat where catid=$cat";
				$res=mysqli_query($conn,$qu) or die(mysqli_error($conn));
				$row=mysqli_affected_rows($conn);
				if($row>=1)
				{
					while($ans=mysqli_fetch_array($res))
					{
						if($ans[0]==$prodinfo["subid"])
						print "<option value=$ans[0] selected>$ans[2]</option>";
					else
						print "<option value=$ans[0]>$ans[2]</option>";
					}
				}
				else
				{
					print "<option>No Subcategory Available</option>";
				}
			}
			?>
		</select>
		</div>
		<div class="controls">
							  <label class="control-label">Product Name: </label>
		<input type="text" placeholder="Product Name" class="form-control" name="prodname" style="margin-bottom:10px" value="<?php print $prodinfo["name"];?>">
		</div>
		<div class="controls">
							  <label class="control-label">Price: </label>
		<input type="text" placeholder="Product Price" class="form-control" name="price" style="margin-bottom:10px" value="<?php print $prodinfo["price"];?>">
		</div>
		<div class="controls">
							  <label class="control-label">Discount: </label>
		<input type="text" placeholder="Product Discount" class="form-control" name="dis" style="margin-bottom:10px" value="<?php print $prodinfo["discount"];?>">
		</div>
		<div class="controls">
							  <label class="control-label">Stock: </label>
		<input type="text" placeholder="Available Stock" class="form-control" name="st" style="margin-bottom:10px" value="<?php print $prodinfo["stock"];?>">
		</div>
		<div class="controls">
							  <label class="control-label">Description: </label>
		<textarea style="margin-bottom:10px" class="form-control"rows="5" name="desc"><?php print $prodinfo["description"];?></textarea>
		</div>
		<div class="controls">
							  <label class="control-label">Product Picture: </label>
		<img src="uploads/<?php print $prodinfo["prodpic"];?>" width='90px'><br>
		<input type="file" name="subpic">
		</div>
		
		<br/><input type="submit" name="s1" value="Update Product">
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