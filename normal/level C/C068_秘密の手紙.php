<?php
$n = (int)fgets(STDIN);
//暗号文
$message = trim(fgets(STDIN));
//出力する文字列
$output = "";

for($i = 0; $i < strlen($message);$i++)
{
    if((($i + 1) % 2) == 1)
    {
        $henkan_n = 26 - $n;
        $new_char = chr(((ord($message[$i]) - ord('A') + $henkan_n) % 26 ) + ord('A'));
        echo $new_char;
    }else{
        $new_char = chr(((ord($message[$i]) - ord('A') + $n) % 26 ) + ord('A'));
        echo $new_char;
    }
}
