<?php
   
    [$constructionLat, $constructionLon, $noiseSize] = explode(" ", trim(fgets(STDIN)));
    
    $constructionLat = new Location($constructionLat);
    $constructionLon = new Location($constructionLon);
    $constructionLocation = new ConstructionLocation($constructionLat, $constructionLon);
    $noiseSizeRadius = new NoiseSizeRadius($noiseSize);
    
    $treeNum = trim(fgets(STDIN));
    
    $treeLocationList = [];
    for ($i = 0; $i < $treeNum; $i++) {
        [$treeLat, $treeLon] = explode(" ", trim(fgets(STDIN)));
        $treeLat = new Location($treeLat);
        $treeLon = new Location($treeLon);
        $treeLocationList[] = new TreeLocation($treeLat, $treeLon);
    }
    
    $peacefulAreaChecker = new PeacefulAreaChecker($constructionLocation, $noiseSizeRadius, $treeLocationList);
    echo $peacefulAreaChecker->declearPeacefulArea();
    
    final class Location
    {
        const MIN_COORDINATE = 0;
        const MAX_COORDINATE = 100;
        
        private $value;
        
        public function __construct(int $value)
        {
            if ($value < self::MIN_COORDINATE || self::MAX_COORDINATE < $value) {
                throw new Exception ("値が制限範囲外です");
            }
            $this->value = $value;
        }
        
        public function value() : int
        {
            return $this->value;
        }
    }
    
    final class ConstructionLocation
    {
        private $constructionLat;
        private $constructionLon;
        
        public function __construct(Location $constructionLat, Location $constructionLon)
        {
            $this->constructionLat = $constructionLat;
            $this->constructionLon = $constructionLon;
        }
        
        public function lat() : Location 
        {
            return $this->constructionLat;
        }
        
        public function lon() : Location 
        {
            return $this->constructionLon;
        }
    }
    
    final class NoiseSizeRadius
    {
        const MIN_NOISE_SIZE = 1;
        const MAX_NOISE_SIZE = 100;
        const SQUARED = 2;
        
        private $value;
        
        public function __construct(int $value)
        {
            if ($value < self::MIN_NOISE_SIZE || self::MAX_NOISE_SIZE < $value) {
                throw new Exception ("値が制限範囲外です");
            }
            $this->value = $value;
        }
        
        public function value() : int
        {
            return $this->value;
        }
        
        public function NoseSizeRadius() : int 
        {
            return $this->value ** self::SQUARED;
        }
    }
    
    final class TreeLocation
    {
        private $treeLat;
        private $treeLon;
        
        public function __construct(Location $treeLat, Location $treeLon)
        {
            $this->treeLat = $treeLat;
            $this->treeLon = $treeLon;
        }
        
        public function lat() : Location
        {
            return $this->treeLat;
        }
        
        public function lon() : Location
        {
            return $this->treeLon;
        }
    }
    
    final class PeacefulAreaChecker
    {
        const SQUARED = 2;
        const SILENT = "silent";
        const NOISY = "noisy";
        
        private $constructionLocation;    
        private $noiseSizeRadius;    
        private $treeLocationList;
        
        public function __construct(ConstructionLocation $constructionLocation, NoiseSizeRadius $noiseSizeRadius, array $treeLocationList)
        {
            $this->constructionLocation = $constructionLocation;
            $this->noiseSizeRadius = $noiseSizeRadius;
            $this->treeLocationList = $treeLocationList;
        }
        
        private function findDistanceFromConstructionArea($treeLocation) : int 
        {
             $lat = $treeLocation->lat()->value() - $this->constructionLocation->lat()->value();
             $lon = $treeLocation->lon()->value() - $this->constructionLocation->lon()->value();
             return $lat ** self::SQUARED + $lon ** self::SQUARED;
        }
        
        private function compare($treeLocation) : bool
        {
            return $this->findDistanceFromConstructionArea($treeLocation) >= $this->noiseSizeRadius->NoseSizeRadius();
        }
        
        public function declearPeacefulArea() : string
        {
            $resultList = [];
            foreach ($this->treeLocationList as $treeLocation) {
                $resultList[] = $this->compare($treeLocation)
                ? self::SILENT
                : self::NOISY;
            }
            return implode("\n", $resultList);
        }
    }
