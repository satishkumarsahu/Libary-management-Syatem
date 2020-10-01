<?php


$name = "";
$email= "";
$phone= "";

$con=mysqli_connect('localhost','root','','temp');
if(isset($_POST['submit'])){
   $name = $_POST['name'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   
   $query ="insert into name (name,email,phone) value ('$name','$email','$phone')";
   
    if(mysqli_query($con,$query)){

		
   }
   else{
	  
   }
   
}
?>
<html>

<title>Submit Form without Page Refresh - PHP/jQuery - TecAdmin.net</title>
<head>
</head>
<script>
function SubmitFormData() {
    var name = $("#name").val();
    var email = $("#email").val();
    var phone = $("#phone").val();
    var gender = $("input[type=radio]:checked").val();
    $.post("submit.php", { name: name, email: email, phone: phone, gender: gender },
    function(data) {
	 $('#results').html(data);
	 $('#myForm')[0].reset();
    });
}
</script>


<body>
  <form id="myForm" method="post">
     Name:    <input name="name" id="name" type="text" /><br />
     Email:   <input name="email" id="email" type="text" /><br />
     Phone No:<input name="phone" id="phone" type="text" /><br />
   

    <input type="submit" name="submit" onclick="SubmitFormData();" value="Submit" />
   </form>
   <br/>
   Your data will display below..... <br />
   ==============================<br />
   <div id="results">
   <!-- All data will display here  -->
   </div>
</body>
</html>