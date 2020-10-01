	<?php
//connect to the database
$id = "";
$name = "";
$course = "";
$caste = "";
$email= "";
$phone= "";


$con=mysqli_connect('localhost','root','','libpro');


if(isset($_POST['submit'])){
	
	
   $id = $_POST['id'];
   $name = $_POST['name'];
   $course = $_POST['courses'];
   $caste = $_POST['caste'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   


   if (empty($_POST['id'])) {
    echo '<div class="res"><center>Please Enter ID</center></div> ';
			 header("Refresh: 1; url=STUDENTREG.php");
} 
elseif (!preg_match('/^[0-9]*$/', $id)) {
	echo '<div class="res"><center>Please Enter Valid ID</center></div> ';
			 header("Refresh: 1; url=STUDENTREG.php");
} 
elseif (empty($_POST['name'])) {
	  echo '<div class="res"><center>Please Enter Name</center></div> ';
			 header("Refresh: 1; url=STUDENTREG.php");
} 
elseif (!preg_match("/^[a-zA-Z ]*$/",$name)) {
    echo '<div class="res"><center>Please Enter Valid Name</center></div> ';
			 header("Refresh: 1; url=STUDENTREG.php");
} 
elseif(empty($_POST['courses'])) {
    echo '<div class="res"><center>Please Specify the Status</center></div> ';
			 header("Refresh: 1; url=STUDENTREG.php");
}
elseif (empty($_POST['email'])) {
    echo '<div class="res"><center>Please Enter Email ID</center></div> ';
			 header("Refresh: 1; url=STUDENTREG.php");
} 
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	echo '<div class="res"><center>Please Enter Valid Email ID</center></div> ';
			 header("Refresh: 1; url=STUDENTREG.php");
} 
elseif(empty($_POST['caste'])) {
    echo '<div class="res"><center>Please specify Department</center></div> ';
			 header("Refresh: 1; url=STUDENTREG.php");
} 
elseif (empty($_POST['phone'])) {
    echo '<div class="res"><center>Please Enter a Phone Number</center></div> ';
			 header("Refresh: 1; url=STUDENTREG.php");
} 
elseif(!preg_match('/^[0-9]*$/', $phone)){
	echo '<div class="res"><center>Please Enter a Valid Phone Number</center></div> ';
			 header("Refresh: 1; url=STUDENTREG.php");
}
elseif(strlen($_POST['phone'])!= 10){
	echo '<div class="res"><center>Please Enter a Valid Phone Number</center></div> ';
			 header("Refresh: 1; url=STUDENTREG.php");
}

else
{

   
   $query ="insert into stud_reg (stud_id,stud_name,course,caste,email,phone) value ('$id','$name','$course','$caste','$email','$phone')";
   
   if(mysqli_query($con,$query)){
          echo '<div class="res">Record Inserted Successfully</div> ';
			 header("Refresh: 1; url=STUDENTREG.php");
   }
   else{
	  echo '<div class="res">Record Not Inserted Successfully</div> ';
			 header("Refresh: 1; url=STUDENTREG.php");
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
	top:125px;
	left:600px;
	color:#6495ed;
	 display: block;
        font-size: 26px;
        margin-top: 1px;
        margin-bottom: 0px;
        text-align:center;
     
}
.res1{
	position:absolute;
	top:125px;
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
top:48px;
left:5px;
width:1380px;
height:470px;
font-family:"Times New Roman";
font-size:"25";
}
.bar{
position:absolute;
top:120px;
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
	left:450px;
}
.fields4{
	position:absolute;
	top:317px;
	left:475px;
}
.fields5{
	position:absolute;
	top:375px;
	left:580px;
}
.fields6{
	position:absolute;
	top:430px;
	left:572px;
}
.text_boxes{
	position:absolute;
	top:170px;
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
.studlist{
	position:absolute;
	top:410px;
	left:1050px;
}
</style>
 <form action="STUDENTREG.php" method="post">

   <div class="content_wrapper">
<center><h1>Student Registration</h1><center>
</div>

<div class="bar">
<img id="line" src="images/line.png" />
</div>

<div class="fields1">
<h3>STUDENT ID:</h3>
</div>

<div class="fields2">
<h3>STUDENT NAME:</h3>
</div>

<div class="fields3">
<h3>STUDENT COURSE:</h3>
</div>

<div class="fields4">
<h3>STUDENT CASTE:</h3>
</div>

<div class="fields5">
<h3>EMAIL:</h3>
</div>

<div class="fields6">
<h3>PHONE:</h3>
</div>


 <div class="margin">
 
 </div>
<div class="text_boxes">
  <input type="text"  name="id" placeholder="id" size="30px" style="height: 27px;"/><br></br>
  <input type="text"  name="name" placeholder="name" size="30px" style="height: 27px;"/><br></br>
  <select name="courses" style="height: 35px;"/><br>
  <option>BCA</option>
  <option>BCOM</option>
  <option>BBM</option>
  <option>MCA</option>
  </select><br></br>
  
  <select name="caste" width="100px" style="height: 35px;"/><br>
  <option>SC</option>
  <option>ST</option>
  <option>OBC</option>
  <option>FC</option>
  </select><br></br>
  <input type="text"  name="email" placeholder="email" size="30px" style="height: 27px;"/><br></br>
  <input type="text"  name="phone" placeholder="phone" size="30px" style="height: 27px;"/><br></br>
 </div>
 
 <div class="submit">

 <a href="STUDENTREG.php">
<input type="submit" name="submit" value="SUBMIT" onclick="return confirm('Are you sure you want to add this Record?')" style="height:50px; width:150px" /></a><br>
  </div>
  
  <div class="cancel">
  <a href="admin_home.php">
<input type="button" name="cancel" value="CANCEL"  style="height:50px; width:150px" /></a><br>
</div>

<div class="studlist">
<a href="Selectstud.php"><img src="images\report.jpg"> </a>
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
	



 