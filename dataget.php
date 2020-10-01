 <?php

   $conn = mysqli_connect("localhost","root","","test_db");

        $reg_number=$_POST['reg_number'];

   $query = "select * from AgencyName where AgencyName_id = '$reg_number'" ;
    $result=mysqli_query($conn, $query);

    $data =  mysqli_fetch_assoc($result);
   // print_r($data);
      echo json_encode($data);
     exit();


    ?>