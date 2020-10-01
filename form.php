<?php
//connect to the database

$img = "";

$con=mysqli_connect('localhost','root','','libpro');



 if(isset($_POST['submit'])){
	$img = $_POST['img'];
   
   $query ="insert into pics(img) value ('$img')";
   
    if(mysqli_query($con,$query)){
      
	
   }
   else{
	 
   }
   
}


	?> 
	
<!DOCTYPE html>

<html>

<body>
<style>
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

</style>
 <form action="form.php" method="post" enctype="multipart/form-data">


  <div class="text_boxes6">
  <input type="file"  name="img">
 </div>
 

 
 <div class="submit">
 <a href="STAFFREG.php">
<input type="submit" name="submit" value="SUBMIT" onclick="return confirm('Are you sure you want to Add this record?')" style="height:50px; width:150px" /></a>
  </div>
  
  <div class="cancel">
  <a href="admin_home.php">
<input type="button" name="cancel" value="CANCEL"  style="height:50px; width:150px" /></a>
  </div>
  
  
 </form>
 </body>
 </html>
 
	

 



 


 