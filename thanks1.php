<?php
session_start();
ob_start();
$un=$_SESSION["email"];
require_once("vars.php");
$conn=mysqli_connect(hname,uname,password,dbname) or die("Error in connection" . mysqli_connect_error());
$qu="select * from checkout where uname='$un' order by orderid desc";
$res=mysqli_query($conn,$qu) or die("Error in query" . mysqli_error($conn));
$cnt=mysqli_affected_rows($conn);
if($cnt>=1)
{
	$odetails=mysqli_fetch_array($res);
	$qu1="select * from cart where uname='$un'";
	$res1=mysqli_query($conn,$qu1) or die(mysqli_error($conn));
	$cont1=mysqli_affected_rows($conn);
	if($cont1>=0)
	{
		while($cart=mysqli_fetch_array($res1))
		{
			$qu2="insert into orderhistory(oid,pid,name,image,price,quantity,tcost,uname) values($odetails[orderid],$cart[pid],'$cart[name]','$cart[image]',$cart[price],$cart[quantity],$cart[tcost],'$un')";
			mysqli_query($conn,$qu2) or die(mysqli_error($conn));
			$qu4="update product set stock=stock-$cart[quantity] where pid=$cart[pid]";
			mysqli_query($conn,$qu4) or die(mysqli_error($conn));
		}
		$qu3="delete from cart where uname='$un'";
		mysqli_query($conn,$qu3) or die(mysqli_error($conn));
	}
			
}





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
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a> / </li>
				<li class="active">Place Order</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- register -->
	<div class="register">
		<div class="container">
		<h3>!!!!!!!Thanks For Shopping.</h3>
		<p>Your Order is placed successfully</p>
		<p>Your Order ID is:<b><?php print $odetails['orderid'];?></b></p>
		<p>The Final Amount you have to pay:<b><?php print $odetails['tcost'];?></b></p>
		<p>Delivery Address:<b><?php print $odetails['address'];?></b></p>
		<p>The Products you have bought:</p>
			
			</div>
			
		</div>
		<?php
			$uname=$_SESSION["email"];
			require_once("vars.php");
			$conn=mysqli_connect(hname,uname,password,dbname) or die("Error in connection" . mysqli_connect_error());
			$qu="select * from orderhistory where oid=$odetails[orderid]";
			$res=mysqli_query($conn,$qu) or die("Error in query" . mysqli_error($conn));
			$count=mysqli_affected_rows($conn);
			//print $count;
			mysqli_close($conn);
			if($count==0)
			{
				print "<h3>Your Cart is empty now</h3>";
			}
			else
			{
				print "<table class='table'>
				<tr>
				<th>Image</th>
				<th>Name</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Total Cost</th>
				
				</tr>";
				$fcost=0;
				while($ans=mysqli_fetch_array($res))
				{
					//print $ans[1];
					print "<tr>
					<td><img src='uploads/$ans[4]' width='50px'></td>
					<td>$ans[3]</td>
					<td>$ans[5]</td>
					<td>$ans[6]</td>
					<td>$ans[7]</td>
					
					</tr>";
				
				$fcost+=$ans[7];
				}
					print "</table>";
			}
			?>
			
				<h3 align='center'> Total Cost: Rs. <?php print "$fcost"?></h3>
	
	<?php
	require_once("footer.php");
	?>
	
	</body>
	</html>
	