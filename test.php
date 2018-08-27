<?php
session_start();
$server ="localhost";
$user="nayema";
$pass="Capstone123";
$db="capstone";
$con = mysqli_connect($server,$user,$pass,$db);
//echo "1";
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  
$sql = "SELECT * FROM `User` ;";

$res 	= mysqli_query($con, $sql);


	  if(empty($_POST["email"]) || empty($_POST["psw"]))
	  {
	    echo '<script> alert ("Both Feldsa are required)</script">';
	
	  }
	  else
	  {
	  	

		$email = $_POST['email'];
		$password = password_hash($_POST['psw'], PASSWORD_BCRYPT); //
		//$RepPassword = $mysqli->escape_string(password_hash($_POST['Repeatpassword'], PASSWORD_BCRYPT));

		$name = $_POST['name'];
		$Weight = $_POST['weight'];
		$feet = $_POST['feet'];
		$inches = $_POST['inches'];
		$age = $_POST['age'];
		$goal = $_POST['goal'];
		//$hash = mysqli_escape_string ( md5( rand(0,1000) ) );
		//$sql = "INSERT INTO User (Email_Address, Password, Full Name, Weight, Feet, Inches, Age, Goal, hash) 
             //VALUES ('$email', '$password', '$name' , '$Weight' , '$feet' , '$inches' , '$age' , '$goal', '$hash')";

             $sql = "INSERT INTO User (Email_Address, Pass, Full_Name, Weight, Feet, Inches, Age, Goal, Active)
             VALUES ('$email', '$password', '$name' , '$Weight' , '$feet' , '$inches' , '$age' , '$goal', 1)";

             //run the statement
             $res = mysqli_query($con, $sql);

             //echo "$sql"; // the sql query is not printing is it even working?

             header('Location: loginaccount.html'); 

             


  
	  }

//}

   //echo "4";
	
?>