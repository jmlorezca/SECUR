<html>
<head>
<style>


html, body	{ margin:0px; }

body	{ background:url("bg.jpg") no-repeat fixed center;-webkit-background-size: cover; }

#header { position: fixed;width: 100%;height: 12%;border:1px solid;background-color:#000033;background-size: 170px;background-repeat: no-repeat; }

#container { width:460; }

#encrypt { margin-left:120; margin-top:35; height:100; width:50; color:white; font-family:Lucida Console; font-size:30px;  float:left;}

#login { margin-left:120; margin-top:35; height:100; width:50; color:white; font-family:Lucida Console; float:right;}

#footer { position:fixed;left:0px;bottom:0px; height:45px;width:100%;background-color:#000033; }

#reg { height:300; width:900; background-color:red; }

table { font-family:Lucida Console;}

</style>

</head>

<body bgcolor = "#A0A0A0">



<div id="header">

<div id="container">
<div id="encrypt">

<b>encryption</b>
</div>

<div id="login">

<form action="index.php" method="POST">
<table>
<tr>
<td><font color=white>Username:</td>
<td><input type="text" id="username" name="uname"/></td>

<td><font color=white>Password:</td>
<td><input name="pword" id="password" type="password"/></td>
<td><input type=submit name=login value='login'></input></td></tr>
</table>


</div>
</div>
</div>


<center>
		
<br><br><br><br><br><br><br><br><br><br><br>		<table width = 950>


<tr>
<td width=600><td colspan =2 height=50><font size=6 color=white><b>SIGN UP</b></font>
</td>			
<tr>
				<td><td width = 135><font color=white><a><b>USERNAME:
				<td><input name=username style="width:200px;height:35px;;border-radius:6px">
			<tr>	
				<td><td><font color=white><a><b>PASSWORD:
				<td><input type=password name=password style="width:200px;height:35px;border-radius:6px">
			
			<tr>	
				<td><td><font color=white><a><b>LAST NAME:
				<td><input name=obslname style="width:200px;height:35px;;border-radius:6px"
				onkeydown="return alphaOnly(event);"
				
				/>
			<tr>	
				<td><td><font color=white><a><b>FIRST NAME:
				<td><input name=obsfname style="width:200px;height:35px;;border-radius:6px"
				onkeydown="return alphaOnly(event);"
				
				/>
			<tr>
				<td><td><font color=white><a><b>MI:
				<td><input name=obsmi style="width:35px;height:35px;;border-radius:6px" maxlength=1
				onkeydown="return alphaOnly(event);"
/>
				<tr>
<td><td colspan=2><br><center><input type=submit value='SIGN UP' onclick='return confirmation()' name=add style="height:30;width:200;border-radius:6px;font-family:Lucida Console;"></input></center></td>
</tr>

				
</table>









<div id="footer">	<br>
<center><font face = "Arial" color = "white" size = "2"><b>
Copyright (c) 2015. JAGUARS encyption . All Rights Reserved


</body>
<?php
if(isset($_POST['login'])){


 $host="sql100.byetcluster.com";
	$uname="0fe_15593142";
	$pwd="091023456261";
	$db="0fe_15593142_EXPERIMENT1";

	$con = mysql_connect("$host","$uname","$pwd") or die("connection failed");
	mysql_select_db("$db") or die("db selection failed");

$a=$_POST['uname'];
$b=$_POST['pword'];
$query="select * from login where uname='$a' and pword='$b'";
$res=mysql_query($query) or die ("Error in query");
$bilang=mysql_num_rows($res);
if($bilang==0){
	echo "<script type='text/javascript'>alert('Login Failed!');</script>";
}else{

	echo "<script type='text/javascript'>alert('Login Successful!');</script>";
}}

if(isset($_POST['add'])){
	$a=$_POST['username'];
	$b=$_POST['password'];
	$c=$_POST['obslname'];
    $d=$_POST['obsfname'];
    $e=$_POST['obsmi'];
	
 $host="sql100.byetcluster.com";
	$uname="0fe_15593142";
	$pwd="091023456261";
	$db="0fe_15593142_EXPERIMENT1";;

	$con = mysql_connect("$host","$uname","$pwd") or die("connection failed");
	mysql_select_db("$db") or die("db selection failed");

	
	$k = "select * from login where username = '$a'";
	
	$res = mysql_query($k);
	$bilang = mysql_num_rows($res);
	

	
	if ($bilang == 0){	
	$insert = "insert into login(uname,pword,name) values('$a','$b','$d $e $c')";
	mysql_query($insert);
	echo "<script type='text/javascript'>alert('Save successful!');</script>";
	}else 
	echo "<script type='text/javascript'>alert('Account Already Exist!');</script>";
	}?>		
