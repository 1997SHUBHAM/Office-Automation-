<?php 
session_start();
if(isset($_SESSION['user_id'])&& $_SESSION['user_id']!="")
{}
else
{
   header("location: login.php");
}

$inactive=10222;
if(isset($_SESSION['timeout']))
{
	$sessionttl=time()- $_SESSION['timeout'];
	if($sessionttl > $inactive)
	{
	session_destroy();
	header("location:logout.php");	
	}	
}
$_SESSION['timeout']=time();
?>