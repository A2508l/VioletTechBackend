<?php
  session_start();

  include("connection.php");
  include("functions.php");


  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
      //something was posted
      $user_name = $_POST['user_name'];
      $password = $_POST['password'];

      if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
      {

          //read from database
          $query = "select * from users where user_name = '$user_name' limit 1";
          $result = mysqli_query($con, $query);

          if($result)
          {
              if($result && mysqli_num_rows($result) > 0)
              {

                  $user_data = mysqli_fetch_assoc($result);
                  
                  if($user_data['password'] === $password)
                  {

                      $_SESSION['user_id'] = $user_data['user_id'];
                      header("Location: index.php");
                      die;
                  }
              }
          }
          
          
      }else
      {
        echo "wrong username or password!";
      }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css" type="text/css">
    <title>Login</title>
</head>

<body>

    <div class="box">

        <form method="post">
            <div class="heading">Login</div>

            <input id="user_name" type="text" name="user_name" placeholder="Enter username"><br><br>
            <input id="password" type="password" name="password" placeholder="Enter password"><br><br>

            <input id="button" type="submit" value="Login"><br><br>

            <a href="signup.php">Click to Signup</a><br><br>
        </form>
    </div>
</body>

</html>