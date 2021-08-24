<?php
session_start();
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
<?php
require_once("adminheader.php");
?>
<div class="breadcrumbs"  align="center">
		<div class="container"  align="center">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft"   align="center">
				
				<h4 align="center">Welcome to GIFT SHOP </h4>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container" align="center">
		<font color="red">	<h2 style="margin-bottom:15px">Admin Panel</h2></font>
		<a href="listofmembers.php">List Of Members</a><br/>
		<a href="searchmem.php">Search Members</a><br/>
			
			
		
			
		</div>
	</div>
	<?php
	require_once("footer.php");
	?>
	</body>
	</html>