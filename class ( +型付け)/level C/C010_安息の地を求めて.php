<?php

    [$constructionPositionX, $constructionPositionY, $noizeSizeRadius]  = explode(" ", trim(fgets(STDIN)));
    $construction = new Construction($constructionPositionX, $constructionPositionY);
    $noise = new Noise($noizeSizeRadius);
    $shadeNumber = trim(fgets(STDIN));

    for ($i=0; $i < $shadeNumber; $i++) {
        [$shadePositionX, $shadePositionY] = explode(" ", trim(fgets(STDIN)));
        $shade = new Shade($shadePositionX, $shadePositionY);
        $rangeDifference = new RangeDifference($construction, $shade);
        $perfectReadingEnvironment = new PerfectReadingEnvironment($rangeDifference, $noise);
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

        public function constructionPositionX() : int
        {
            return $this->constructionPositionX;
        }

        public function constructionPositionY() : int
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

        public function noizeSizeRadius() : int
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

        public function shadePositionX() : int
        {
            return $this->shadePositionX;
        }

        public function shadePositionY() : int
        {
            return $this->shadePositionY;
        }
    }

    class RangeDifference //距離差
    {
        private $constructionPosition;
        private $shade;

        public function __construct(Construction $construction, Shade $shade)
        {
            $this->construction = $construction;
            $this->shade = $shade;
        }

        public function rangeDifferenceX() : int
        {
           return $this->shade->shadePositionX() - $this->construction->constructionPositionX();
        }

        public function rangeDifferenceY() : int
        {
           return $this->shade->shadePositionY() - $this->construction->constructionPositionY();
        }
    }

    class PerfectReadingEnvironment
    {
        private $rangeDifference;
        private $noise;

        public function __construct(RangeDifference $rangeDifference, Noise $noise)
        {
            $this->rangeDifference = $rangeDifference;
            $this->noise = $noise;
        }

        public function calculateSoundLevel() : string
        {
           return ( $this->rangeDifference->rangeDifferenceX()**2 + $this->rangeDifference->rangeDifferenceY()**2 >= $this->noise->noizeSizeRadius()**2) ? "silent" : "noisy";
        }
    }
