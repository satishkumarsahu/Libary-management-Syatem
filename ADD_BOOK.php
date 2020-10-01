<?php

// php select option value from database

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "libpro";

// connect to mysql database

$con = mysqli_connect($hostname, $username, $password, $databaseName);
// mysql select query

$query = "SELECT * FROM `category`";


// for method 2

$result1 = mysqli_query($con, $query);

$options = "";

while($row1 = mysqli_fetch_array($result1))
{
    $options = $options."<option>$row1[1]</option>";
}

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $author = $_POST['author'];
   $isbn = $_POST['isbn'];
   $category = $_POST['category'];
   $copies = $_POST['copies'];
   $pub = $_POST['pub'];
   $pub_date = $_POST['pub_date'];
   

   if (empty($_POST['isbn'])) {
    echo '<div class="res">Please Enter ISBN</div> ';
			 header("Refresh: 1; url=ADD_BOOK.php");
} 
elseif (!preg_match('/^[0-9]*$/', $isbn)) {
	echo '<div class="res">Please Enter Valid ISBN</div> ';
			 header("Refresh: 1; url=ADD_BOOK.php");
} 
elseif(strlen($_POST['isbn'])!= 13){
	echo '<div class="res">Please Enter a Valid ISBN</div> ';
			 header("Refresh: 1; url=ADD_BOOK.php");
}
elseif (empty($_POST['name'])) {
	  echo '<div class="res">Please Enter Book Name</div> ';
			 header("Refresh: 1; url=ADD_BOOK.php");
} 
elseif(empty($_POST['author'])) {
    echo '<div class="res">Please Enter Author Name</div> ';
			 header("Refresh: 1; url=ADD_BOOK.php");
}
elseif (!preg_match("/^[a-zA-Z ]*$/",$author)) {
    echo '<div class="res">Please Enter Valid Author Name</div> ';
			 header("Refresh: 1; url=ADD_BOOK.php");
} 
elseif (empty($_POST['copies'])) {
    echo '<div class="res">Please Enter Number Of Copies</div> ';
			 header("Refresh: 1; url=ADD_BOOK.php");
} 
elseif(!preg_match('/^[0-9]*$/', $copies)){
	echo '<div class="res">Please Enter Only Integers</div> ';
			 header("Refresh: 1; url=ADD_BOOK.php");
}
elseif(empty($_POST['pub'])) {
    echo '<div class="res">Please Enter Publisher Name</div> ';
			 header("Refresh: 1; url=ADD_BOOK.php");
}
elseif (!preg_match("/^[a-zA-Z ]*$/",$pub)) {
    echo '<div class="res">Please Enter Valid Publisher Name</div> ';
			 header("Refresh: 1; url=ADD_BOOK.php");
} 
elseif (empty($_POST['pub_date'])) {
    echo '<div class="res">Please Enter Publish Year</div> ';
			 header("Refresh: 1; url=ADD_BOOK.php");
} 
elseif(!preg_match('/^[0-9]*$/', $pub_date)){
	echo '<div class="res">Please Enter a Valid Year</div> ';
			 header("Refresh: 1; url=ADD_BOOK.php");
}
elseif(strlen($_POST['pub_date'])!= 4){
	echo '<div class="res">Please Enter a Valid Year</div> ';
			 header("Refresh: 1; url=ADD_BOOK.php");
}

else
{
   //Insert the value in the student table
   
   $query ="insert into manage_books(name,author,isbn,category,copies,pub,pub_date) value ('$name','$author','$isbn','$category','$copies','$pub','$pub_date')";
   
   if(mysqli_query($con,$query)){
           echo '<div class="res">Record Inserted Successfully</div> ';
             header("Refresh: 1; url=ADD_BOOK.php");
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
height:500px;
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

 .content_wrapper{
position:absolute;
top:50px;
left:5px;
width:1380px;
height:470px;
font-family:"Times New Roman";
font-size:"25";
}
.line{
position:absolute;
top:112px;
left:370px;
}
.col1{
	position:absolute;
	top:155px;
	left:600px;
}
.col2{
	position:absolute;
	top:208px;
	left:520px;
}
.col3{
	position:absolute;
	top:263px;
	left:560px;
}
.col4{
	position:absolute;
	top:317px;
	left:535px;
}
.col5{
	position:absolute;
	top:320px;
	left:860px;
}
.col6{
	position:absolute;
	top:370px;
	left:530px;
}
.col7{
	position:absolute;
	top:430px;
	left:500px;
}
.booklist{
	position:absolute;
	top:410px;
	left:1000px;
}
.text_boxes{
     
	position:absolute;
	top:170px;
	left:680px;
  
}
.submit{
	position:absolute;
	top:500px;
	left:420px;
}
.cancel{
	position:absolute;
	top:500px;
	left:700px;
}
.status{
	position:absolute;
	top:335px;
	left:960px;
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
</style>
 <form action="ADD_BOOK.php" method="post">
 
 <div class="margin">
 
 </div>
  <div class="content_wrapper">
<center><h1>Add Book</h1><center>
</div>

<div class="line">
<img id="line" src="images/line.png" />
</div>

<div class="col1">
<h3>ISBN:</h3>
</div>

<div class="col2">
<h3>BOOK NAME:</h3>
</div>

<div class="col3">
<h3>AUTHOR:</h3>
</div>


<div class="col4">
<h3>CATEGORY:</h3>
</div>


<div class="col5">
<h3>COPIES:</h3>
</div>
<div class="col6">
<h3>PUBLISHER:</h3>
</div>

<div class="col7">
<h3>PUBLISH YEAR:</h3>
</div>


<div class="booklist">
<a href="BOOK_LIST.php"><img src="images\report.jpg"> </a>
</div>

<div class="text_boxes">
<input type="text"  name="isbn" size="30px" placeholder="isbn" style="height: 27px;"/><br></br>
  <input type="text"  name="name" size="30px" placeholder="name" style="height: 27px;"/><br></br>
    <input type="text"  name="author" size="30px" placeholder="author" style="height: 27px;"/><br></br>
	<select name="category"  style="height: 35px;"/><br>
            <?php echo $options;?>
        </select><br></br>
		

  <input type="text"  name="pub" placeholder="publisher"  size="30px" style="height: 27px;"/><br></br>
  <input type="text"  name="pub_date" placeholder="publish year" size="30px" style="height: 27px;"/><br></br>
 </div>
 
 <div class="status">
  <input type="text"  name="copies" placeholder="copies" size="5px" style="height: 27px;"/><br></br>
 </div>
 
  <div class="submit">
  <a href="ADD_BOOK.php">
<input type="submit" name="submit" value="SUBMIT" class="btn btn-success" onclick="return confirm('Are you sure you want to Add this Record?')" style="height:50px; width:150px" /></a>
  </div>
  
  <div class="cancel">
  <a href="admin_home.php">
<input type="button" name="cancel" value="CANCEL" class="btn btn-success" style="height:50px; width:150px" /></a>
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
 </html>
