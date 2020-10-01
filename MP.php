<?php

   

$error=''; //Variable to Store error message;
if(isset($_POST['submit'])){
	

$user=$_POST['user'];
$old_pass=$_POST['old_pass'];
$pass=$_POST['pass'];
$pass1=$_POST['pass1'];
//Establishing Connection with server by passing server_name, user_id and pass as a parameter
$con = mysqli_connect("localhost", "root", "");
//Selecting Database
$db = mysqli_select_db($con, "libpro");
//sql query to fetch information of registerd user and finds user match.
$query = mysqli_query($con, "SELECT * FROM userpass WHERE pass='$old_pass' AND user='$user'");
$rows = mysqli_num_rows($query);

if(empty($_POST['user']) || empty($_POST['old_pass'])){
echo '<div class="res"><center>Please Enter Username And Old Password</center></div> ';
			 header("Refresh: 1; url=MP.php");
}
elseif($rows != 1){
	echo '<div class="res"><center>Please Enter Valid Username And Old Password</center></div> ';
			 header("Refresh: 1; url=MP.php");
}
elseif($pass == ""){
	echo '<div class="res"><center>Please Enter New Password</center></div> ';
			 header("Refresh: 1; url=MP.php");
			 
 }
	
 elseif($pass != $pass1){
	  echo '<div class="res"><center>Please Confirm Your New Password</center></div> ';
			 header("Refresh: 1; url=MP.php");
			 
 }
 else{
	
	 $query ="UPDATE `userpass` SET `user`='$user',`pass`='$pass1' WHERE `user`='$user'" ;
   if(mysqli_query($con,$query)){
          echo '<div class="res">Password Reseted Successfully</div> ';
			 header("Refresh: 1; url=MP.php");
   }
   else{
	  echo '<div class="res">Password Not Reseted Successfully</div> ';
			 header("Refresh: 1; url=MP.php");
  
   }
 
 }
 }



?>


<html>
<body>
<style>
body{
padding:0;
position:fixed;
margin:0;
overflow-y:scroll;
font-family:Arial;
font-size:18px;
}
#nav{
background:#6495ed;
position:relative;
top:0px;
left:0px;
width:1900px;

}
#nav_wrapper{
position:relative;
top:2px;
left:145px;
width:1800px;
margin:0 auto;
text-align:left;
}
.margin{
	position:absolute;
top:-10px;
left:136px;
width:1060px;
height:530px;
margin:50px auto;
border-radius:10px;
border:2px solid #6495ed;
padding:10px 40px 25px;
margin-top:70px;
color:#6495ed;
}
#nav ul{
  list-style-type:none;
  padding:0;
 margin:0;
 position:relative;
}
#nav ul li{
 display:inline-block;
}
#nav ul li:hover{
background-color:#333;
}
#nav ul li a,visited{
color:#ccc;
display:block;
padding:15px;
text-decoration:none;
}
#nav ul li a:hover {
color:#ccc;  
text-decoration:none;
}
#nav ul li:hover ul{
display:block;
}
#nav ul ul{
display:none;
position:absolute;
background-color:#333;
border:5px solid #222;
border-top:0;
margin-left:-5px;
min-width:200px;
}
#nav ul ul li{
display:block;
}
#nav ul ul li a,visted{
color:#ccc;
}
#nav ul ul li a:hover{
color:#099;
}
 
 

 #nav2{
background:#6495ed;
}
#nav2_wrapper{
	position:absolute;
	top:2px;
	left:1000px;
width:300px;
margin:0 auto;
text-align:left;
}
#nav2 ul{
  list-style-type:none;
  padding:0;
 margin:0;
 position:relative;
}
#nav2 ul li{
 display:inline-block;
}
#nav2 ul li:hover{
background-color:#333;
}
#nav2 ul li a,visited{
color:#ccc;
display:block;
padding:15px;
text-decoration:none;
}
#nav2 ul li a:hover {
color:#ccc;  
text-decoration:none;
}
#nav2 ul li:hover ul{
display:block;
}
#nav2 ul ul{
display:none;
position:absolute;
background-color:#333;
border:5px solid #222;
border-top:0;
margin-left:-5px;
min-width:200px;
}
#nav2 ul ul li{
display:block;
}
#nav2 ul ul li a,visted{
color:#ccc;
}
#nav2 ul ul li a:hover{
color:#099;
}

.header{
width:1380px;
height:90px;
margin:auto;
Background:White;
}

#logo{float:left;}
#banner{float:right;}

.content{
position:absolute;
	top:65px;
	left:30px;
width:1380px;
height:470px;
font-family:"Times New Roman";
font-size:"25";

}
.pic{
	position:absolute;
	top:210px;
	left:420px;
}
.username{
	position:absolute;
	top:180px;
	left:603px;
}

.Submit_me{
position:absolute;
top:340px;
left:440px;
}
.BACK_LOGIN{
position:absolute;
top:410px;
left:450px;
}

.submit{
	position:absolute;
top:500px;
left:400px;
}
.cancel{
	position:absolute;
top:500px;
left:650px;
}

.res{
	position:absolute;
	top:145px;
	left:450px;
	color:#6495ed;
	 display: block;
        font-size: 26px;
        margin-top: 1px;
        margin-bottom: 0px;
        text-align:center;
     
}
.margin{
	position:absolute;
top:-10px;
left:136px;
width:1060px;
height:530px;
margin:50px auto;
border-radius:10px;
border:2px solid #6495ed;
padding:10px 40px 25px;
margin-top:70px;
color:#6495ed;
}
.text1{
	position:absolute;
	top:330px;
	left:603px;
}
.text2{
	position:absolute;
	top:380px;
	left:603px;
}
.fields1{
	position:absolute;
	top:260px;
	left:400px;
}
.old_pass{
	position:absolute;
	top:235px;
	left:603px;
}
.fields2{
	position:absolute;
	top:310px;
	left:400px;
}
.fields3
{
	position:absolute;
	top:360px;
	left:370px;
}
.line{
	position:absolute;
	top:135px;
	left:370px;
}
</style>

<form action="MP.php" method="post" style="text-align:center;">

       <!--Header starts here-->	

	    <!--Header ends here-->
<div class="line">
<img id="line" src="images/line.png" />
</div>
	<div class="content">
	
<center><h1>Manage Profile</h1><center>

 <font color="Green">
 </div>
 
 <div class="margin">
 
 </div>
 
 

 <div class="pic">
  <h3>*UserName:</h3>
 <br></br>
 </div>
 
 
 <div class="username">
 <br></br><input type="text"  name="user" placeholder="username" size="30px" style="height: 33px;"/>
 </div>
 <div class="old_pass">
 <br></br><input type="password"  name="old_pass" placeholder="old password" size="30px" style="height: 33px;"/>
 </div>
 
 <div class="fields1">
 <h3>*Old Password:</h3>
 </div>
  <div class="fields2">
 <h3>*New Password:</h3>
 </div>
 <div class="fields3">
 <h3>*Confirm Password:</h3>
 </div>
 <div class="text1">
  <input type="password"  name="pass" placeholder="new password" size="30px" style="height: 33px;"/>

 </div>
 <div class="text2">
 <input type="password"  name="pass1"  placeholder="confirm password"size="30px" style="height: 33px;" />
 </div>
 
 <div class="cancel">
<input type="submit" name="cancel" value="CANCEL" style="height:50px; width:150px" />
  </div>


<div class="submit">
<input type="submit"  name="submit" value="SUBMIT" onclick="return confirm('Do you want to change the password?')"  style="height:50px; width:150px" /></a>
 </div>
</body>
<div id="nav">
	 <div id="nav_wrapper">
	<ul>
     <li><a href="admin_home.php">Home</a></li>
	  <li><a href="#">Modules</a>
	  <ul>
	    <li><a href ="ADD_BOOK.php">Add Book</a><li>
        <li><a href ="MANAGE_BOOK.php">Manage Book</a><li>
		<li><a href ="ADD_CATEGORY.php ">Add Category</a><li>

	</ul>
	</li>
	 <li><a href="#">Issue Books</a>
	 <ul>
	 <li><a href ="BOOK_ISSUE.php">New Book Issue</a><li>
	  <li><a href ="MANAGE_ISSUE.php">Manage Books Issued</a><li>
	  </ul>
	 </li>
	 <li><a href="#">Registration</a>
	 <ul>
	      <li><a href ="STAFFREG.php">Staff Registration</a><li>
		  <li><a href ="STUDENTREG.php">Student Registration</a><li>
		  <li><a href ="MANAGE_PROFILE.php">Manage Student/Staff Profile</a></li>
	 </ul>
	  </div>
	</div>
	
<div id="nav2">
<div id="nav2_wrapper">
    <ul>
     <li><a href="#">Admin</a>
      <ul>
		<li><a href ="MP.php">Manage Profile</a><li>
	</ul>
	</li>
	 
 </div>
 </div>
  </form>
</html>


 
