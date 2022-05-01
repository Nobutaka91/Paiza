<?php

    [$constructionLat, $constructionLon, $noizeSizeRadius]  = explode(" ", trim(fgets(STDIN)));

    $treeNum = trim(fgets(STDIN));
    //工事の情報
    $constructionInfo = new ConstructionInfo($constructionLat, $constructionLon);
    $noise = new Noise($noizeSizeRadius);

    //Treeの情報取得
    $treeLocationList = [];
    for ($i=0; $i < $treeNum; $i++) {
        [$treeLat, $treeLon] = explode(" ", trim(fgets(STDIN)));
        $treeLocationList[] = new TreeLocationInfo($treeLat, $treeLon);
    }
    $peacefulAreaChecker = new PeacefulAreaChecker($constructionInfo, $noise, $treeLocationList);
    echo $peacefulAreaChecker->judgePerfectReadingEnvironment() . "\n";

    class ConstructionInfo
    {
        private $constructionLat;
        private $constructionLon;

        public function __construct(int $constructionLat, int $constructionLon)
        {
            $this->constructionLat = $constructionLat;
            $this->constructionLon = $constructionLon;
        }

        public function constructionLat() : int
        {
            return $this->constructionLat;
        }

        public function constructionLon() : int
        {
            return $this->constructionLon;
        }
    }

    class Noise
    {
        const SQUARED = 2;

        private $noizeSizeRadius;

        public function __construct(int $noizeSizeRadius)
        {
            $this->noizeSizeRadius = $noizeSizeRadius;
        }

        public function noizeSize() : int
        {
            return $this->noizeSizeRadius**self::SQUARED;
        }
    }

    class TreeLocationInfo
    {
        private $treeLat;
        private $treeLon;

        public function __construct(int $treeLat, int $treeLon)
        {
            $this->treeLat = $treeLat;
            $this->treeLon = $treeLon;
        }

        public function treeLat() : int
        {
            return $this->treeLat;
        }

        public function treeLon() : int
        {
            return $this->treeLon;
        }
    }

    class PeacefulAreaChecker
    {
        const SQUARED = 2;
        const SILENT  = "silent";
        const NOISY   = "noisy";

        private $construction;
        private $noise;
        private $shadeList;

        public function __construct(ConstructionInfo $constructionInfo, Noise $noise, array $treeLocationList)
        {
            $this->constructionInfo = $constructionInfo;
            $this->treeLocationList = $treeLocationList;
            $this->noise            = $noise;
        }

        /**
                 * 工事現場から木への距離を求める
                 */
        private function calculateDistanceFromConstruction(TreeLocationInfo $treeLocationInfo) : int
        {
            $latLength = $treeLocationInfo->treeLat() - $this->constructionInfo->constructionLat();
            $lonLength = $treeLocationInfo->treeLon() - $this->constructionInfo->constructionLon();
            return $latLength**self::SQUARED + $lonLength**self::SQUARED;
        }

        /**
         * 木の場所が工事現場の音が聞こえる場所か判定する
         */
        private function compare(TreeLocationInfo $treeLocationInfo) : bool
        {
            $distance = $this->calculateDistanceFromConstruction($treeLocationInfo);
            return $distance >= $this->noise->noizeSize();
        }

        /**
         * 読書に適している場所か否か
         */
        public function judgePerfectReadingEnvironment() : string
        {
            $determinationOfAreaList = [];
            foreach($this->treeLocationList as $treeLocationInfo) {
                $determinationOfAreaList[] =  $this->compare($treeLocationInfo)
                    ? self::SILENT
                    : self::NOISY;
            }
            return implode("\n", $determinationOfAreaList);
        }
    }
