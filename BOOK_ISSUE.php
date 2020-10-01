  <?php
//connect to the database


$host = "localhost";
$user = "root";
$password ="";
$database = "libpro";
$stud_id = "";
$stud_name = "";
$staff_id="";
$staff_name="";
$mem_id = "";
$mem_name = "";
$issued_date = "";
$tosub="";
$isbn="";
$name = "";
$year = "";



mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// connect to mysql database
try{
    $connect = mysqli_connect($host, $user, $password, $database);
} catch (mysqli_sql_exception $ex) {
    echo 'Error';
}
 
 $query = "SELECT DISTINCT * FROM manage_books GROUP BY name";


// for method 2

$result1 = mysqli_query($connect, $query);

$options = "";

while($row1 = mysqli_fetch_array($result1))
{
    $options = $options."<option>$row1[2]</option>";
}


$query2 = "SELECT DISTINCT  * FROM  manage_books GROUP BY pub";


// for method 2

$result2 = mysqli_query($connect, $query2);

$options2 = "";

while($row2 = mysqli_fetch_array($result2))
{
    $options2 = $options2."<option>$row2[6]</option>";
}

$query3 = "SELECT DISTINCT * FROM manage_books GROUP BY pub_date";

$result3 = mysqli_query($connect, $query3);

$options3 = "";

while($row3 = mysqli_fetch_array($result3))
{
    $options3 = $options3."<option>$row3[7]</option>";
}

   
   function getPosts()
   {
	      $posts=array();
	    $posts[1]=$_POST['mem_id'];
		$posts[2]=$_POST['mem_name'];
       return $posts;
   }
   function getPosts2()
   {
	      $posts2=array();
	    $posts2[1]=$_POST['mem_id'];
		$posts2[2]=$_POST['mem_name'];
       return $posts2;
   }
    function getPosts3()
   {
	      $posts3=array();
	    $posts3[1]=$_POST['isbn'];
		$posts3[2]=$_POST['name'];
       return $posts3;
   }
   
   
   
   if(isset($_POST['find'])){
if (empty($_POST['mem_id'])) {
    echo '<div class="res">Please Enter ID To Search</div> ';
			 header("Refresh: 1; url=BOOK_ISSUE.php");
} 
else
{
  $data=getPosts();
  $search_Query = "SELECT stud_id,stud_name FROM stud_reg WHERE stud_id= $data[1]";
  $search_Result = mysqli_query ($connect,$search_Query);
  if($search_Result)
  {
	  if(mysqli_num_rows($search_Result))
	  {
		  while($row=mysqli_fetch_array($search_Result))
		  {
			  $mem_id=$row['stud_id']; 
			  $mem_name=$row['stud_name'];
		  }
	  }else{
		   echo '<div class="res">No Data For This ID</div> ';
			 header("Refresh: 1; url=BOOK_ISSUE.php");
	  }
  }else{
	  echo '<div class="res">Result Error</div> ';
			 header("Refresh: 1; url=BOOK_ISSUE.php");
  }
 }
}
 if(isset($_POST['find2'])){
	 if (empty($_POST['mem_id'])) {
    echo '<div class="res">Please Enter ID To Search</div> ';
			 header("Refresh: 1; url=BOOK_ISSUE.php");
} 
else
{
   $data=getPosts2();
  $search_Query = "SELECT staff_id ,staff_name FROM staff_reg WHERE  staff_id= $data[1]";
  $search_Result = mysqli_query ($connect,$search_Query);
  if($search_Result)
  {
	  if(mysqli_num_rows($search_Result))
	  {
		  while($row=mysqli_fetch_array($search_Result))
		  {
			  $mem_id=$row['staff_id']; 
			  $mem_name=$row['staff_name'];
		  }
	  }else{
		   echo '<div class="res">No Data For This ID</div> ';
			 header("Refresh: 1; url=BOOK_ISSUE.php");
	  }
  }else{
	  echo '<div class="res">Result Error</div> ';
			 header("Refresh: 1; url=BOOK_ISSUE.php");
  }
 }
}

 if(isset($_POST['fetch'])){
  $data=getPosts3();
  $search_Query = "SELECT isbn ,name FROM manage_books WHERE  isbn= $data[1]";
  $search_Result = mysqli_query ($connect,$search_Query);
  if($search_Result)
  {
	  if(mysqli_num_rows($search_Result))
	  {
		  while($row=mysqli_fetch_array($search_Result))
		  {
			  $isbn=$row['isbn']; 
			  $name=$row['name'];
		  }
	  }else{
		   echo '<div class="res">No Data For This ID</div> ';
			 
	  }
  }else{
	  echo '<div class="res">Result Error</div> ';
			 
  }
 }

if(isset($_POST['submit'])){
   $mem_id = $_POST['mem_id'];
   $mem_name = $_POST['mem_name'];
   $issued_date = $_POST['issued_date'];
   $tosub=$_POST['tosub'];
   $name = $_POST['name'];
   $pub = $_POST['pub'];
   $year = $_POST['year'];
   
   if (empty($_POST['mem_id'])) {
    echo '<div class="res">Please Enter ID</div> ';
			 header("Refresh: 1; url=BOOK_ISSUE.php");
} 
elseif (!preg_match('/^[0-9]*$/', $mem_id)) {
	echo '<div class="res">Please Enter Valid ID</div> ';
			 header("Refresh: 1; url=BOOK_ISSUE.php");
} 
elseif (empty($_POST['mem_name'])) {
	  echo '<div class="res">Please Find Member Name</div> ';
			 header("Refresh: 1; url=BOOK_ISSUE.php");
} 
elseif (!preg_match("/^[a-zA-Z ]*$/",$mem_name)) {
    echo '<div class="res">Please Enter Valid Name</div> ';
			 header("Refresh: 1; url=BOOK_ISSUE.php");
} 
else
{
   
   $query ="INSERT INTO  new_book (mem_id,mem_name,issued_date,tosub,name,pub,year) value ('$mem_id','$mem_name','$issued_date','$tosub','$name','$pub','$year')";
     
   if(mysqli_query($connect,$query)){
	   
           echo '<div class="res">Record Inserted Successfully</div> ';
             header("Refresh: 1; url=BOOK_ISSUE.php");
			   $name = $_POST['name'];
  $pub = $_POST['pub'];
  $year = $_POST['year'];
$query2 = "UPDATE `manage_books` SET copies = copies - 1 WHERE `name`='$name' && `pub`='$pub'  && `pub_date` = $year";

if(mysqli_query($connect,$query2)){
	   
          
   }
   else
   {
   }
   }
   else{
	   
	   echo '<div class="res">Record Not Inserted Successfully</div> ';
             header("Refresh: 1; url=BOOK_ISSUE.php");
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
height:520px;
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
	left:460px;
}
.fields2{
	position:absolute;
	top:208px;
	left:420px;
}
.fields3{
	position:absolute;
	top:263px;
	left:535px;
}
.fields4{
	position:absolute;
	top:320px;
	left:450px;
}
.fields6{
	position:absolute;
	top:370px;
	left:455px;
}

.text_boxes{
	position:absolute;
	top:170px;
	left:750px;
}
.submit{
	position:absolute;
	top:550px;
	left:420px;
}
.cancel{
	position:absolute;
	top:550px;
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
	left:853px;
}
.find2{
		position:absolute;
	top:382px;
	left:925px;
}
.year{
	position:absolute;
	top:560px;
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
.issuelist{
	position:absolute;
	top:450px;
	left:1050px;
}
.col7{
	position:absolute;
	top:425px;
	left:550px;
}
.col8{
	position:absolute;
	top:475px;
	left:510px;
}



</style>
<form action="BOOK_ISSUE.php"  method="post">

 <div class="margin">
 
 </div>
  	<div class="content_wrapper">
	
<center><h1>New Book Issue</h1></center>
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
<h3>ISSUE DATE:</h3>
</div>
<div class="fields4">
<h3>SUBMMISSION DATE:</h3>
</div>


<div class="fields6">
<h3>BOOK BORROWING:</h3>
</div>
<div class="col7">
<h3>PUBLISHER:</h3>
</div>
<div class="col8">
<h3>PUBLISH YEAR:</h3>
</div>



<div class="text_boxes">
<input type="text"  name="mem_id" placeholder="id" onfocus="this.blur;"  value="<?php echo $mem_id;?>" size="10px" style="height: 27px;"/><br></br>
<input type="text"  name="mem_name"placeholder="name" onfocus="this.blur;" value="<?php echo $mem_name;?>" size="30px" style="height: 27px;"/><br></br>
<input type="date" name="issued_date" onfocus="this.blur;"  value="<?php echo date('Y-m-d'); ?>"  min="<?php echo date("Y-m-d"); ?>" max="<?php echo date("Y-m-d"); ?>" style="height: 27px;"/><br></br>
<input type="date" name="tosub" onfocus="this.blur;" value="<?php echo date('Y-m-d'); ?>"   min="<?php echo date("Y-m-d"); ?>"  style="height: 27px;"/><br></br>
<select name="name"  style="height: 35px;"/><br>
            <?php echo $options;?>
        </select><br></br>
<select name="pub"  style="height: 35px;"/><br>
            <?php echo $options2;?>
        </select><br></br>	
		
	<select name="year"   style="height:35px"/><br>
            <?php echo $options3;?>
        </select><br></br>	
		
</div>

 <div class="find">
<input type="submit" name="find" value="FIND STUDENT"  style="height:33px; width:110px" />
<input type="submit" name="find2" value="FIND STAFF" style="height:33px; width:110px" />
  </div>
  

  				  
 <div class="submit">
<input type="submit" name="submit" value="SUBMIT" onclick="return confirm('Are you sure you want to add this Record?')" style="height:50px; width:150px" />
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
 
  <div class="issuelist">
<a href="issuelist.php"><img src="images\report.jpg"> </a>
</div>
 	  
 </form>
 </body>
 </html>
 

 
   