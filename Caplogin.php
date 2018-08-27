<?php

$server = "localhost";
$user = "nayema";
$pass = "Capstone123";
$db = "capstone";
//echo "hello1";

$connect = mysqli_connect("$server", "$user", "$pass", "$db");
//$mysqli = new mysqli("$server", "$user", "$pass", "$db");

//$mysqli->set_charset('utf8');
//echo "hello2";


if (!$connect) {
    mysqli_error($connect);
    die();
    echo "hello3";
}
session_start();

/*if (isset($_POST["Sign Up"])) {
    if (empty($_POST["Email"]) || empty($_POST["Password"])) {
        echo '<script> alert ("Both Fields are required)</script>';
    } else {
        $_SESSION['email'] = $_POST['Email'];
        $_SESSION['password'] = $_POST['Password'];
//$_SESSION['Repeatpassword'] = $_POST['Repeatpassword'];
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['weight'] = $_POST['weight'];
        $_SESSION['feet'] = $_POST['feet'];
        $_SESSION['inches'] = $_POST['inches'];
        $_SESSION['age'] = $_POST['age'];
        $_SESSION['goal'] = $_POST['Goal'];


// Escape all $_POST variables to protect against SQL injection
        $email = $mysqli->escape_string($_POST['email']);
        $password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
        $RepPassword = $mysqli->escape_string(password_hash($_POST['Repeatpassword'], PASSWORD_BCRYPT));

        $name = $mysqli->escape_string($_POST['name']);
        $Weight = $mysqli->escape_string($_POST['weight']);
        $feet = $mysqli->escape_string($_POST['feet']);
        $inches = $mysqli->escape_string($_POST['inches']);
        $age = $mysqli->escape_string($_POST['age']);
        $goal = $mysqli->escape_string($_POST['goal']);
        $hash = $mysqli->escape_string(md5(rand(0, 1000)));


// Check if user with that email already exists

// We know user email exists if the rows returned are more than 0
        $result = $mysqli->query("SELECT * FROM User WHERE Email_Address='$email'") or die($mysqli->error);
        if ($result->num_rows > 0) {

            $_SESSION['message'] = 'User with this email already exists!';


        } else { 

            // active is 0 by DEFAULT (no need to include it here)
            $sql = "INSERT INTO User (Email_Address, Password, Full Name, Weight, Feet, Inches, Age, Goal, hash) "
                . "VALUES ('$email', 'password', 'name' , 'Weight' , 'feet' , 'inches' , 'age' , 'goal', 'hash')";
        }
        if (!$mysqli->query($sql)) {
            $_SESSION['message'] = 'Registration successfully';
            echo $_SESSION['message'];

            header("location: loginaccount.html");

        }
        else {
            $_SESSION['message'] = 'Registration failed!';
            echo $_SESSION['message'];
        }
    }
} */
if (isset($_POST["Login"])) {
    $email = $_POST['email'];
    $result = $connect ->query("SELECT * FROM User WHERE Email_Address='$email' ");
    if ($result->num_rows == 0) { //
        $_SESSION['message'] = "User with that email doesn't exist!";
        echo $_SESSION['message'];
    } else {
        $user = $result->fetch_assoc();
        if (password_verify($_POST['password'], $user['Pass'])) {
            $_SESSION['email'] = $user['Email_Address'];
            $_SESSION['name'] = $user['Full_Name'];
            $_SESSION['weight'] = $user['Weight'];

            $_SESSION['feet'] = $user['Feet'];
            $_SESSION['inches'] = $user['Inches'];
            $_SESSION['age'] = $user['Age'];
            $_SESSION['goal'] = $user['Goal'];
            $_SESSION['logged_in'] = true;
            $_SESSION['active'] = $user['Active'];
            header("location: loginaccount.html");
        }
        else
        {
            $_SESSION['message'] = "The password is incorrect!";
            echo $_SESSION['message'];
        }
    }
}
mysqli_close($connect);
$mysqli->close();
session_destroy();
error_reporting(E_ALL);



?>
