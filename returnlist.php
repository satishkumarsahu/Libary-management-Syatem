<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `new_book` WHERE `mem_id`='$valueToSearch' OR `mem_name`='$valueToSearch' OR `issued_date`='$valueToSearch' OR `tosub`='$valueToSearch' OR `submit_date`='$valueToSearch' OR `charge`='$valueToSearch' OR `name`='$valueToSearch' OR `pub`='$valueToSearch' OR `year`='$valueToSearch'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `new_book`";
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
$query = "SELECT * FROM `new_book`";
}
?>

<!DOCTYPE html>
<html>
    <head>
        
       
            <style type="text/css">

   table{
	   position:absolute;
		top:130px;
		left:100px;
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
        
        <form action="returnlist.php" method="post">
		<div class="back">
		<a href="MANAGE_ISSUE.php"><img src="images\BACK.jpg"> </a>
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
            
            <table width="1200" border="10" align="center">
                <tr>
                    <th><h2>ID</h2></th>
                    <th><h2>NAME</h2></th>
                    <th><h2>ISSUE DATE</h2></th>
                    <th><h2>SUBMISSION DATE</h2></th>
					<th><h2>RETURN DATE</h2></th>
					<th><h2>BOOK</h2></th>
					<th><h2>PUBLISHER</h2></th>
					<th><h2>YEAR</h2></th>
					<th><h2>FINE</h2></th>
                </tr>

                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><h3><center><?php echo $row['mem_id'];?></center></h3></td>
                    <td><h3><center><?php echo $row['mem_name'];?></center></h3></td>
                    <td><h3><center><?php echo $row['issued_date'];?></center></h3></td>
                    <td><h3><center><?php echo $row['tosub'];?></center></h3></td>
					<td><h3><center><?php echo $row['submit_date'];?></center></h3></td>
				    <td><h3><center><?php echo $row['name'];?></center></h3></td>
					<td><h3><center><?php echo $row['pub'];?></center></h3></td>
					<td><h3><center><?php echo $row['year'];?></center></h3></td>
					<td><h3><center><?php echo $row['charge'];?></center></h3></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
        
    </body>
</html>