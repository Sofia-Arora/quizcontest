<!DOCTYPE html>
<html>
  <head>
    <style>
    body
    {
      margin: 0;
      padding: 0;
      font-family: monospace;
      background: url(bg.jpg);
      background-size: cover;
      color: rgba(99,145,103)
    }
    .box
    {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%,-50%);
      width: 400px;
      padding: 40px;
      background:rgba(0, 0, 0, 0.8);
      box-sizing: border-box;
      box-shadow: 0 15px 25px rgba(0, 0, 0, 0.8);
      border-radius: 10px;
    }
    .box  input[type="submit"]
    {
      background: transparent;
      color: inherit;
      background:  rgba(0, 0, 0, 0.8);
      padding: 10px 20px;
      margin-top: 10px;
      cursor: pointer;
      border-radius: 5px;
      align-content: center;
    }

    </style>
</head>
<body>
    <div class="box">
<?php
session_start();
if(!isset($_SESSION['username'])){
header('location:userlogin.php');}
$con =mysqli_connect('localhost','root');
mysqli_select_db($con,'quizdatabase');
if(isset($_POST['submit']))
{
  if(!empty($_POST['quiz']))
  {
    $count = count($_POST['quiz']);
    echo "Out of 5 , you have selected ".$count." options";
    $result=0;
    $i = 1;

    $selected = $_POST['quiz'];

    $q = "select * from questions";
    $query = mysqli_query($con,$q);
    while ($rows=mysqli_fetch_array($query)) {
      $checked=$rows['ans_id']== $selected[$i];
      if($checked){
        $result++;
      }
     $i++;
    }
   echo "<br>Your total score is :".$result;
  }
}
  $name=$_SESSION['username'];
  $finalresult = "insert into user(username,totalques,answercorrect)values
  ('$name','5','$result')";
  $queryresult = mysqli_query($con,$finalresult);
   $h = "select * from user ORDER BY answercorrect DESC";
   $win = mysqli_query($con,$h)or die( mysqli_error($con));
     while ($rows=mysqli_fetch_array($win)) {
    echo "<br>".$rows['username']." Score is: ".$rows['answercorrect'];


}
 ?>
 <form action="logout.php" method="post"><input type="submit" name="" value="Log Out"></form>
</div>

 </body>
 </html>
