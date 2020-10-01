<?php

   

$error=''; //Variable to Store error message;
if(isset($_POST['submit'])){
	
if(empty($_POST['user']) || empty($_POST['old_pass'])){
echo '<div class="res"><center>Please Enter Username And Old Password</center></div> ';
			 header("Refresh: 1; url=MP.php");
}
$user=$_POST['user'];
$old_pass=$_POST['old_pass'];
$pass=$_POST['pass'];
$pass1=$_POST['pass1'];
//Establishing Connection with server by passing server_name, user_id and pass as a parameter
$conn = mysqli_connect("localhost", "root", "");
//Selecting Database
$db = mysqli_select_db($conn, "libpro");
//sql query to fetch information of registerd user and finds user match.
$query = mysqli_query($conn, "SELECT * FROM userpass WHERE pass='$old_pass' AND user='$user'");
$rows = mysqli_num_rows($query);


if($rows != 1){
	echo '<div class="res"><center>Please Enter Valid Username And Old Password</center></div> ';
			 header("Refresh: 1; url=MP.php");
}
elseif($pass == ""){
	echo '<div class="res"><center>Please Enter New Password</center></div> ';
			 header("Refresh: 1; url=MP.php");
			 
 }
	
 elseif($pass != $pass1){
	  echo '<div class="res"><center>Please Confirm Your New Password</center></div> ';
			 header("Refresh: 1; url=MP.php");
			 
 }
 else{
	
	 $query ="insert into userpass (user,pass) value ('$user','$pass')";
   if(mysqli_query($conn,$query)){
          echo '<div class="res">Password Reseted Successfully</div> ';
			 header("Refresh: 1; url=MP.php");
   }
   else{
	  echo '<div class="res">Password Not Reseted Successfully</div> ';
			 header("Refresh: 1; url=MP.php");
  
   }
 }
 }
 


?>


<html>
<body>
<style>
/* http://meyerweb.com/eric/tools/css/reset/ 
   v2.0 | 20110126
   License: none (public domain)
*/

html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	vertical-align: baseline;
}
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure, 
footer, header, hgroup, menu, nav, section {
	display: block;
}


body{
	background: White;

	
}

.header{
width:1380px;
height:90px;
margin:auto;
Background:White;
}

#logo{float:left;}
#banner{float:right;}

.content{
position:absolute;
	top:85px;
	left:60px;
width:1380px;
height:470px;
font-family:"Times New Roman";
font-size:"25";

}
.pic{
	position:absolute;
	top:210px;
	left:420px;
}
.username{
	position:absolute;
	top:160px;
	left:603px;
}

.Submit_me{
position:absolute;
top:340px;
left:440px;
}
.BACK_LOGIN{
position:absolute;
top:410px;
left:450px;
}

.submit{
	position:absolute;
top:500px;
left:400px;
}
.cancel{
	position:absolute;
top:500px;
left:650px;
}

.res{
	position:absolute;
	top:145px;
	left:450px;
	color:#6495ed;
	 display: block;
        font-size: 26px;
        margin-top: 1px;
        margin-bottom: 0px;
        text-align:center;
     
}
.margin{
	position:absolute;
top:-10px;
left:136px;
width:1060px;
height:530px;
margin:50px auto;
border-radius:10px;
border:2px solid #6495ed;
padding:10px 40px 25px;
margin-top:70px;
color:#6495ed;
}
.text1{
	position:absolute;
	top:305px;
	left:603px;
}
.text2{
	position:absolute;
	top:355px;
	left:603px;
}
.fields1{
	position:absolute;
	top:260px;
	left:400px;
}
.old_pass{
	position:absolute;
	top:215px;
	left:603px;
}
.fields2{
	position:absolute;
	top:310px;
	left:400px;
}
.fields3
{
	position:absolute;
	top:360px;
	left:370px;
}

</style>

<form action="MP.php" method="post" style="text-align:center;">

       <!--Header starts here-->	
	   <div class="header">
	   
     <img id="bar" src="images/bar.png"/>
	 </div>
	    <!--Header ends here-->

	<div class="content">
	
<center><h1>Manage Profile</h1><center>
 <img id="line" src="images/line.png" /><br>
 <br>
 <font color="Green" face="Tahoma,Helvetica,Lucida Sans,Verdana">
 </div>
 
 <div class="margin">
 
 </div>
 
 

 <div class="pic">
  <h3>*UserName:</h3>
 <br></br>
 </div>
 
 
 <div class="username">
 <br></br><input type="text"  name="user" size="30px" style="height: 33px;"/>
 </div>
 <div class="old_pass">
 <br></br><input type="password"  name="old_pass" size="30px" style="height: 33px;"/>
 </div>
 
 <div class="fields1">
 <h3>*Old Password:</h3>
 </div>
  <div class="fields2">
 <h3>*New Password:</h3>
 </div>
 <div class="fields3">
 <h3>*Confirm Password:</h3>
 </div>
 <div class="text1">
  <input type="password"  name="pass" size="30px" style="height: 33px;"/>

 </div>
 <div class="text2">
 <input type="password"  name="pass1" size="30px" style="height: 33px;" />
 </div>
 
 <div class="cancel">
  <a href="admin_home.php">
<input type="submit" name="cancel" value="CANCEL" style="height:50px; width:150px" /></a>
  </div>


<div class="submit">
<input type="submit"  name="submit" value="SUBMIT" style="height:50px; width:150px" /></a>
 </div>
</body>
</html>


 
