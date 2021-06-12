<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>My website</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style type="text/css">
      body{
          background-color: #A569BD;
      }
      button{
        transition: 1.5s;
      }
      button:hover{
        background-color:#616C6F;
        color: white;
      }
    </style>


</head>

<body>


<?php
    include 'connection.php';
    $sql = "SELECT * FROM users";
    $result = mysqli_query($con,$sql);
?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">THE VIOLET TECH</div>
  <button><a href="logout.php">Logout</a></button>
</nav>


  
	
	<h1>This is the index page</h1>

	<br>
	Hello, <?php echo $user_data['user_name']; ?>



	<div class="container">
        <h2 class="text-center pt-4" style="color : white;">Our Customers</h2>
        <br>
            <div class="row">
                <div class="col">
                    <div class="table-responsive-sm">
                    <table class="table table-hover table-sm table-striped table-condensed table-bordered" style="border-color:white;">
                        <thead style="color:white;">
                            <tr>
							<th scope="col" class="text-center py-2">User Id</th>
                            <th scope="col" class="text-center py-2">User Name</th>
                            <th scope="col" class="text-center py-2">Password</th>
                           
                            
                            </tr>
                        </thead>
                        <tbody>
                <?php 
                    while($rows=mysqli_fetch_assoc($result)){
                ?>
                    <tr style="color : white;">
                        <td class="py-2"><?php echo $rows['user_id'] ?></td>
                        <td class="py-2"><?php echo $rows['user_name']?></td>
                        <td class="py-2"><?php echo $rows['password']?></td>
                         
                    </tr>
                <?php
                    }
                ?>
            
                        </tbody>
                    </table>
                    </div>
                </div>
            </div> 
         </div>




	<footer class="text-center mt-2 py-5">
          <p id="copyright"></p>
        </footer>
        <script>
          var currYear = new Date().getFullYear();
          document.getElementById("copyright").innerHTML = "&copy "+currYear+"  <b>Prasad Anshul</b> </br>Intern, VioletTech";
        </script>
         <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>