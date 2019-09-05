<?php
include 'connection.php';
include 'check_session.php';

$id=$_GET['id'];
$reciver=mysqli_query($connection,"select user_name from user_login where user_id='$id'")or die ("query 1 incorrect...");
list($username)=mysqli_fetch_array($reciver);

if(isset($_POST['btn_save']))
{
$reciver1=$_POST['reciver'];
$sender=$_POST['sender'];
$msg=$_POST['msg'];

mysqli_query($connection,"insert into messages( sender, reciver,message) values ('$sender','$reciver1','$msg')") 
			or die ("Query 1 is inncorrect........");
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
	<h1>Sending Message to<span style="font-size:40px; color:#F00"> <?php echo"$username";?> </span> </h1></div><br>
	
<form method="post" action="message.php">
		<input hidden="" class="input-lg" type="text" name="sender" value="<?php $user_id=$_SESSION['user_id'];
$query=mysqli_query($connection,"select user_name from user_login where user_id='$user_id'")or die ("query 1 incorrect.......");
list($sendername)=mysqli_fetch_array($query);
 echo "$sendername";?>">
 <input hidden="" class="input-lg" type="text" name="reciver" value="<?php $id=$_GET['id'];
$reciver=mysqli_query($connection,"select user_name from user_login where user_id='$id'")or die ("query 1 incorrect...");
list($username)=mysqli_fetch_array($reciver);
 echo "$username";?>">
 
  <div class="col-lg-12">
		<textarea class="input-lg" name="msg" placeholder="enter message" required rows="10" style="width:100%"></textarea></div><br>
<a class="btn btn-danger btn-lg" href="welcome.php">Cancel</a>
<input class="btn btn-primary btn-lg" type="submit" name="btn_save" id="btn_save" value="Send">
		</form>
</div></div>
</body>
</html>