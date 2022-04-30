<?php
$precipitation = [];
$total = 0;
for ($i = 0; $i <= 6; $i++) {
    $precipitation[] = rtrim(fgets(STDIN));
    if ($precipitation[$i] <= 30) {
        $total++;
    }
}
echo $total;
