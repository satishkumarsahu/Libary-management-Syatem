 <?php
    $conn = mysqli_connect("localhost","root","","test_db");

 ?> 

<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="//code.jquery.com/jquery-1.11.2.min.js">                     </script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js">  </script>
 <script type="text/javascript">
  $(document).ready(function(){

  $('#agencyID_dwn').change(function(){

var reg_number = $(this).val();
  var data_String;
 data_String = 'reg_number='+reg_number;
$.post('dataGet.php',data_String,function(data){
    console.log(data);
  var data= jQuery.parseJSON(data);

   $('#testid').val(data.Name);


      });
   });
  });

  </script>

<body>
<form>
<select name="agencyID_dwn" class="idLookup_dwn"  id="agencyID_dwn" >
<option selected>...Select...</option>
 <?php
  $query = "select AgencyName_id from AgencyName";
 $result = mysqli_query($conn,$query);
 while($row = mysqli_fetch_array($result)){
  ?>

   <option value="<?php echo $row['AgencyName_id'];?>"> 
   <?php echo $row['AgencyName_id'];?></option>
  <?php
   }
   ?>
    </select>
    // for input text
    <input type="text" id="testid">
    // submit button
       <input type="submit" name="lookupSubmit">
  </form>
 </body>
 </html>