<?php 
include("connection.php");
if(isset($_POST['btn_save']))
{
$user_name=$_POST['user_name'];
$user_password=$_POST['user_password'];

mysqli_query($connection,"insert into user_login(user_name, user_password) values ('$user_name','$user_password')") 
			or die ("Query 1 is inncorrect........");
header("location: login.php"); 
mysqli_close($connection);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>FSCTech</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="boostrap/css/bootstrap.css" rel="stylesheet"
</head>
<body>
<div class="container">
  <div align="center">	
  <div class="panel-heading" style="background-color:#c4e17f">
	<h1>Add User  </h1></div><br>
	
<form action="add_user.php" name="form" method="post">
<input name="user_name" class="input-lg" type="text"  id="user_name" style="font-size:18px; width:200px" placeholder="User-Name" autofocus required><br><br>
<input name="user_password" class="input-lg" type="text"  id="user_password" style="font-size:18px; width:200px"  placeholder="Password" required>
<hr>
 <button type="submit" class="btn btn-success" name="btn_save" id="btn_save" style="font-size:18px">Submit</button>
</form>
</div></div>
</body>
</html>