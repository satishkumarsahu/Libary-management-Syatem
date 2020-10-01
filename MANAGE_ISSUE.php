

 <?php
//connect to the database

$host = "localhost";
$user = "root";
$password ="";
$database = "libpro";

$mem_id = "";
$mem_name = "";
$tosub = "";
$submit_date= "";
$charge= "";
$name= "";
$pub = "";
$year = "";


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
	   $posts[3]=$_POST['tosub'];
	   $posts[4]=$_POST['submited_date'];
	   $posts[5]=$_POST['charge'];
	   $posts[6]=$_POST['name'];
	   $posts[7]=$_POST['pub'];
	   $posts[8]=$_POST['year'];
	   return $posts;
   }
  

	
if(isset($_POST['search'])){
   if (empty($_POST['mem_id'])) {
    echo '<div class="res">Please Enter ID To Search</div> ';
			 header("Refresh: 1; url=MANAGE_ISSUE.php");
} 
elseif (!preg_match('/^[0-9]*$/', $mem_id)) {
	echo '<div class="res">Please Enter Valid ID</div> ';
			 header("Refresh: 1; url=MANAGE_ISSUE.php");
}
else
{
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
			  $tosub=$row['tosub'];
			  $submit_date=$row['submit_date'];
			  $charge=$row['charge'];
			  $name=$row['name'];
			  $pub=$row['pub'];
			  $year=$row['year'];
		  }
	  }else{
		   echo '<div class="res">No Data For This ID</div> ';
			 header("Refresh: 1; url=MANAGE_ISSUE.php");
	  }
  }else{
	  echo '<div class="res">Result Error</div> ';
			 header("Refresh: 1; url=MANAGE_ISSUE.php");
  }
}
}
if(isset($_POST['update']))
{   
   
   if (empty($_POST['mem_id'])) {
    echo '<div class="res">Please Enter ID</div> ';
			 header("Refresh: 1; url=MANAGE_ISSUE.php");
} 
 elseif (!preg_match('/^[0-9]*$/', $mem_id)) {
	echo '<div class="res">Please Enter Valid ID</div> ';
			 header("Refresh: 1; url=MANAGE_ISSUE.php");
}

  else
  {
    $data = getPosts();
    $update_Query = "UPDATE `new_book` SET `mem_name`='$data[2]',`tosub`='$data[3]',`submit_date`='$data[4]',`charge`='$data[5]',`name`='$data[6]',`pub`='$data[7]',`year`='$data[8]' WHERE `mem_id` = $data[1]";
    try{
        $update_Result = mysqli_query($connect, $update_Query);
        
        if($update_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
              echo '<div class="res">Record Updated Successfully</div> ';
             header("Refresh: 1; url=MANAGE_ISSUE.php");
			 $name = $_POST['name'];
  $pub = $_POST['pub'];
  $year = $_POST['year'];
$query2 = "UPDATE `manage_books` SET copies = copies + 1 WHERE `name`='$name' && `pub`='$pub'  && `pub_date` = $year";

if(mysqli_query($connect,$query2)){
	   
          
   }
   else{
	   
	
   }
            }else{
               echo '<div class="res">Record Updated Successfully</div> ';
             header("Refresh: 1; url=MANAGE_ISSUE.php");
             
          
            }
        }
    } catch (Exception $ex) {
        echo '<div class="res">Error Update</div> ';
             header("Refresh: 1; url=MANAGE_ISSUE.php");
    }
}

   
  }
  
  
		  
	?>
	
<!DOCTYPE html>

<html>

<body>
<script>
function computeCost()
{  
   
	var start = document.getElementById("tosub").value;
	var end = document.getElementById("submited_date").value;
	var beg = new Date(start);
	var fin=  new Date(end);

	var diff = new Date(fin - beg);
var days = diff/1000/60/60/24;
if(fin < beg)
{
	fine=0;
}else{
   fine = days * 50;
}
document.getElementById("charge").value = fine;
}

</script>

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
height:555px;
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
	top:145px;
	left:457px;
}
.fields2{
	position:absolute;
	top:198px;
	left:417px;
}
.fields3{
	position:absolute;
	top:253px;
	left:445px;
}
.fields4{
	position:absolute;
	top:310px;
	left:510px;
}
.fields5{
	position:absolute;
	top:365px;
	left:510px;
}
.fields6{
	position:absolute;
	top:410px;
	left:460px;
}
.fields7{
	position:absolute;
	top:460px;
	left:535px;
}

.text_boxes{
	position:absolute;
	top:160px;
	left:750px;
	position:fixed;
	
}
.submit{
	position:absolute;
	top:590px;
	left:420px;
}
.cancel{
	position:absolute;
	top:590px;
	left:700px;
}
.fetch{
		position:absolute;
	top:350px;
	left:270px;
}
.find{
		position:absolute;
	top:160px;
	left:855px;
}
.fine{
	position:absolute;
	top:375px;
	left:1055px;
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
.test{
	position:absolute;
	top:450px;
	left:500px;
}
.col7{
	position:absolute;
	top:515px;
	left:500px;
}
.returnlist{
	position:absolute;
	top:520px;
	left:1100px;
}

</style>
<form action="MANAGE_ISSUE.php" method="post">
  	<div class="content_wrapper">
	
<center><h1>Return Book Issue</h1></center>
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
<h3>SUBMMISSION DATE:</h3>
</div>

<div class="fields4">
<h3>RETURN DATE:</h3>
</div>

<div class="fields5">
<h3>LATE CHARGE:</h3>
</div>
<div class="fields6">
<h3>BOOK BORROWED:</h3>
</div>

<div class="fields7">
<h3>PUBLISHER:</h3>
</div>
<div class="col7">
<h3>PUBLISH YEAR:</h3>
</div>


 <div class="margin">
 
 </div>
<div class="text_boxes">
<input type="text"  name="mem_id" placeholder="mem_id" value="<?php echo $mem_id;?>" size="10px" style="height: 27px;"/><br></br>
<input type="text"  name="mem_name" placeholder="mem_name" value="<?php echo $mem_name;?>" size="30px" style="height: 27px;"/> <br></br>
<input type="text" name="tosub" id="tosub" placeholder="submission_date" onkeydown="return false" value="<?php echo $tosub;?>" size="30px" style="height: 27px;"/> <br></br>
<input type="date" name="submited_date" id= "submited_date" onkeydown="return false" placeholder="submit_date" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date("Y-m-d"); ?>"  max="<?php echo date("Y-m-d"); ?>" size="30px" style="height: 27px;"/> <br></br>
<input type="text"  name="charge" id="charge"  placeholder="charge" value = 0 onfocus="this.blur;" size="10px" style="height: 27px;"/> <br></br>
<input type="text"  name="name" placeholder="name" onkeydown="return false" value="<?php echo $name;?>" size="30px" style="height: 27px;"/><br></br>
<input type="text" name="pub" placeholder="publisher" onkeydown="return false" value="<?php echo $pub;?>" size="30px" style="height: 27px;"/> <br></br>
<input type="text"  name="year" placeholder="year" onkeydown="return false" size="20px" value="<?php echo $year;?>" style="height: 27px;"/><br></br>
 </div>
 

 
 <div class="find">

<input type="submit" name="search" value="FIND" style="height:33px; width:110px" /></a>
</div>

 <div class="fine">

<input type="button" id="cost" value="COMPUTE" onclick="computeCost();" style="height:33px; width:110px" />
</div>
    	
	
 <div class="submit">
 <a href="MANAGE_ISSUE.php">
<input type="submit" name="update" value="UPDATE"  style="height:50px; width:150px" /></a>

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
  </table>
  </div>
  <div class="returnlist">
<a href="returnlist.php"><img src="images\report.jpg"> </a>
</div>
 </form>
 </body>
 </html>