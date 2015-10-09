<?php
session_start();
if(!isset($_SESSION['uname']))
header("location: index.php");
?>
<head>
<style>


body	{ margin:0px; }

body	{ background:url("bggg.jpg") no-repeat fixed center;-webkit-background-size: cover; }

#container {	background-color:#000033; margin-top;50px; width: 1030px;position: relative; margin: 0 auto; border:1px solid; }

#nav{ background-color:#101010   ; width:700px; position:relative;	height: 30px;  display: table-cell; vertical-align:middle; text-align: center;  border-radius: 3px; }

#nav a {  color:White;font-family: Arial, Helvetica, sans-serif; font-size:12px; }

#nav a:hover { color:#3366CC; text-decoration:underline; }

#head { margin:3px; width: 755px; height:100px;  position: relative;  border:1px solid; }

a { font-size:15px; text-decoration: none; color:white; font-family:Lucida Console }

#encrypt {  margin-left: 390; margin-top:35;  color:white; font-family:Lucida Console; font-size:40px; }

#right { margin-top:5px;  width:1030px; height: 430px; position: relative; float:right; background-color:#000033; }







#footer { position:fixed;left:0px;bottom:0px; height:45px;width:100%;background-color:#000033; }

</style>

</head>

<body>
<br><br>
<div id = "container">
<div id ="head">
<div id="encrypt"> encryption </div>
</div>
<div id = "nav"><b><pre><font size = 4 color=gray>|     <a href = "home.php">HOME</a>     |     <a href = "rot.php">ROT</a>     |     <a href = "transpo.php">TRANSPOSITION</a>     |     <a href = "vig.php">VIGENERE</a>     |     <a href = "rottranspo.php">ROT/TRANSPOSITION</a>     |     <a href = "logout.php">LOGOUT</a>     |</font></div>


<div id="right"><br>


<h4><center><a> ROT 1



<form action="rot.php" method="POST">
<table>
<tr>
<td><a>Input words:</td><br><br><br>


<td><input type="text" id="username" name="iword"/></td>

<td><input type=submit name=encrypt value='encrypt'></input></td></tr>

</table>
<?php
if(isset($_POST['encrypt'])){

$a=$_POST['iword'];
}
function str_rot($s, $n = 1) {
    static $letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $n = (int)$n % 26;
    if (!$n) return $s;
    if ($n == 13) return str_rot13($s);
    for ($i = 0, $l = strlen($s); $i < $l; $i++) {
        $c = $s[$i];
        if ($c >= 'a' && $c <= 'z') {
            $s[$i] = $letters[(ord($c) - 71 + $n) % 26];
        } else if ($c >= 'A' && $c <= 'Z') {
            $s[$i] = $letters[(ord($c) - 39 + $n) % 26 + 26];
        }
    }
    return $s;
}
print "<br><br><br> Encrypted Words: " . str_rot($a);
?>









</div>
</body>
<div id="footer">	<br>
<center><font face = "Arial" color = "white" size = "2"><b>
Copyright (c) 2015. JAGUARS encryption . All Rights Reserved



