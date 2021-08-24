<?php
session_start();
$a=$_GET["pid"];
require_once("vars.php");
$conn = mysqli_connect(hname,uname,password,dbname) or die("Error in connection " . mysqli_connect_error());
$qu="select * from product where pid=$a";
$res=mysqli_query($conn,$qu) or die(mysqli_error($conn));
$cnt=mysqli_affected_rows($conn);
if($cnt==1)
{
	$prodd=mysqli_fetch_array($res);
	$aprice=$prodd["price"];
	$discount=$prodd["discount"];
	$dis=($aprice*$discount)/100;
	$remprice=round($aprice-$dis,0);
	
}
if(isset($_POST["submit"]))
{
	if(isset($_SESSION["email"]))
	{
		$uname=$_SESSION["email"];
	
		
		
		$quantity=$_POST["quantity"];
		$tcost=$aprice*$quantity;
		$conn = mysqli_connect(hname,uname,password,dbname) or die("Error in connection " . mysqli_connect_error());
		$qu="select * from cart where pid=$a and uname='$uname'";
		$res1=mysqli_query($conn,$qu) or die(mysqli_error($conn));
		$row1=mysqli_affected_rows($conn);
		if($row1>=1)
			$qu1="update cart set quantity=quantity+$quantity,tcost=tcost+$tcost where pid=$a and uname='$uname'";
		else 
		$qu1="insert into cart(pid,name,image,price,quantity,tcost,uname) values ($a,'$prodd[name]','$prodd[prodpic]',$aprice,$quantity,$tcost,'$uname')";
		mysqli_query($conn,$qu1) or die(mysqli_error($conn));
		$row=mysqli_affected_rows($conn);
		if($row==1)
		{
			header("location:showcart.php");
		}
	}
		else
		{
			header("location:login.php?pid=$a");
		}
	}

		
?>
<html>
<head><title>Show Product Details</title>
<?php
require_once("extfiles.php");
?>
<style>
	.agileinfo_single
	{
		display:flex;
	}
	.agileinfo_single .col-md-4, .agileinfo_single .col-md-4
	{
		flex:1;
	}
</style>
</head>
<body>
<?php
require_once("header.php");
?>

<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a> / </li>
				<li class="active">Product Details</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
	<div class="products">
		<div class="container">
			<div class="agileinfo_single">
				
				<div class="col-md-4 agileinfo_single_left">
					<img src="uploads/<?php print $prodd[8] ?>" width="100%">
				
				</div>
				<div class="col-md-8 agileinfo_single_right">
					<font color="red">	<h2><?php print $prodd[3]; ?></h2></font><br/><br/>
					
					<div class="w3agile_description">
						<h4>Description :</h4>
						<p><?php print $prodd[7]; ?></p><br/><br/>
					</div>
					<div class="snipcart-item block">
						<div class="snipcart-thumb agileinfo_single_right_snipcart">
						<h4>Discount : <?php print $discount; ?>%</h4><br>
							<h4 class="m-sing"><?php print "Rs.$remprice/-"; ?>&nbsp; <del><?php print "Rs.$aprice/-";?></del> </h4><br/>
						</div>
						<div class="snipcart-details agileinfo_single_right_details">
							<form name="form1"" method="post">
								<select name="quantity" class="form-control" style="margin-bottom:5px" required>
								<option value="">Choose Quantity</option>
								<?php
									$stock=$prodd["stock"];
									if($stock>=10)
										$stock=10;
									for($i=1;$i<=$stock;$i++)
									{
										print "<option>$i</option>";
									}
						
								?>
									
								
									
									
							
									<input type="submit" name="submit" value="Add to cart" class="button">
								
							</form>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- new -->
	


<?php
require_once("footer.php");
?>
</body>
</html>