<?php
$a=$_GET["fid"];
require_once("vars.php");
$conn = mysqli_connect(hname,uname,password,dbname) or die("Error in connection " . mysqli_connect_error());
$qu="delete from feedback where fid='$a'";
mysqli_query($conn,$qu) or die(mysqli_error($conn));
$cnt=mysqli_affected_rows($conn);
if($cnt==1)
{
	header("location:vfeedback.php");
}
?>