<?php

if(isset($_POST["name"])){
$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server, $username, $password);

if(!$con){
    die("Connection to this database failed due to " . mysqli_connect_error());
}

$name = $_POST['name'];
$email = $_POST['email'];
$feedback = $_POST['message'];


$sql = " INSERT INTO `VioletTech`.`feedback` ( `Name`, `email`, `feedback`, `dt`) VALUES ( '$name', '$email', '$feedback', current_timestamp()); ";

if($con->query($sql) == true ){
    echo '<script type="text/javascript">

    window.onload = function () { alert("Record inserted successfully"); }

</script>';
}
else{
    echo "ERROR: $sql <br> $con->error";
}

$con->close();
}

?>