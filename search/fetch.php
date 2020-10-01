<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "libpro");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT name,author,category,copies,pub,pub_date FROM manage_books
  WHERE name LIKE '%".$search."%'
  OR author LIKE '%".$search."%' 
  OR category LIKE '%".$search."%'
  OR pub LIKE '%".$search."%'
  OR pub_date LIKE '%".$search."%'
  
 ";
}
else
{
 $query = "
  SELECT * FROM manage_books ORDER BY name
 ";
}
$result = mysqli_query($connect,$query);
if(mysqli_num_rows($result) != 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Book Name</th>
	 <th>Category</th>
	 <th>Author</th>
	 <th>Publisher</th>
	 <th>Publish Date</th>
	 <th>Availability</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["name"].'</td>
	<td>'.$row["category"].'</td>
	<td>'.$row["author"].'</td>
	<td>'.$row["pub"].'</td>
	<td>'.$row["pub_date"].'</td>
	<td>'.$row["copies"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>