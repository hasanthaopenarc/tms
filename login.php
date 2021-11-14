<?php session_start();
require 'db.php';

if(isset($_POST['email'])){

    $email=$_POST['email'];
    $md5password =md5($_POST['passwd']);

    $sql="SELECT * FROM users WHERE Email='$email' AND Password='$md5password'";
    $result = mysqli_query($conn, $sql);

    $count=mysqli_num_rows($result); //no of records

    if ($count > 0) {
        $row=mysqli_fetch_row($result);
        
        $_SESSION['user'] = $row[1];
        header("location:index.php");
        
    }else{
        echo "Invalid Username or Password";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Area - TMS</title>
</head>
<body>
    <h2>Login Area - TMS</h2>
    <form action="" method="POST">
    <table>
        <tr>
            <td>Email</td>
            <td><input type="email" name="email"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="passwd"></td>
        </tr>
        <tr>
            <td><input type="reset" value="Reset"></td>
            <td><input type="submit" value="Login"></td>
        </tr>
    </table>

    </form>
    <a href="register.php">Register</a>
</body>
</html>