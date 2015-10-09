<body>
<form action="transpo2.php" method="POST">
<table border=1>
<tr>
<td>Input words:</td>
<td><input type="text" id="username" name="iword"/></td>

<td><input type=submit name=encrypt value='encrypt'></input></td></tr>
</table>
</body>
<?php
if(isset($_POST['encrypt'])){

$a=$_POST['iword'];
}
print strrev($a);
?>
