<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `staff_reg` WHERE `staff_id`='$valueToSearch' OR `staff_name`='$valueToSearch' OR `dept`='$valueToSearch'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `staff_reg`";
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
$query = "SELECT * FROM `staff_reg`";
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
        
        <form action="Selectstaff.php" method="post">
		<div class="back">
		<a href="STAFFREG.php"><img src="images\BACK.jpg"> </a>
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
            
            <table width="900" border="10" align="center">
                <tr>
                    <th><h2>STAFF ID</h2></th>
                    <th><h2>STAFF NAME</h2></th>
                    <th><h2>STATUS</h2></th>
                    <th><h2>DEPARTMENT</h2></th>
					<th><h2>EMAIL</h2></th>
					<th><h2>PHONE</h2></th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><h3><center><?php echo $row['staff_id'];?></center></h3></td>
                    <td><h3><center><?php echo $row['staff_name'];?></center></h3></td>
                    <td><h3><center><?php echo $row['status'];?></center></h3></td>
                    <td><h3><center><?php echo $row['dept'];?></center></h3></td>
					<td><h3><center><?php echo $row['email'];?></center></h3></td>
					<td><h3><center><?php echo $row['phone'];?></center></h3></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
        
    </body>
</html>