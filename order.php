<?php
session_start();
if(!isset($_SESSION["email"]))
{
	header("location:error.php");
}
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
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a> / </li>
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
					$un=$_SESSION["email"];
					
							
							require_once("vars.php");
							$conn=mysqli_connect(hname,uname,password,dbname) or die("Error in connection" . mysqli_connect_error());;
							if($_SESSION["utype"]=="admin")
							$q="select * from checkout order by orderid desc";
							else
								$q="select * from checkout where uname='$un' order by orderid desc";
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
								<tr><th>Order ID</th>
								<th>Total Cost</th>
								<th>Phone</th>
								<th>Address</th>
								<th>Mode of Payment</th>
								<th>Holder Name</th>
								<th>Card No</th>
								<th>Expiry Date</th>
								<th> Status</th>
								<th>CVV</th>";
								if($_SESSION["utype"]=="admin")
								{
								print "<th>Update</th>";
								print "<th>Delete</th></tr>";
								}
								print "</tr>";
								
								while($x=mysqli_fetch_array($res))
								{
									print "<tr>
									<td> <a href='orderdetails.php?oid=$x[0]'>$x[0]</a> </td>
									<td> $x[1] </td>
									<td> $x[4] </td>
									<td> $x[3] </td>
									<td> $x[5] </td>
									<td> $x[6] </td>
									<td> $x[7] </td>
									<td> $x[8] </td>
									<td> $x[9] </td>
									<td> $x[10]  </td>";
						 		if($_SESSION["utype"]=="admin")
								{

									print"<td><a href='updatestatus.php?orderid=$x[0]'>Update Status </td>";
									
									print "<td><a href='deletestatus.php?orderid=$x[0]'>Delete Status </td></tr>";
								}}
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