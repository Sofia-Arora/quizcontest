
<?php
session_start();
if(!isset($_SESSION['username'])){
header('location:userlogin.php');}
$con =mysqli_connect('localhost','root');
mysqli_select_db($con,'quizdatabase');
 ?>

<!DOCTYPE html>
<html>
<body>
  <style>
  body
  {
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    background: url(bg1.jpg);
    background-size: cover;
  }
  .box
  {
    position: absolute;
    top: 25%;
    left: 50%;

    transform: translate(-50%,-50%);
    width: 600px;
    padding: 40px;
    background: rgba(0, 0, 0, 0.8);
    box-sizing: border-box;
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.8);
    border-radius: 10px;
  }
  .box h1
  {
    margin: 0 0 30px;
    padding: 0;
    position: relative;
    color: #808080;
    text-align: center;
  }
      .box .card h3
      {
        margin: 0 0 20px;
        padding: 20px;
        color: #808080;
        text-align: center;
          }
          .box .card h4
          {
            margin: 0 0 20px;
            padding: 10px;
            color: #808080;
            text-align: center;
              }
              .box .container
              {
                position: absolute;
                top: 170%;
                left: 50%;
                  margin-top: 100px;
                transform: translate(-50%,-50%);
                width: 600px;
                padding: 20px;
                background: rgb(128,128,128);
                box-sizing: border-box;
                box-shadow: 0 15px 25px rgb(128,128,128);
                border-radius: 10px;
              }

.box .container  h4
{
  margin: 0 0 10px;
  padding: 10px;
  color: rgba(0, 0, 0, 0.8);
  text-align: center;

}
.box .container input[type="submit"]
{
  background: transparent;
  border: none;
  outline: none;
  color: #808080;
  background:  rgba(0, 0, 0, 0.8);
  padding: 10px 20px;
  margin-top: 10px;
  cursor: pointer;
  border-radius: 5px;
  align-content: center;
}

</style>
<div class="box ">
<h1 class="text-center text-success">Welcome <?php echo $_SESSION['username'];?></h1><br>
<div class="col-lg-8 m-auto d-block">
<div class="card" >
  <h3><?php echo $_SESSION['username'];?>, you have to select only 1 option out of 4. Best of Luck :) </h3>
</div><br>
<div class="container">
  <form action="check.php" method="post">
<?php
for ($i=1; $i <6 ; $i++) {
  $q="select * from questions where qid=$i";
  $query = mysqli_query($con,$q)or die( mysqli_error($con));
  while ($rows = mysqli_fetch_array($query)) {
 ?>
  <h4 ><?php echo $rows['question']?></h4>

        <?php
              $q="select * from answers where ansid=$i";
              $query = mysqli_query($con,$q) or die( mysqli_error($con));
               while ($rows = mysqli_fetch_array($query)) {
                 ?>
                 <input type="radio" name="quiz[<?php echo $rows['ansid']; ?>]" value="<?php echo$rows['aid']; ?>">
                 <?php echo $rows['answer'] ; ?>

<?php
  }
}
}


 ?>
 <div><input type="submit"name="submit" value="Submit"></div>
</form>
<form action="logout.php" method="post"><input type="submit" name="" value="Log Out"></form>
</div>
</div>
</div>
</body>
</html>
