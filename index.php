<?php
$insert=false;
$errors = array();
  if(isset($_POST['name'])){
    // set connection variables
  $server="localhost";
  $username="root";
  $password="";
//   create database connection
  $con=mysqli_connect($server,$username,$password);

//   check for connection success
  if(!$con){
    die("Connection to this database failed due to" . mysqli_connect_error());
  }
//   echo "Success connecting to the db";

// collect post variables
  $name=$_POST['name'];
  $age=$_POST['age'];
  $gender=$_POST['gender'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $desc=$_POST['desc'];
  if (empty($name) || empty($age) || empty($gender) || empty($email) || empty($phone) || empty($desc)) {
    $errors[] = "All fields are required!";
} else {
  $sql= "INSERT INTO `college_trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `desc`, `dt`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
 
//   execute the query
if ($con->query($sql) === true) {
    // Flag for successful insertion
    $insert = true;
    header("Location: thankyou.php");
    exit();
} else {
    echo "Error : $sql <br> $con->error";
}
}

// close the database connection
$con->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Travel To Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600&family=Roboto:wght@100;400;500;700&family=Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="cimage.jpg" alt="College image">
    <div class="container">
        <h1>Welcome To College Trip Form</h1>
        <p>Enter Your Details To Confirm The Participation In The Trip </p>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <input type="text" name="age" id="age" placeholder="Enter Your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter Your Gender">
            <input type="email" name="email" id="email" placeholder="Enter Your Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter Your phone">
            <textarea name="desc" id="desc", cols="30" rows="10" placeholder="Enter Any Other Information"></textarea>
            <button class="btn">Submit</button>     
        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>