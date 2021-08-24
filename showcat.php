<?php
session_start();
?>
<html>
<head><title>All Categories</title>
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
				<li class="active">All Category</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h2>All Categories</h2>
			<?php
			require_once("vars.php");
			$conn = mysqli_connect(hname,uname,password,dbname) or die("Error in connection " . mysqli_connect_error());
			$qu="select * from managecat";
			$res=mysqli_query($conn,$qu) or die(mysqli_error($conn));
			$row=mysqli_affected_rows($conn);
			if($row>=1)
			{
				print "<table align='center' width='100%'>";
				$col=3;
				$cl=0;
				while($ans=mysqli_fetch_array($res))
				{
					if($cl==0)
					{
						print "<tr align='center'>";
					}
					print "<td><a href='showsubcat.php?catid=$ans[0]'><img src='uploads/$ans[2]' width='200px' height='200px'><br/>$ans[1]</td>";
					$cl++;
					if($col==$cl)
					{
						print "</tr>";
						$cl=0;
					}
				}
				print "</table>";
			}
			else
			{
				print "Categories not added";
			}
			?>
		
			
		
			
		</div>
	</div>
	<?php
	require_once("footer.php");
	?>
	</body>
	</html>