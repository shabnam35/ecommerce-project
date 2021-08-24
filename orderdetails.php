<?php
session_start();
?>
<html>
<head><title>List of Orders</title>
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
if($_SESSION["utype"]=="admin")
require_once("adminheader.php");
else	
require_once("header.php");
?>
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="admin.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a> / </li>
				<li class="active">List of Orders</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h2>List of Orders</h2><br/>
		
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				
					<?php
					
							
							
							require_once("vars.php");
							$conn=mysqli_connect(hname,uname,password,dbname) or die("Error in connection" . mysqli_connect_error());;
							$oid=$_GET["oid"];
							$q="select * from orderhistory where oid=$oid";
							$res= mysqli_query($conn,$q) or die("Error in query" . mysqli_error($conn));
							$count=mysqli_affected_rows($conn);
							mysqli_close($conn);
							if($count==0)
							{
								$msg="No records found";
								
							}
							else
							{
								print "<table class='table table-striped'>
								<tr><th>Image</th>
								<th>Name</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Total Cost</th>
								
								
								</tr>";
								while($x=mysqli_fetch_array($res))
								{
									print "<tr>
									<td><img src='uploads/$x[4]' width='90px' </td>
									<td> $x[3] </td>
									<td> $x[5] </td>
									<td> $x[6] </td>
									<td> $x[7] </td>
									
									
									</tr>";
								}
								print "</table>";
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