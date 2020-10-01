<?php

$error=''; 
if(isset($_POST['submit'])){
if(empty($_POST['user']) || empty($_POST['pass'])){
$error = "Please Enter Username And Password ";
}else
{
	
$user=$_POST['user'];
$pass=$_POST['pass'];

$conn = mysqli_connect("localhost", "root", "");

$db = mysqli_select_db($conn, "libpro");

$query = mysqli_query($conn, "SELECT * FROM userpass WHERE pass='$pass' AND user='$user'");
$rows = mysqli_num_rows($query);

if($rows == 1){
header("Location: admin_home.php"); 
}else
{
$error = "Please Enter Valid username and Password";
}
mysqli_close($conn); 
}

}


?>