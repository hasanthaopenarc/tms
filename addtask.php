<?php session_start();
require 'db.php';

if(!isset($_SESSION['user'])){
    header("location:login.php");
}

if(isset($_POST['task'])){

    $task=$_POST['task'];
    $des=$_POST['des'];
    $adate=$_POST['adate'];
    $ddate=$_POST['ddate'];
    $status=$_POST['status'];

    $sql="INSERT INTO task(Task,Description,AssignedDate,DeliveryDate,Status)
          VALUES('$task','$des','$adate','$ddate','$status')";

    if (mysqli_query($conn, $sql)) {
        echo "New task created successfully";
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
    <title>Add Task</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<ul>
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="addtask.php">Add Task</a></li>
  <li><a href="reports.php">Reports</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>

    <h2>Add Task</h2>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Task</td>
                <td><input type="text" name="task"></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><input type="text" name="des"></td>
            </tr>
            <tr>
                <td>Assigned Date</td>
                <td><input type="date" name="adate"></td>
            </tr>
            <tr>
                <td>Delivery Date</td>
                <td><input type="date" name="ddate"></td>
            </tr>
             <tr>
                <td><input type="reset" value="Reset" ></td>
                <td><input type="submit" value="Save"></td>
            </tr>
           <input type="hidden" name="status" value="scheduled">
            
        </table>
    </form>
</body>
</html>