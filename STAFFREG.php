<?php
//connect to the database

$id = "";
$name = "";
$status = "";
$department= "";
$email= "";
$phone= "";

$con=mysqli_connect('localhost','root','','libpro');

if(isset($_POST['submit'])){
	$id = $_POST['id'];
   $name = $_POST['name'];
   $status = $_POST['status'];
   $department = $_POST['department'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   
   if (empty($_POST['id'])) {
    echo '<div class="res">Please Enter ID</div> ';
			 header("Refresh: 1; url=STAFFREG.php");
} 
elseif (!preg_match('/^[0-9]*$/', $id)) {
	echo '<div class="res">Please Enter Valid ID</div> ';
			 header("Refresh: 1; url=STAFFREG.php");
} 
elseif (empty($_POST['name'])) {
	  echo '<div class="res">Please Enter Name</div> ';
			 header("Refresh: 1; url=STAFFREG.php");
} 
elseif (!preg_match("/^[a-zA-Z ]*$/",$name)) {
    echo '<div class="res">Please Enter Valid Name</div> ';
			 header("Refresh: 1; url=STAFFREG.php");
} 
elseif(empty($_POST['status'])) {
    echo '<div class="res">Please Specify the Status</div> ';
			 header("Refresh: 1; url=STAFFREG.php");
}
elseif (empty($_POST['email'])) {
    echo '<div class="res">Please Enter Email ID</div> ';
			 header("Refresh: 1; url=STAFFREG.php");
} 
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	echo '<div class="res">Please Enter Valid Email ID</div> ';
			 header("Refresh: 1; url=STAFFREG.php");
} 
elseif(empty($_POST['department'])) {
    echo '<div class="res">Please specify Department</div> ';
			 header("Refresh: 1; url=STAFFREG.php");
} 
elseif (empty($_POST['phone'])) {
    echo '<div class="res">Please Enter a Phone Number</div> ';
			 header("Refresh: 1; url=STAFFREG.php");
} 
elseif(!preg_match('/^[0-9]*$/', $phone)){
	echo '<div class="res">Please Enter a Valid Phone Number</div> ';
			 header("Refresh: 1; url=STAFFREG.php");
}
elseif(strlen($_POST['phone'])!= 10){
	echo '<div class="res">Please Enter a Valid Phone Number</div> ';
			 header("Refresh: 1; url=STAFFREG.php");
}
else
{

   //Insert the value in the student table
   
   $query ="insert into staff_reg (staff_id,staff_name,status,dept,email,phone) value ('$id','$name','$status','$department','$email','$phone')";
   
    if(mysqli_query($con,$query)){
      
	  echo '<div class="res">Record Inserted Successfully</div> ';
			 header("Refresh: 1; url=STAFFREG.php");
   }
   else{
	   echo '<div class="res">Record Not Inserted Successfully</div> ';
			 header("Refresh: 1; url=STAFFREG.php");
   }
   
}
}

	?> 
	
<!DOCTYPE html>

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
#cover{
	position:absolute;
	top:50px;
	left:100px;
}
.res{
	position:absolute;
	top:124px;
	left:600px;
	color:#6495ed;
	 display: block;
    font-size: 26px;
	text-align: center;
    margin-top: 1px;
    margin-bottom: 0px;
     
}
.res1{
	position:absolute;
	top:124px;
	left:390px;
	color:#6495ed;
	 display: block;
        font-size: 26px;
        margin-top: 1px;
        margin-bottom: 0px;
        text-align:center;
     
}
 .content_wrapper{
position:absolute;
top:47px;
left:5px;
width:1380px;
height:470px;
font-family:"Times New Roman";
font-size:"25";
}
.line{
position:absolute;
top:115px;
left:370px;
}
.fields1{
	position:absolute;
	top:155px;
	left:520px;
}
.fields2{
	position:absolute;
	top:208px;
	left:480px;
}
.fields3{
	position:absolute;
	top:263px;
	left:530px;
}
.fields4{
	position:absolute;
	top:317px;
	left:475px;
}
.fields5{
	position:absolute;
	top:375px;
	left:550px;
}
.fields6{
	position:absolute;
	top:430px;
	left:542px;
}
.text_boxes1{
	position:absolute;
	top:170px;
	left:680px;
}
.text_boxes2{
	position:absolute;
	top:225px;
	left:680px;
}
.text_boxes3{
	position:absolute;
	top:280px;
	left:680px;
}
.text_boxes4{
	position:absolute;
	top:330px;
	left:680px;
}
.text_boxes5{
	position:absolute;
	top:390px;
	left:680px;
}
.text_boxes6{
	position:absolute;
	top:445px;
	left:680px;
}

.submit{
	position:absolute;
	top:520px;
	left:420px;
}
.cancel{
	position:absolute;
	top:520px;
	left:700px;
}
.stafflist{
	position:absolute;
	top:410px;
	left:1050px;
}
</style>
 <form action="STAFFREG.php" method="post">

 <div class="margin">
 
 </div>
   <div class="content_wrapper">
<center><h1>Staff Registration</h1><center>
</div>
<div class="line">
<img id="line" src="images/line.png" />
</div>


<div class="fields1">
<h3>STAFF ID:</h3>
</div>

<div class="fields2">
<h3>STAFF NAME:</h3>
</div>

<div class="fields3">
<h3>STATUS:</h3>
</div>

<div class="fields4">
<h3>DEPARTMENT:</h3>
</div>

<div class="fields5">
<h3>EMAIL:</h3>
</div>

<div class="fields6">
<h3>PHONE:</h3>
</div>



<div class="text_boxes1">
<input type="text"  name="id" placeholder="id" size="30px" style="height: 27px;"/><br></br>
</div>

<div class="text_boxes2">
  <input type="text"  name="name" placeholder="name"  size="30px" style="height: 27px;"/><br></br>
  </div>
  
  <div class="text_boxes3">
  <select name="status" style="height: 35px;"/><br>
  <option>Teaching</option>
  <option>Non-Teaching</option>
  </select><br></br>
  </div>
  
  <div class="text_boxes4">
  <select name="department" width="150px" style="height: 35px;"/><br>
  <option>COMPUTER SCIENCE</option>
  <option>MANAGEMENT</option>
  <option>COMMERCE</option>
  <option>LANGUAGE</option>
  </select><br></br>
  </div>
  
  <div class="text_boxes5">
  <input type="text"  name="email" placeholder="email" size="30px" style="height: 27px;"/><br></br>
  </div>
  
  <div class="text_boxes6">
  <input type="text"  name="phone" placeholder="phone" size="30px" style="height: 27px;"/><br></br>
 </div>
 

 
 <div class="submit">
 <a href="STAFFREG.php">
<input type="submit" name="submit" value="SUBMIT" onclick="return confirm('Are you sure you want to Add this record?')" style="height:50px; width:150px" /></a>
  </div>
  
  <div class="cancel">
  <a href="admin_home.php">
<input type="button" name="cancel" value="CANCEL"  style="height:50px; width:150px" /></a>
  </div>
  
  <div class="stafflist">
<a href="Selectstaff.php"><img src="images\report.jpg"> </a>
</div>
   
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
 </body>
 </html>
 
	

 



 


 