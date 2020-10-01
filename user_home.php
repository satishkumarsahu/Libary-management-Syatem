<!DOCTYPE html>

<html>

<body>
<style>
body{
padding:0;
margin:0;
overflow-y:scroll;
font-family:Arial;
font-size:18px;
background-image: url("LOWRY.jpg");
background-color: #cccccc;
}
#nav{
background:#6495ed;
}
#nav_wrapper{
position:relative;
top:2px;
left:-80px;
width:800px;
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
	top:70px;
	left:490px;
}
 .bar{
	 position:absolute;
	top:110px;
	left:340px;
}
	 
</style>
 </body>
 
 </html>
 <div class="content_wrapper">

 </div>
 

	
   <div id="nav">
	 <div id="nav_wrapper">
	<ul>
     <li><a href="user_home.php">Home</a></li>
	  <li><a href="#">E-Library</a>
	  <ul>
	      <li><a href ="CS.php">Computer Science</a><li>
		<li><a href ="COMMERCE.php">Commerce</a><li>
		<li><a href ="MANAGEMENT.php">Management</a><li>
		</ul>
	</li>
	 <li><a href="http://localhost/libpro/search/">Search</a>
	 <li><a href ="about.php">About</a></li>
	  </div>
	</div>

 
 