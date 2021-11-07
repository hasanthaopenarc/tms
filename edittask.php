<?php session_start();
require 'db.php';
if(!isset($_SESSION['user'])){
    header("location:login.php");
}

$id=$_GET['id'];
//disply current record

$sql="SELECT * FROM task WHERE id='$id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_row($result);

//update current record
if(isset($_POST['task'])){

    $task=$_POST['task'];
    $des=$_POST['des'];
    $adate=$_POST['adate'];
    $ddate=$_POST['ddate'];
    $status=$_POST['status']; 

    $sql="UPDATE task SET 
            Task='$task',
            Description= '$des',
            AssignedDate='$adate',
            DeliveryDate = '$ddate',
            Status = '$status'
          WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        header("location:index.php");
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
    <title>Update Task</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<ul>
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="addtask.php">Add Task</a></li>
  <li><a href="reports.php">Reports</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>

    <h2>Update Task</h2>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Task</td>
                <td><input type="text" name="task" value="<?php echo $row[1]; ?>"></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><input type="text" name="des" value="<?php echo $row[2]; ?>"></td>
            </tr>
            <tr>
                <td>Assigned Date</td>
                <td><input type="date" name="adate" value="<?php echo $row[3]; ?>"></td>
            </tr>
            <tr>
                <td>Delivery Date</td>
                <td><input type="date" name="ddate" value="<?php echo $row[4]; ?>"></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <select name="status">
                        <option value="scheduled" >Scheduled</option>
                        <option value="inprogress" >In progress</option>
                        <option value="completed">Completed</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                    <span>Current Value : <?php echo $row[5]; ?></span>
                </td>
            </tr>
             <tr>
                <td><input type="reset" value="Reset" ></td>
                <td><input type="submit" value="Update"></td>
            </tr>
           
            
        </table>
    </form>
</body>
</html>