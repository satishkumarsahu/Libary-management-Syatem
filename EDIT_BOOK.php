 <?php
//connect to the database

$host = "localhost";
$user = "root";
$password ="";
$database = "libpro";

$isbn = "";
$name = "";
$author = "";
$category= "";
$copies="";
$pub="";
$pub_date="";

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
	   $posts[1]=$_POST['isbn'];
	   $posts[2]=$_POST['name'];
	   $posts[3]=$_POST['author'];
	   $posts[4]=$_POST['category'];
	   $posts[5]=$_POST['copies'];
	   $posts[6]=$_POST['pub'];
	   $posts[7]=$_POST['pub_date'];
       return $posts;
   }

if(isset($_POST['search'])){

if (empty($_POST['isbn'])) {
    echo '<div class="res">Please Enter ISBN To Search</div> ';
			 header("Refresh: 1; url=EDIT_BOOK.php");
} 
else
{
  $data=getPosts();
  $search_Query = "SELECT * FROM manage_books WHERE isbn = $data[1]";
  $search_Result = mysqli_query ($connect,$search_Query);
  if($search_Result)
  {
	  if(mysqli_num_rows($search_Result))
	  {
		  while($row=mysqli_fetch_array($search_Result))
		  {
			  $isbn=$row['isbn'];
			  $name=$row['name'];
			  $author=$row['author'];
			  $category=$row['category'];
			  $copies=$row['copies'];
			  $pub=$row['pub'];
			  $pub_date=$row['pub_date'];
		  }
	  }else{
		   echo '<div class="res">No Data For This ID</div> ';
			 header("Refresh: 1; url=EDIT_BOOK.php");
	  }
  }else{
	  echo '<div class="res">Result Error</div> ';
			 header("Refresh: 1; url=EDIT_BOOK.php");
  }
}
}

if(isset($_POST['update']))
{
    $data = getPosts();
    $update_Query = "UPDATE `manage_books` SET `name`='$data[2]',`author`='$data[3]',`category`='$data[4]',`copies`='$data[5]',`pub`='$data[6]',`pub_date`='$data[7]' WHERE `isbn` = $data[1]";
    try{
        $update_Result = mysqli_query($connect, $update_Query);
        
        if($update_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
              echo '<div class="res">Record Updated Successfully</div> ';
             header("Refresh: 1; url=EDIT_BOOK.php");
            }else{
               echo '<div class="res">Record Updated Successfully</div> ';
             header("Refresh: 1; url=EDIT_BOOK.php");
             
          
            }
        }
    } catch (Exception $ex) {
        echo '<div class="res">Error Update</div> ';
             header("Refresh: 1; url=EDIT_BOOK.php");
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
left:115px;
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
	top:115px;
	left:500px;
	color:#6495ed;
	 display: block;
        font-size: 26px;
        margin-top: 1px;
        margin-bottom: 0px;
        text-align:center;
     
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
top:110px;
left:370px;
}
.fields1{
	position:absolute;
	top:155px;
	left:505px;
}
.fields2{
	position:absolute;
	top:205px;
	left:502px;
}
.fields3{
	position:absolute;
	top:263px;
	left:545px;
}
.fields4{
	position:absolute;
	top:317px;
	left:520px;
}
.col5{
	position:absolute;
	top:375px;
	left:480px;
}
.col6{
	position:absolute;
	top:430px;
	left:520px;
}
.col7{
	position:absolute;
	top:480px;
	left:490px;
}
.text_boxes{
	position:absolute;
	top:170px;
	left:674px;
}
.submit{
	position:absolute;
	top:560px;
	left:420px;
}
.cancel{
	position:absolute;
	top:560px;
	left:700px;
}
.find{
	position:absolute;
	top:170px;
	left:811px;
}
.status{
	position:absolute;
	top:390px;
	left:675px;
}
</style>
<form action="EDIT_BOOK.php" method="post"> 
 <div class="margin">
 
 </div>
   <div class="content_wrapper">
<center><h1>Edit Book</h1><center>
</div>

<div class="line">
<img id="line" src="images/line.png" />
</div>

<div class="fields1">
<h3>ENTER ISBN:</h3>
</div>

<div class="fields2">
<h3>BOOK NAME:</h3>
</div>

<div class="fields3">
<h3>AUTHOR:</h3>
</div>

<div class="fields4">
<h3>CATEGORY:</h3>
</div>

<div class="col5">
<h3>NO. OF COPIES:</h3>
</div>
<div class="col6">
<h3>PUBLISHER:</h3>
</div>
<div class="col7">
<h3>PUBLISH DATE:</h3>
</div>




 <div class="text_boxes">
 <input type="text"  name="isbn" placeholder="isbn" value="<?php echo $isbn;?>" size="15px" style="height: 27px;"><br></br>
  <input type="text"  name="name" placeholder="name" value="<?php echo $name;?>"size="30px" style="height: 27px;"><br></br>
  <input type="text"  name="author" placeholder="author" value="<?php echo $author;?>" size="30px" style="height: 27px;"><br></br>
  <input type="text"  name="category" placeholder="category" value="<?php echo $category;?>" size="30px" style="height: 27px;"><br></br>
  <input type="text"  name="copies" placeholder="Copies" value="<?php echo $copies;?>" size="5px" style="height: 27px;"/><br></br>
  <input type="text"  name="pub" placeholder="publisher" value="<?php echo $pub;?>" size="30px" style="height: 27px;"/><br></br>
  <input type="text"  name="pub_date" placeholder="publish date" value="<?php echo $pub_date;?>" size="30px" style="height: 27px;"/><br></br>
  </div>
  
  
  
  <div class="find">
  <input type="submit" name="search" value="FIND"  style="height:33px" />
  </div>
 
 <div class="submit">
 <a href="EDIT_BOOK.php">
<input type="submit" name="update" value="UPDATE" onclick="return confirm('Are you sure you want you want to Update this record?')" style="height:50px; width:150px" /></a>
  </div>
  
  <div class="cancel">
  <a href="admin_home.php">
<input type="button" name="cancel" value="CANCEL"  style="height:50px; width:150px" ></a>
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

