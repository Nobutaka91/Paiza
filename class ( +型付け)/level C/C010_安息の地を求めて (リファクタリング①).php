###################################
# RangeDifference クラスを減らした
###################################


<?php

[$constructionPositionX, $constructionPositionY, $noizeSizeRadius]  = explode(" ", trim(fgets(STDIN)));
$construction = new Construction($constructionPositionX, $constructionPositionY);
$noise = new Noise($noizeSizeRadius);
$shadeNumber = trim(fgets(STDIN));

for ($i = 0; $i < $shadeNumber; $i++) {
    [$shadePositionX, $shadePositionY] = explode(" ", trim(fgets(STDIN)));
    $shade = new Shade($shadePositionX, $shadePositionY);
    $perfectReadingEnvironment = new PerfectReadingEnvironment($construction, $noise, $shade);
    echo $perfectReadingEnvironment->calculateSoundLevel() . "\n";
}

class Construction
{
    private $constructionPositionX;
    private $constructionPositionY;

    public function __construct(int $constructionPositionX, int $constructionPositionY)
    {
        $this->constructionPositionX = $constructionPositionX;
        $this->constructionPositionY = $constructionPositionY;
    }

    public function constructionPositionX(): int
    {
        return $this->constructionPositionX;
    }

    public function constructionPositionY(): int
    {
        return $this->constructionPositionY;
    }
}

class Noise
{
    private $noizeSizeRadius;

    public function __construct(int $noizeSizeRadius)
    {
        $this->noizeSizeRadius = $noizeSizeRadius;
    }

    public function noizeSizeRadius(): int
    {
        return $this->noizeSizeRadius;
    }
}

class Shade
{
    private $shadePositionX;
    private $shadePositionY;

    public function __construct(int $shadePositionX, int $shadePositionY)
    {
        $this->shadePositionX = $shadePositionX;
        $this->shadePositionY = $shadePositionY;
    }

    public function shadePositionX(): int
    {
        return $this->shadePositionX;
    }

    public function shadePositionY(): int
    {
        return $this->shadePositionY;
    }
}

class PerfectReadingEnvironment
{
    private $construction;
    private $noise;
    private $shade;

    public function __construct(Construction $construction, Noise $noise, Shade $shade)
    {
        $this->construction = $construction;
        $this->noise        = $noise;
        $this->shade        = $shade;
    }

    public function calculateSoundLevel(): string
    {
        $rangeDifferenceX = $this->shade->shadePositionX() - $this->construction->constructionPositionX();
        $rangeDifferenceY = $this->shade->shadePositionY() - $this->construction->constructionPositionY();
        return ($rangeDifferenceX ** 2 + $rangeDifferenceY ** 2 >= $this->noise->noizeSizeRadius() ** 2) ? "silent" : "noisy";
    }
}
