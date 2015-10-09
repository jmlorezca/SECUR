<body>
<form action="transpo1.php" method="POST">
<table border=1>
<tr>
<td>Input words:</td>
<td><input type="text" id="username" name="iword"/></td>

<td><input type=submit name=encrypt value='encrypt'></input></td></tr>
</table>
</body>
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
$a=str_replace(" ","",$a);

$key1 = "cad";
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

echo $output;}
?>
