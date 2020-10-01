
<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `manage_books` WHERE CONCAT(`name`, `category`, `author`, `pub`,`pub_date`,`copies`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `manage_books`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "libpro");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

if(isset($_POST['reset']))
{
$query = "SELECT * FROM `manage_books`";
}
?>

<!DOCTYPE html>

<html>
<head>
<style>
body{
padding:0;
margin:0;

overflow-y:scroll;
font-family:Arial;
font-size:18px;
background-image: url("BACK.jpg");
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
.cover{
	position:absolute;
	top:200px;
	left:100px;
}
.bar{
	position:absolute;
	top:250px;
	left:100px;
}

   table{
	   position:absolute;
		top:180px;
		left:80px;
		border:3px #25383C;
		 background-image: url("TAB.jpg");
		 color:#463E3F;
	}
	th{
		border-bottom:2px solid #25383C;
	}
	td{
		border-bottom:2px solid #25383C;
	}
	.reset{
		position:absolute;
		top:120px;
		left:290px;
	}
	.search{
		position:absolute;
		top:120px;
		left:150px;
	}
	.value{
		position:absolute;
		top:70px;
		left:150px;
	}
		
	
</style>
</head>
<body>
<form action="user_search.php" method="post">
		<div class="value">
		
            <input type="text" name="valueToSearch" placeholder="Enter Value To Search" size="40px" style="height: 27px;"/><br><br>
			
			</div>
			<div class="reset">
			<input type="submit" name="reset" value="REFRESH" style="height: 27px;"/><br><br>
			</div>
			<div class="search">
            <input type="submit" name="search" value="SEARCH" style="height: 27px;"/><br><br>
			</div>
            
            <table width="1100" border="10" align="center">
                <tr>
				    
                    <th><h2>BOOK NAME</h2></th>
                    <th><h2>CATEGORY</h2></th>
                    <th><h2>AUTHOR</h2></th>
					<th><h2>PUBLISHER</h2></th>
					<th><h2>PUBLISH DATE</h2></th>
                    <th><h2>AVAILABLE</h2></th>
                    </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
				   
                    <td><h3><center><?php echo $row['name'];?></center></h3></td>
                    <td><h3><center><?php echo $row['category'];?></center></h3></td>
                    <td><h3><center><?php echo $row['author'];?></center></h3></td>
					<td><h3><center><?php echo $row['pub'];?></center></h3></td>
					<td><h3><center><?php echo $row['pub_date'];?></center></h3></td>
                    <td><h3><center><?php echo $row['copies'];?></center></h3></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
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
	 <li><a href="user_search.php">Search</a>
	 <li><a href ="about.php">About</a></li>
	  </div>
	</div>
	

 