<?php
   
    [$maxLength, $maxWidth] = explode(" " ,trim(fgets(STDIN)));
    $lengthAndWidthOfPicture  = new LengthAndWidthOfPicture($maxLength, $maxWidth);

    for ( $length = 1; $length <= $maxLength; $length++ ) {
        $pixelValueList = explode(" " ,trim(fgets(STDIN)));
        $binaryImageList = new BinaryImageList($pixelValueList, $lengthAndWidthOfPicture);
        echo implode(" ", $binaryImageList->changePixcelValueIntoBinaryImage()) . "\n";
    }
    
    class LengthAndWidthOfPicture
    {
        private $maxLength;
        private $maxWidth;
        
        public function __construct(int $maxLength, int $maxWidth) 
        {
            $this->maxLength = $maxLength;
            $this->maxWidth  = $maxWidth;
        }
        
        public function maxLength() : int
        {
            return $this->maxLength;
        }
        
        public function maxWidth() : int
        {
            return $this->maxWidth;
        }
    }
    
    
    class BinaryImageList
    {
        const MIN_WIDTH             = 1;
        const BASELINE_PIXEL_VALUE  = 128;
        const WIDTH_COUNT_MINUS_NUM = 1;
        const VINARY_IMAGE_OF_WHITE = 1;
        const VINARY_IMAGE_OF_BLACK = 0;
        
        private $pixelValueList;
        private $lengthAndWidthOfPicture;
        
        public function __construct(array $pixelValueList, LengthAndWidthOfPicture $lengthAndWidthOfPicture) 
        {
            $this->pixelValueList          = $pixelValueList;
            $this->lengthAndWidthOfPicture = $lengthAndWidthOfPicture;
        }
        
        public function changePixcelValueIntoBinaryImage() : array
        {
            $binaryImageList=[];
            for($width = self::MIN_WIDTH; $width <= $this->lengthAndWidthOfPicture->maxWidth(); $width++) {
                if ($this->pixelValueList[$width-self::WIDTH_COUNT_MINUS_NUM] >= self::BASELINE_PIXEL_VALUE) {
                            $binaryImageList[] = self::VINARY_IMAGE_OF_WHITE;
                        } else {
                            $binaryImageList[] = self::VINARY_IMAGE_OF_BLACK;
                        }
            }
            return $binaryImageList;
        }
    }
