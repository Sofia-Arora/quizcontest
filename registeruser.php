<?php
session_start();
header('location:welcome.php');
$con = mysqli_connect('localhost','root');
if($con)
{
  echo "connection successful";
}else {
  echo "no connection";
}
mysqli_select_db($con,'userlogin');
$name = $_POST['user'];

$q= "select * from login where name ='$name'";
$_SESSION['username']=$name;
  $qy = "insert into login(name) values ('$name')";
  mysqli_query($con,$qy);

 ?>
