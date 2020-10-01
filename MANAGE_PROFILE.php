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
left:66px;
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
.bar{
position:absolute;
top:110px;
left:370px;
}

.cancel{
	position:absolute;
	top:540px;
	left:700px;
}
.EDIT_STUD{
	position:absolute;
	top:290px;
	left:220px;
}
.DELETE_STUD{
	position:absolute;
	top:295px;
	left:700px;
}
.EDIT_STAFF{
	position:absolute;
	top:510px;
	left:245px;
}
.DELETE_STAFF{
	position:absolute;
	top:510px;
	left:730px;
}

.logo1{
	position:absolute;
	top:155px;
	left:290px;
}
.logo2{
	position:absolute;
	top:155px;
	left:790px;
}
.logo3{
    position:absolute;
	top:345px;
	left:280px;
}
.logo4{
    position:absolute;
	top:350px;
	left:790px;
}
	
</style>
 </body>
 </html>
 
 <div class="margin">
 
 </div>
   <div class="content_wrapper">
<center><h1>Manage Profile</h1><center>
</div>

<div class="bar">
<img id="line" src="images/line.png" />
</div>

<div class="EDIT_STUD">
<p><a href="EDIT_STUD.php"><h2><img src="images\EDIT_STUD.png"></h2> </a></p>
</p>
</div>

<div class="logo1">
<p><a href="EDIT_STUD.php"><img src="images\07-35-47-student_edit.jpg"> </a></p>
</p>
</div>

<div class="DELETE_STUD">
<p><a href="DELETE_STUD.php"><img src="images\DELETE_STUD.png"> </a></p>
</p>
</div>

<div class="logo2">
<p><a href="DELETE_STUD.php"><img src="images\07-34-16-student_delete.jpg"></a></p>
</p>
</div>

  
 <div class="EDIT_STAFF">
<p><a href="EDIT_STAFF.php"><img src="images\EDIT_STAFF.png"> </a></p>
</p>
</div>

<div class="logo3">
<p><a href="EDIT_STAFF.php"><img src="images\businessman_edit.png"> </a></p>
</p>
</div>

 
 <div class="DELETE_STAFF">
<p><a href="DELETE_STAFF.php"><img src="images\DELETE_STAFF.png"> </a></p>
</p>
</div>

<div class="logo4">
<p><a href="DELETE_STAFF.php"><img src="images\07-40-43-Administrator Delete.jpg"> </a></p>
</p>
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



 