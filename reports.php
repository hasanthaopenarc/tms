<?php session_start();
require 'db.php';
if(!isset($_SESSION['user'])){
    header("location:login.php");
}

if(isset($_POST['status'])){

$status=$_POST['status'];

$sql="SELECT * FROM task WHERE Status='$status'";
$result=mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);

if($count>0){
    $i=1;
    $table='<table id="task">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Task</th>
                    <th>Description</th>
                    <th>Assigned Date</th>
                    <th>Delivery Date</th>
                    <th>Status</th>
                </tr>
                </thead><tbody>';
    while($row = mysqli_fetch_assoc($result)) {
        $table.='<tr>
                    <td>'.$i.'</td>
                    <td>'.$row['Task'].'</td>
                    <td>'.$row['Description'].'</td>
                    <td>'.$row['AssignedDate'].'</td>
                    <td>'.$row['DeliveryDate'].'</td>
                    <td>'.$row['Status'].'</td>

                </tr>';
        $i++;
    }

    $table.='</tbody></table>';

}else{
    $msg= "No Records Found";
}

}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <ul>
        <li><a class="active" href="index.php">Home</a></li>
        <li><a href="addtask.php">Add Task</a></li>
        <li><a href="reports.php">Reports</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>

    <h3>Status </h3>
    <form action="" method="POST">
        <select name="status">
            <option value="scheduled">Scheduled</option>
            <option value="inprogress">In progress</option>
            <option value="completed">Completed</option>
            <option value="cancelled">Cancelled</option>
        </select>
        <input type="submit" value="Filter">
    </form>

    <div>
        <?php
           if(isset($table)) {
               echo $table;
           }else if(isset($msg)){
               echo $msg;
           }
        ?>
    </div>

</body>

</html>