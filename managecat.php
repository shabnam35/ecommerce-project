<?php
session_start();
if(isset($_POST["s1"]))
{
	$cname=$_POST["catname"];
	$err = $_FILES["catpic"]["error"];
	
	if($err==0)
	{
		$date = date_create();
		$tstamp = date_timestamp_get($date);
		$picname=$tstamp.$_FILES["catpic"]["name"];
		$tname = $_FILES["catpic"]["tmp_name"];
		move_uploaded_file($tname,"uploads/$picname");
	}
	else
	{
		$picname="nopic.jpg";
	}
	
	require_once("vars.php");
	$conn = mysqli_connect(hname,uname,password,dbname) or die("Error in connection " . mysqli_connect_error());
	$q="insert into managecat(catname,catpic) values('$cname','$picname')";
	mysqli_query($conn,$q) or die("Error in query " . mysqli_error($conn));
	$count = mysqli_affected_rows($conn);//1 or 0
	mysqli_close($conn);
	if($count==1)
	{
		$msg="Category added successfully";
	}
	else
	{
		$msg="Category not added successfully";
	}
}
?>



<html>
<head><title>Manage Category</title>
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
				<li class="active">Manage Category</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h2 align="center">Manage Category</h2>
			<div class="login-form-grids animated wow slideInUp col-sm-8" data-wow-delay=".5s" style="margin:auto;">
				<form method="post" class="creditly-card-form agileinfo_form" enctype="multipart/form-data">
                              <section class="creditly-wrapper wrapper">
                                 <div class="information-wrapper">
                                    <div class="first-row form-group">
                                       <div class="controls">
                                          <label class="control-label">Category Name: </label>
										<input type="text" placeholder="Category Name" name="catname" class="form-control" style="margin-bottom:5px">
                                          
                                       </div>
                                       <div class="card_number_grids">
                                          <div class="card_number_grid_left">
                                             <div class="controls">
                                                <label class="control-label">Category Picture:</label>
                                               <input type="file" name="catpic" style="margin-bottom:5px">
					
                                             </div>
                                          </div>
                                          <div class="clear"> </div>
                                       </div>
                                    </div>
                                    <input type="submit" name="s1" value="Submit" align="center">
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
	</div>

<?php
require_once("footer.php");
?>

</body>
</html> 
