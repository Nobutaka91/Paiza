<?php

    $precipitation_％ = trim(fgets(STDIN));
    $result = check ($precipitation_％);
    echo $result;

    function check($precipitation_％) {
        $result = (0 <= $precipitation_％ && $precipitation_％ <= 30) ? "sunny"
        : ((31 <= $precipitation_％ && $precipitation_％ <= 70) ? "cloudy"
        : "rainy");
        return $result;
    }
