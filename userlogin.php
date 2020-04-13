<!DOCTYPE html>
<html>
  <head>
    <style>
    body
    {
      margin: 0;
      padding: 0;
      font-family: sans-serif;
      background: url(bg.jpg);
      background-size: cover;
    }
    .box
    {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%,-50%);
      width: 400px;
      padding: 40px;
      background: rgba(0, 0, 0, 0.8);
      box-sizing: border-box;
      box-shadow: 0 15px 25px rgba(0, 0, 0, 0.8);
      border-radius: 10px;
    }
    .box h2
    {
      margin: 0 0 30px;
      padding: 0;
      color: #fff;
      text-align: center;
    }
    .box .inputBox
    {
      position: relative;

    }
    .box .inputBox input
    {
      width: 100%;
      padding: 10px 0;
      font-size: 16px;
      color: #fff;
      letter-spacing: 2;
      margin-bottom: 30px;
      border: none;
      border-bottom: 1px solid #fff;
      outline: none;
      background: transparent;

    }
    .box .inputBox label
    {
      position: absolute;
      top: 0;
      left: 0;
      padding: 10px 0;
      font-size: 16px;
      color: #fff;
      letter-spacing: 2;
      pointer-events: none;
      transition: 0.5s;
      }
    .box .inputBox input:focus ~ label,
    .box .inputBox input:valid ~ label
      {
        top: -20px;
        left: 0;
        color: #298c43;
        font-size: 12px;
      }
      .box input[type="submit"]
      {
        background: transparent;
        border: none;
        outline: none;
        color: #fff;
        background:  #298c43;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
      }
</style>
    <meta charset="utf-8">
    <title>User Page</title>
  </head>
  <body>
    <div class="box">
      <h2>PHP QUIZ</h2>
      <form <div class="inputBox" action="registeruser.php" method="POST" >
        <input type="text" name="user" required="">
        <label>Username</label>
          <input type="submit" name="" value="Submit">

      </div>

   </form>
    </div>

  </body>
</html>
