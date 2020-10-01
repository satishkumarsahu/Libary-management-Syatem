<?php
//connect to the database

$host = "localhost";
$user = "root";
$password ="";
$database = "libpro";

$issued_date = "";
$mem_id = "";
$mem_name = "";
$isbn = "";
$name = "";



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
	   $posts[1]=$_POST['issued_date'];
	   $posts[2]=$_POST['mem_id'];
	   $posts[3]=$_POST['mem_name'];
	   $posts[4]=$_POST['isbn'];
	   $posts[5]=$_POST['name'];
       return $posts;
   }
   if(isset($_POST['find'])){

  $data=getPosts();
  $search_Query = "SELECT `$name` FROM manage_books WHERE isbn = $data[1]";
  $search_Result = mysqli_query ($connect,$search_Query);
  if($search_Result)
  {
	  if(mysqli_num_rows($search_Result))
	  {
		  while($row=mysqli_fetch_array($search_Result))
		  {
			  
			  $name=$row['name'];
		  }
	  }else{
		   echo '<div class="res">No Data For This ID</div> ';
			 header("Refresh: 1; url=BOOK_ISSUE_BOOK.php");
	  }
  }else{
	  echo '<div class="res">Result Error</div> ';
			 header("Refresh: 1; url=BOOK_ISSUE.php");
  }
}

   
   


   ?>
 
 <html>  
      <head>  
           <title></title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />   
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head>  
      <body>  
	  <form action="BOOK_ISSUE.php" method="post">
 <link href="BOOK_ISSUE.css" type="text/css" rel="stylesheet">
 
 	<div class="content_wrapper">
	
<center><h1>New Book Issue</h1></center>
</div>


<div class="line">
<img id="line" src="images/line.png" />
</div>

<div class="fields1">
<h3>ISSUE DATE:</h3>
</div>

<div class="fields2">
<h3>STUDENT/STAFF ID:</h3>
</div>

<div class="fields3">
<h3>STUDENT/STAFF NAME:</h3>
</div>



<div class="text_boxes">
  <input type="date" name="issued_date" style="height: 27px;"/><br></br>
  <input type="text"  name="mem_id" size="30px" style="height: 27px;"/><br></br>
  <input type="text"  name="mem_name" size="30px" style="height: 27px;"/><br></br>
 </div>
 
 

  
 
 <div class="submit">
<input type="submit" name="submit" value="SUBMIT" style="height:50px; width:150px" />
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
	    <li><a href ="LOGIN.php">Logout</a><li>
	</ul>
	</li>
	 
 </div>
 </div>
 </form>
           <div class="container">  
                <br />  
                <br />  
                <h2 align="center"></h2>  
                <div class="form-group">  
                     <form name="add_name" id="add_name">  
                          <div class="table-responsive">  
                               <table class="table table-bordered" id="dynamic_field">  
                                    <tr>  
									     
                                         <td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td>
                                          										 
                                         <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                                    </tr>  
                               </table>  
                               <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />  
                          </div>  
                     </form>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
		   
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      $('#submit').click(function(){            
           $.ajax({  
                url:"name.php",  
                method:"POST",  
                data:$('#add_name').serialize(),  
                success:function(data)  
                {  
                     alert(data);  
                     $('#add_name')[0].reset();  
                }  
           });  
      });  
 });  
 </script>
   


 