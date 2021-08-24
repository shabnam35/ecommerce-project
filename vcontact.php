<?php
session_start();
?>
<html>
<head><title>List of Members</title>
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
				<li class="active">Login Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login-page">
		<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
			<h3  align="center" class="title">List of<span> Contacts</span></h3>
		</div>
		
			<div class="login-body wow fadeInUp animated" data-wow-delay=".7s">
		
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				
					<?php
					
							
							
							$conn=mysqli_connect(hname,uname,password,dbname) or die("Error in connection" . mysqli_connect_error());
							$q="select * from contact";
							$res= mysqli_query($conn,$q) or die("Error in query" . mysqli_error($conn));
							$count=mysqli_affected_rows($conn);
							mysqli_close($conn);
							if($count==0)
							{
								print "<h2 align='center'>No records found</h2>";
								
							}
							else
							{
								print "<table  border='1' class='table table-striped'>
								<tr><th>Name</th>
								<th>Phone</th>
								<th>Username</th>
								<th>Query</th>
								<th>Delete</th></tr>";
								while($x=mysqli_fetch_array($res))
								{
									print "<tr>
									<td> $x[1] </td>
									<td> $x[2] </td>
									<td> $x[3] </td>
									<td> $x[4] </td>
									<td><a href='deletecontact.php?id=$x[0]'>Delete</a></td></tr>";
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