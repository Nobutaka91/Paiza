<?php
    
    [$maxBase, $maxHeight] = explode(" ", trim(fgets(STDIN)));
    
    $triangleSides = new TriangleSides($maxBase, $maxHeight);
    
    $triangle = new Triangle($triangleSides);
    
    echo $triangle->countTriangle();
    
    
    class TriangleSides
    {
        private $maxBase;     
        private $maxHeight;    
        
        public function __construct(int $maxBase, int $maxHeight)
        {
            $this->maxBase   = $maxBase;
            $this->maxHeight = $maxHeight;
        }
        
        public function maxBase() : int
        {
            return $this->maxBase;
        }
        
        public function maxHeight() : int 
        {
            return $this->maxHeight;
        }
    }
    
    class Triangle
    {
        const MIN_BASE   = 1; 
        const MIN_HEIGHT = 1;
        
        private $triangleSides;     
        
        public function __construct(Trianglesides $triangleSides)
        {
            $this->triangleSides = $triangleSides;
        }
        
        public function countTriangle() : int
        {
            $triangle = 0;
            for($base = self::MIN_BASE; $base < $this->triangleSides->maxBase(); $base++) {
                for($height = self::MIN_HEIGHT; $height < $this->triangleSides->maxHeight(); $height++) {
                    $hypotenuse = hypot($base, $height);
                    if(floor($hypotenuse) == $hypotenuse) {
                        $triangle++;
                    } 
                }    
            }
            return $triangle;
        }
    }
