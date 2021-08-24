<?php
session_start();
ob_start();
if(!isset($_SESSION["email"]))
{
    header("location:error.php");
}
?>
<html>
<head><title>CkeckOut</title>
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
<script>


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
				<li class="active">CkeckOut Form</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- register -->
	<div class="register">
		<div class="container">
			<div class="login-form-grids">
				<form name="form1" method="post">
				<div class="login-form-grids animated wow slideInUp col-sm-8" data-wow-delay=".5s" style="margin:auto;">
				
					<h2 align="center">Checkout Form</h2>
				  <section class="creditly-wrapper wrapper">
					 <div class="information-wrapper">
						<div class="first-row form-group">
						   <div class="controls">
								<label class="control-label">Phone no: </label>
								<input type="text" name="ph" placeholder="Phone " class="form-control" required minlength="10" maxlength="10" onkeypress="return checkPhno(event)">
						   </div>
						   <div class="controls">
								<label class="control-label">Address: </label>
								<textarea name="address" placeholder="Address" class="form-control" style="margin-top:10px" rows="5"></textarea>
						   </div>
						   <div class="controls">
								<br><label class="control-label">Payment Mode: </label><br>
								<label><input type="radio" name="mode" value="cash on delivery" class="mode">Cash On Delivery</label>
								<label><input type="radio" name="mode" value="dc" class="mode">Debit Card</label>
								<label><input type="radio" name="mode" value="cc" class="mode">Credit Card</label>
						   </div>
						   <div class="controls">
								<div id="card">
									<input type="text" name="hname" class="form-control" placeholder="Card Holder Name"><br>
									<input type="text" name="cno" class="form-control" placeholder="Card No"><br>
									<input type="date" name="expdate" placeholder="Expiry Date" class="form-control" ><br>
									<input type="text" name="cvv" class="form-control" placeholder="CVV">
								</div>
						   </div>
						   
					<input type="submit" name="s1" value="Submit">
						</div>
					</div>
                   </section>
			</div>
		</div>
	</div>
					
					
				
					
					
					
					
				
					</form>
					<?php
					if(isset($_POST["s1"]))
					{
							$phone=$_POST["ph"];
							$add=$_POST["address"];
							$md=$_POST["mode"];
							$hn=$_POST["hname"];
							$cno=$_POST["cno"];
							$ex=$_POST["expdate"];
							$cv=$_POST["cvv"];
							$un=$_SESSION["email"];
							$tcost=$_SESSION["tcost"];
							$st="payment received,processing";
							
							include_once("vars.php");
							$conn=mysqli_connect(hname,uname,password,dbname) or die("Error in connection" . mysqli_connect_error());
							$q="insert into checkout(tcost, uname, address, phone, mode, hname, cardno, expdate, status, cvv) values($tcost, '$un', '$add', '$phone', '$md', '$hn', '$cno', '$ex', '$st', '$cv')";
							mysqli_query($conn,$q) or die("Error in query" . mysqli_error($conn));
							$count=mysqli_affected_rows($conn);
							mysqli_close($conn);
							if($count==1)
							{
								header("location:thanks1.php");
							}

					}
					?>
					
				
			</div>
			
		</div>
	</div>
	<?php
	require_once("footer.php");
	?>
	<script>
	$(document).ready(function(){
		$("#card").hide();
		$(".mode").change(function(){
			var a=$(this).val();
			if(a=="cash on delivery")
				$("#card").hide(1000);
			else
				$("#card").show(1000);
		})
	})
	</script>
	</body>
	</html>
	