<?php
include("loginserv.php"); // Include loginserv for checking username and password
?>
<!doctype html>
<html>

<meta charset="UTF-8">
<title>Login</title>
<div class="bar">
<img id="line" src="images/bar.png" />
</div>
<div class="line">
<img id="line" src="images/line2.png" />
</div>

<div class="logo1">
<img id="line" src="images/username.jpg" />
</div>
<div class="logo2">
<img id="line" src="images/password.jpg" />
</div>

<style>
.login{
position:absolute;
top:50px;
left:500px;
width:360px;
margin:50px auto;
border-radius:10px;
border:2px solid #ccc;
padding:10px 40px 25px;
margin-top:70px;
color:#6495ed;
}
input[type=text], input[type=password]{
position:relative;
top:0px;
width:260px;
height: 12px;

padding:10px;
margin-top:8px;
border:1px solid #ccc;
padding-left:5px;
font-size:16px;
}
input[type=submit]{
position:relative;
top:5px;
width:90%;
height:40px;
background-color:#6495ed;
color:white;
border:2px solid #06F;
padding:10px;
font-size:20px;
cursor:pointer;
border-radius:5px;
margin-bottom:10px;
}
.bar{
	position:absolute;
	top:0px;
	left:0px;
}
.line{
	position:absolute;
	top:180px;
	left:520px;
	width:80px;
}
.forgot_pass{
	position:absolute;
	top:430px;
	left:700px;
	color:#6495ed;
}
h2{
	color:#6495ed;
}
.logo1{
	position:absolute;
	top:220px;
	left:542px;
}
.logo2{
	position:absolute;
	top:280px;
	left:541px;
}
</style>
</head>

<body onload="javascript:window.history.forward(1);">
<div class="login">
<h1 align="center">LOGIN</h1>
<form action="" method="post" style="text-align:center;">
<input type="text" placeholder="Username" id="user" name="user" ><br/><br/>
<input type="password" placeholder="Password" id="pass" name="pass"><br/><br/>
<input type="submit" value="LOGIN" name="submit">
<!-- Error Message -->
<span><?php echo $error; ?></span>

</body>
</html>