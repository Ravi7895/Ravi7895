<?php
$na=$_POST['na'];
$em=$_POST['e1'];
$ph=$_POST['ph1'];
$msg=$_POST['m1'];




$con=mysqli_connect("localhost","root","","mediplus");
if(!$con)
{
echo mysqli_connect_error();
}
else
{
$q="insert into other values('$na','$em','$ph','$msg')";
mysqli_query($con,$q);
$r=mysqli_affected_rows($con);
if($r>0)
echo "You are Successfully Appointed";
else
echo "Some problem is occured";
}
?>