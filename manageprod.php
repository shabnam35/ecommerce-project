<?php
session_start();
ob_start();
if(isset($_POST["s1"]))
{
	$catid=$_POST["cat"];
	$subid=$_POST["subcat"];
	$name=$_POST["name"];
	$price=$_POST["price"];
	$discount=$_POST["discount"];
	$stock=$_POST["stock"];
	$description=$_POST["description"];
	$err = $_FILES["prodpic"]["error"];
	
	if($err==0)
	{
		$date = date_create();
		$tstamp = date_timestamp_get($date);
		$picname=$tstamp.$_FILES["prodpic"]["name"];
		$tname = $_FILES["prodpic"]["tmp_name"];
		move_uploaded_file($tname,"uploads/$picname");
	}
	else
	{
		$picname="nopic.jpg";
	}
	
	require_once("vars.php");
	$conn = mysqli_connect(hname,uname,password,dbname) or die("Error in connection " . mysqli_connect_error());
	$q="insert into product(catid,subid,name,price,discount,stock,description,prodpic) values($catid,$subid,'$name',$price,$discount,$stock,'$description','$picname')";
	mysqli_query($conn,$q) or die("Error in query " . mysqli_error($conn));
	$count = mysqli_affected_rows($conn);//1 or 0
	mysqli_close($conn);
	if($count==1)
	{
		$msg="Product added successfully";
	}
	else
	{
		$msg="Product not added successfully";
	}
}
?>



<html>
<head><title>Manage Product</title>
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
				<li class="active">Manage Product</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h2 align="center">Manage Product</h2>
			<div class="login-form-grids animated wow slideInUp col-sm-8" data-wow-delay=".5s" style="margin:auto;">
				<form method="post" class="creditly-card-form agileinfo_form" enctype="multipart/form-data">
				  <section class="creditly-wrapper wrapper">
					 <div class="information-wrapper">
						<div class="first-row form-group">
						   <div class="controls">
							  <label class="control-label">Choose Category Name: </label>
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
						   </div> 
						   <div class="controls">
							  <label class="control-label">Subcategory Name: </label>
							  <select name="subcat" class="form-control" style="margin-bottom:10px">
	
	<option style="margin-bottom:10px">Choose Subcategory</option>
	<?php
	if(isset($_POST["go"]))
{
		$catid=$_POST["cat"];
		require_once("vars.php");
		$conn = mysqli_connect(hname,uname,password,dbname) or die("Error in connection " . mysqli_connect_error());
		$qu="select * from managesubcat where catid='$catid'";
		$res=mysqli_query($conn,$qu) or die(mysqli_error($conn));
		$row=mysqli_affected_rows($conn);
		mysqli_close($conn);
		if($row>=1)
		{
			while($ans=mysqli_fetch_array($res))
			{
				if(isset($_POST["go"]))
				{
					$catid=$_POST["catid"];
					if($catid==$ans[0])
					{
						print "<option value='$ans[0]' selected>$ans[2]</option>";
					}
					else
					{
						print "<option value='$ans[0]'>$ans[2]</option>";
					}
				}
				else
				{
					print "<option value='$ans[0]'>$ans[2]</option>";
				}
			}
		}
}
	?>
		
						   </div>
						   <div class="controls">
							  <label class="control-label">Product Name: </label>
							  <input type="text" placeholder="Product Name"  name="name" class="form-control" style="margin-bottom:10px">
						   </div>
						   <div class="controls">
							  <label class="control-label">Price: </label>
							  <input type="text" placeholder="Price"  name="price" class="form-control" style="margin-bottom:10px">

						   </div>
						   <div class="controls">
							  <label class="control-label">Discount: </label>
							  <input type="text" placeholder="Discount"  name="discount" class="form-control" style="margin-bottom:10px">
	
						   </div>
						   <div class="controls">
							  <label class="control-label">Stock: </label>
							  <input type="text" placeholder="Stock"  name="stock" class="form-control" style="margin-bottom:10px">
	
						   </div>
						   <div class="controls">
							  <label class="control-label">Description: </label>
							  <textarea name="description" class="form-control" style="margin-bottom:10px"></textarea>
							  
						   </div>
						   <div class="card_number_grids">
							  <div class="card_number_grid_left">
								 <div class="controls">
									<label class="control-label">Product Picture:</label>
								   <input type="file" name="prodpic" style="margin-bottom:5px">
		
								 </div>
							  </div>
							  <div class="clear"> </div>
						   </div>
						</div>
						<input type="submit" value="Add Product" name="s1">
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
include_once("footer.php");
?>
</body>
</html>
