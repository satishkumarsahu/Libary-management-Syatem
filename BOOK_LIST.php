<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `manage_books` WHERE `name`='$valueToSearch' OR `category`='$valueToSearch' OR `author`='$valueToSearch' OR `isbn`='$valueToSearch' OR `pub`='$valueToSearch' OR `pub_date`='$valueToSearch' ";
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
        
       
            <style type="text/css">

   table{
	   position:absolute;
		top:130px;
		left:150px;
		border:3px solid red;
		background-color:#FFC;
	}
	th{
		border-bottom:2px solid #000;
	}
	td{
		border-bottom:2px solid #666;
	}
	.reset{
		position:absolute;
		top:60px;
		left:290px;
	}
	.search{
		position:absolute;
		top:60px;
		left:150px;
	}
	.value{
		position:absolute;
		top:15px;
		left:150px;
	}
	.back{
		position:absolute;
		top:15px;
		left:15px;
	}
	</style>
       
    </head>
    <body>
        
        <form action="BOOK_LIST.php" method="post">
		<div class="back">
		<a href="ADD_BOOK.php"><img src="images\BACK.jpg"> </a>
		</div>
		<div class="value">
		
            <input type="text" name="valueToSearch" placeholder="Enter Value To Search" size="30px" style="height: 27px;"/><br><br>
			</div>
			<div class="reset">
			<input type="submit" name="reset" value="REFRESH" style="height: 27px;"/><br><br>
			</div>
			<div class="search">
            <input type="submit" name="search" value="SEARCH" style="height: 27px;"/><br><br>
			</div>
            
            <table width="1000" border="10" align="center">
                <tr>
				    <th><h2>ISBN</h2></th>
                    <th><h2>BOOK NAME</h2></th>
                    <th><h2>CATEGORY</h2></th>
                    <th><h2>AUTHOR</h2></th>
					<th><h2>PUBLISHER</h2></th>
					<th><h2>PUBLISH DATE</h2></th>
                    <th><h2>COPIES</h2></th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
				    <td><h3><center><?php echo $row['isbn'];?></center></h3></td>
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