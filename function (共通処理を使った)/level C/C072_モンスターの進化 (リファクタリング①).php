###########################
# さらに関数内のifを省略した↓
###########################

<?php

[$ATK, $DEF, $AGI] = explode(" ", rtrim(fgets(STDIN)));

$num = rtrim(fgets(STDIN)); //進化先のモンスター数


for ($i = 0; $i < $num; $i++) {
    [$name, $minATK, $maxATK, $minDEF, $maxDEF, $minAGI, $maxAGI] = explode(" ", rtrim(fgets(STDIN)));

    $evolutionList[] = [
        "name" => $name,
        "minATK" => $minATK,
        "maxATK" => $maxATK,
        "minDEF" => $minDEF,
        "maxDEF" => $maxDEF,
        "minAGI" => $minAGI,
        "maxAGI" => $maxAGI
    ];
}

$result = isCheckEvolution($evolutionList, $ATK, $DEF, $AGI);

echo (!isset($result)) ? "no evolution" : implode("\n", $result);

function isCheckEvolution($evolutionList, $ATK, $DEF, $AGI)
{
    foreach ($evolutionList as $evolution) {
        if (isCheckATK($evolution, $ATK) && isCheckDEF($evolution, $DEF) && isCheckAGI($evolution, $AGI)) $result[] = $evolution["name"];
    }
    return $result;
}

function isCheckATK($evolution, $ATK)
{
    return $evolution["minATK"] <= $ATK && $ATK <= $evolution["maxATK"];
}

function isCheckDEF($evolution, $DEF)
{
    return $evolution["minDEF"] <= $DEF && $DEF <= $evolution["maxDEF"];
}

function isCheckAGI($evolution, $AGI)
{
    return $evolution["minAGI"] <= $AGI && $AGI <= $evolution["maxAGI"];
}

?>