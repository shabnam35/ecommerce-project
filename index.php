<?php
session_start();
ob_start();
?>
<html>
<head><title>Index Page</title>
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
<div class="header-outs" id="home">
<?php
 	
require_once("header.php");
?>
      </div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login" align="center">
		<div class="container" align="center">
			<h2 align="center">Welcome to Gift Shop</h2>
			<?php
			
			require_once("vars.php");
			$conn = mysqli_connect(hname,uname,password,dbname) or die("Error in connection " . mysqli_connect_error());
			$qu="select * from product order by rand() limit 9";
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
					print "<td width='33%'><a href='showproddetails.php?pid=$ans[0]' style='color:#000;'><img src='uploads/$ans[8]' width='150px' height='150px'><br/>$ans[3]<br/>Rs.
					$ans[4]/-</a></td>";
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
				print "Products not added";
			}
			?>
		
			
		
			
		</div>
	</div>
	<?php
	require_once("footer.php");
	?>
	</body>
	</html>