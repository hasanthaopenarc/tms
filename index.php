<?php session_start();
require 'db.php';
if(!isset($_SESSION['user'])){
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<ul>
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="addtask.php">Add Task</a></li>
  <li><a href="reports.php">Reports</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>


<?php
echo  "Welcome User : " . $_SESSION['user'];

//display Tasks

$sql="SELECT * FROM task";
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
                    <th>Edit</th>
                    <th>Delete</th>
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
                    <td><a href="edittask.php?id='.$row['Id'].'">Edit</a></td>
                    <td><a href="deletetask.php?id='.$row['Id'].'">Delete</a></td>
                </tr>';
        $i++;
    }

    $table.='</tbody></table>';
    echo $table;
}else{
    echo "No Records Found";
}

?>

</body>
</html>
