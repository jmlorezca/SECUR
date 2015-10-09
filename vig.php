<?php
session_start();
if(!isset($_SESSION['uname']))
header("location: index.php");
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
function alphaOnly(event) {
  var key = event.keyCode;
  return ((key >= 65 && key <= 90) || key == 8 || key == 32 || key == 37 || key == 39);
};
</script>
<style>



html, body	{ margin:0px; }

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
<div id = "nav"><b><pre><font size = 4 color=gray>|     <a href = "home.php">HOME</a>     |     <a href = "rot.php">ROT</a>     |     <a href = "transpo.php">TRANSPOSITION</a>     |     <a href = "vig.php">VIGENERE</a>     |     <a href = "rottranspo.php">ROT/TRANSPOSITION</a>     |     |     <a href = "logout.php">LOGOUT</a>     |</font></div>


<div id="right"><br>


<h4><center><a> VIGENERE



<form action="vig.php" method="POST">
<table>
<tr>
<td><a>Input words:</td><br><br><br>


<td><input type="text" id="username" name="iword"/></td>
</tr>
<tr>
<td><br><br>&nbsp;&nbsp;&nbsp;&nbsp;<a>Keyword:</td>
<td><br><br><input type="text" name="kword"  onkeydown="return alphaOnly(event);"/></td></tr>
<tr><td colspan=2><br><br><center><input type=submit name=encrypt value='encrypt'></input></center></td></tr>
</table>

<?php
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
if(isset($_POST['encrypt'])){

$a=$_POST['iword'];
$b=$_POST['kword'];
$a=str_replace(" ","",$a);

$key1 = $b;
$key=str_rot($key1);
$keyLength = strlen($key);
$keyIndex = 0;

$message = str_split($a);

$output = '';

foreach($message as $value) // Loop through input string array
{
    $thisValueASCII = ord($value);

    if($thisValueASCII >= 65 && $thisValueASCII <= 90) // if is uppercase
    {
        $thisValueASCIIOffset = 65;
    } else // if is lowercase
    {
        $thisValueASCIIOffset = 97;
    }

    $letter_value_corrected = $thisValueASCII - $thisValueASCIIOffset;
    $key_index_corrected = $keyIndex % $keyLength; // This is the same as fmod but I prefer this notation.

    $key_ascii_value = ord($key[$key_index_corrected]);

    if($key_ascii_value >= 65 && $key_ascii_value <= 90) // if is uppercase
    {
        $key_offset = 65;
    } else // if is lowercase
    {
        $key_offset = 97;
    }

    $final_key = $key_ascii_value - $key_offset;

    $letter_value_encrypted = ($letter_value_corrected + $final_key)%26;

    $output = $output . chr($letter_value_encrypted + $thisValueASCIIOffset);
    $keyIndex++;
}
}
echo "<br><br><br> Encrypted Word: " .  $output;
?>








</div>
</body>
<div id="footer">	<br>
<center><font face = "Arial" color = "white" size = "2"><b>
Copyright (c) 2015. JAGUARS encryption . All Rights Reserved

</html>
