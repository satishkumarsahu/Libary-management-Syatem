 <?php
//connect to the database

$host = "localhost";
$user = "root";
$password ="";
$database = "libpro";

$mem_id = "";
$mem_name = "";
$issued_date="";
$name= "";
$month= "";
$year= "";
$charge= "";



mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// connect to mysql database
try{
    $connect = mysqli_connect($host, $user, $password, $database);
} catch (mysqli_sql_exception $ex) {
    echo 'Error';
}
   function getPosts()
   {
	   $posts=array();
	   $posts[1]=$_POST['mem_id'];
	   $posts[2]=$_POST['mem_name'];	   
	   $posts[3]=$_POST['issued_date'];
	   $posts[4]=$_POST['name'];
	   $posts[4]=$_POST['charge'];
	   return $posts;
   }

if(isset($_POST['search'])){

  $data=getPosts();
  $search_Query = "SELECT * FROM new_book WHERE mem_id= $data[1]";
  $search_Result = mysqli_query ($connect,$search_Query);
  if($search_Result)
  {
	  if(mysqli_num_rows($search_Result))
	  {
		  while($row=mysqli_fetch_array($search_Result))
		  {
			  $mem_id=$row['mem_id'];
			  $mem_name=$row['mem_name'];
			  $issued_date=$row['issued_date'];
			  $name=$row['name'];
			  $charge=$row['charge'];
		  }
	  }else{
		   echo '<div class="res">No Data For This ID</div> ';
			 header("Refresh: 1; url=DAMAGE_BOOK.php");
	  }
  }else{
	  echo '<div class="res">Result Error</div> ';
			 header("Refresh: 1; url=DAMAGE_BOOK.php");
  }
}
if(isset($_POST['submit'])){
   $mem_id = $_POST['mem_id'];
   $mem_name = $_POST['mem_name'];
   $issued_date = $_POST['issued_date'];
   $name = $_POST['name'];
   $month = $_POST['month'];
   $year = $_POST['year'];
   $charge = $_POST['charge'];
   
   
   //Insert the value in the student table
   
   $query ="INSERT INTO  damagelist (mem_id,mem_name,issued_date,name,month,year,charge) value ('$mem_id','$mem_name','$issued_date','$name','$month','$year','$charge')";
     
   if(mysqli_query($connect,$query)){
	   
           echo '<div class="res">Record Inserted Successfully</div> ';
             header("Refresh: 1; url=DAMAGE_BOOK.php");
   }
   else{
	   
	   echo '<div class="res">Record Not Inserted Successfully</div> ';
             header("Refresh: 1; url=DAMAGE_BOOK.php");
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
top:40px;
left:20px;
width:1380px;
height:470px;
font-family:"Times New Roman";
font-size:"25";
}
.line{
position:absolute;
top:105px;
left:370px;
}
.fields1{
	position:absolute;
	top:155px;
	left:457px;
}
.fields2{
	position:absolute;
	top:208px;
	left:417px;
}
.fields3{
	position:absolute;
	top:263px;
	left:515px;
}
.fields4{
	position:absolute;
	top:320px;
	left:457px;
}
.fields5{
	position:absolute;
	top:370px;
	left:575px;
}
.fields6{
	position:absolute;
	top:425px;
	left:593px;
}
.fields7{
	position:absolute;
	top:475px;
	left:560px;
}


.text_boxes{
	position:absolute;
	top:170px;
	left:750px;
}
.submit{
	position:absolute;
	top:600px;
	left:420px;
}
.cancel{
	position:absolute;
	top:600px;
	left:700px;
}
.fetch{
		position:absolute;
	top:350px;
	left:270px;
}
.find{
		position:absolute;
	top:170px;
	left:855px;
}
.book{
	position:absolute;
	top:350px;
	left:590px;
}
.res{
		position:absolute;
	top:115px;
	left:500px;
	color:#6495ed;
	 display: block;
        font-size: 26px;
        margin-top: 1px;
        margin-bottom: 0px;
        text-align:center;
}
.text{
	position:absolute;
	top:450px;
	left:500px;
}
.damagelist{
	position:absolute;
	top:550px;
	left:1050px;
}

</style>
<form action="DAMAGE_BOOK.php" method="post"> 
  	<div class="content_wrapper">
	
<center><h1>Damage/Lost Books</h1></center>
</div>


<div class="line">
<img id="line" src="images/line.png" />
</div>

<div class="fields1">
<h3>STUDENT/STAFF ID:</h3>

</div>

<div class="fields2">
<h3>STUDENT/STAFF NAME:</h3>
</div>

<div class="fields3">
<h3>ISSUED DATE:</h3>
</div>

<div class="fields4">
<h3>BOOK BORROWED:</h3>
</div>
<div class="fields5">
<h3>MONTH:</h3>
</div>

<div class="fields6">
<h3>YEAR:</h3>
</div>

<div class="fields7">
<h3>CHARGE:</h3>
</div>


<div class="text_boxes">
<input type="text"  name="mem_id" placeholder="mem_id" value="<?php echo $mem_id;?>" size="10px" style="height: 27px;"/><br></br>
<input type="text"  name="mem_name" placeholder="mem_name" value="<?php echo $mem_name;?>" size="30px" style="height: 27px;"/><br></br>
<input type="text"  name="issued_date" placeholder="issued_date" value="<?php echo $issued_date;?>" size="30px" style="height: 27px;"/><br></br>
<input type="text"  name="name" placeholder="name" value="<?php echo $name;?>" size="30px" style="height: 27px;"/><br></br>
<input type="text"  name="month" placeholder="month" value="<?php echo $month;?>" size="30px" style="height: 27px;"/><br></br>
<input type="text"  name="year" placeholder="year" value="<?php echo $year;?>" size="30px" style="height: 27px;"/><br></br>
<input type="text"  name="charge" placeholder="charge" value="<?php echo $charge;?>" size="10px" style="height: 27px;"/><br></br>
 </div>
 

 
 <div class="find">
<input type="submit" name="search" value="FIND" style="height:33px; width:110px" />
  </div>
    						  
 <div class="submit">
 <a href="MANAGE_ISSUE.php">
<input type="submit" name="submit" value="SUBMIT" onclick="return confirm('Are you sure you want you want to submit this record?')" style="height:50px; width:150px" /></a>
  </div>
  
  <div class="cancel">
  <a href="admin_home.php">
<input type="button" name="cancel" value="CANCEL"  style="height:50px; width:150px" /></a>
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
	  <li><a href ="DAMAGE_BOOK.php">Damage/Lost Book</a><li>
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
	    <li><a href ="LOGIN.php">Logout</a><li>
	</ul>
	</li>		 
 </div>
 </div>  
 	 <div class="damagelist">
<a href="damagelist.php"><img src="images\report.jpg"> </a>
</div>
 </form>
 </body>
 </html>