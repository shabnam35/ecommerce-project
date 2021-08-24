<?php
ob_start();
session_start();
if(!isset($_SESSION["email"]))
{
	header("location:error.php");
}
					if(isset($_POST["s1"]))
					{
							$un=$_POST["em"];
							$pass=$_POST["pass"];
							include_once("vars.php");
							$conn=mysqli_connect(hname,uname,password,dbname) or die("Error in connection" . mysqli_connect_error());
							$q="select * from signup where Username='$un' and Password='$pass'";
							$res=mysqli_query($conn,$q) or die("Error in query" . mysqli_error($conn));
							$count=mysqli_affected_rows($conn);
							mysqli_close($conn);
							if($count==1)
							{
								$res=mysqli_fetch_array($res);
								$_SESSION["name"]=$res[0];
								$_SESSION["utype"]=$res[5];
								$_SESSION["email"]=$res[3];
								if($res[5]=="admin")
								{
									header("location:admin.php");
								}
							else 
							{
									if(isset($_GET["pid"]))
									{
										$a=$_GET["pid"];
										header("location:showproddetails.php?pid=$a");
									}
								 else 
								{
								header("location:index.php");	
								}
								
							}
						}
							 else 
							{
								$msg="Incorrect Username/Password";
							}
						
					}
					?>
<html>
<head><title>Show Cart</title>
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
require_once("header.php");
?>
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a> / </li>
				<li class="active">Show Cart</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h2>Show Cart</h2>

			<?php
			$uname=$_SESSION["email"];
			require_once("vars.php");
			$conn=mysqli_connect(hname,uname,password,dbname) or die("Error in connection" . mysqli_connect_error());
			$qu="select * from cart where uname='$uname'";
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
				<th>Delete</th>
				</tr>";
				$fcost=0;
				while($ans=mysqli_fetch_array($res))
				{
					//print $ans[1];
					print "<tr>
					<td><img src='uploads/$ans[3]' width='50px' height='50px'></td>
					<td>$ans[2]</td>
					<td>$ans[4]</td>
					<td>$ans[5]</td>
					<td>$ans[6]</td>
					<td><a href='deletecart.php?cartid=$ans[0]'>Delete</a></td>
					</tr>";
				
				$fcost+=$ans[6];
				}
					print "</table>";
			}
			?>
			<?php
			if(isset($fcost))
			{
				
			?>
			
				<h3 align="center"> Total Cost: Rs. <?php print "$fcost"?></h3>
				<?php
				$_SESSION["tcost"]=$fcost;
				?>
			
				<form name="abc" method="post">
				<table align="center" width="50%" style="margin-top:30px">
				<tr>
				<td>
				<input type="submit" name="s1" value="Continue Shopping">
				</td>
				<td>
				<input type="submit" name="s2" value="Checkout">
				</td>
				</table>
				<?php
				if(isset($_POST["s1"]))
				{
					header("location:showcat.php");
				}
				else if(isset($_POST["s2"]))
				{
					header("location:checkout.php");
				}
				
			
				?>
				</form>
				<?php
			}
			?>
			
				
			
			
			

		</div>
	</div>
	<?php
	require_once("footer.php");
	?>
	</body>
	</html>