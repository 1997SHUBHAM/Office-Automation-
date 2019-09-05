<?php
include 'connection.php';
include 'check_session.php';

if(isset($_POST['btn_save']))
{
$teacher=$_POST['teacher'];
$day=$_POST['day'];
$class=$_POST['class'];
$time=$_POST['time'];
		
mysqli_query($connection,"insert into time_table (day,time,class,teacher) values ('$day','$time','$class','$teacher')") or die ("Time Table Query Incorrect");

 header("location: welcome.php");

}
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Sending Message</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" href="boostrap/css/bootstrap.css">
  </head>
</head>
<body>
  <div class="container">
  <div align="center">	
  <div class="panel-heading" style="background-color:#c4e17f">
	<h1>Add Time Table </h1></div><br>
	<div class="well" align="center">
    <form method="post" action="add_time_table.php" enctype="multipart/form-data" name="form">
<input hidden="" class="input-lg" type="text" name="teacher" value="<?php $user_id=$_SESSION['user_id'];
$query=mysqli_query($connection,"select user_name from user_login where user_id='$user_id'")or die ("query 1 incorrect.......");
list($sendername)=mysqli_fetch_array($query);
 echo "$sendername";?>">
  <div class="col-lg-12">
		<input class="input-lg" name="day" type="date" required><br><br>
        <input class="input-lg" placeholder="Enter Here" name="class" type="text" required><br><br>
        <input class="input-lg" name="time" type="time" required><br><br>
        </div>
<br>
<a class="btn btn-danger" href="welcome.php">Cancel</a>
<input class="btn btn-primary " type="submit" name="btn_save" id="btn_save" value="Send">
		</form></div>
</div></div>
</body>
</html>