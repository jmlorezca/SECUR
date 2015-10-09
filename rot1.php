<body>
<form action="rot.php" method="POST">
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
print str_rot($a);
?>
