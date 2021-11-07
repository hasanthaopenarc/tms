<?php
require 'db.php';

if(isset($_POST['email'])){

    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $passwd=$_POST['passwd'];
    $md5passwd=md5($passwd); //convert password to MD5 password 

    $sql = "INSERT INTO users(FirstName,LastName,Email,Password) 
            VALUES('$fname','$lname','$email','$md5passwd')";

    if (mysqli_query($conn, $sql)) {
        echo "New user created successfully";
    } else {
        echo "Error: ";
    }

    mysqli_close($conn);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>

<body>
    <h2>User Registration Form</h2>
    <form action="" method="POST">
        <table>
            <tr>
                <td>First Name</td>
                <td><input type="text" name="fname"> </td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="lname"> </td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email"> </td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="passwd"> </td>
            </tr>
            <tr>
                <td><input type="reset" value="Reset"></td>
                <td><input type="submit" value="Register"> </td>
            </tr>

        </table>
    </form>
</body>

</html>