<?php

    $count = rtrim(fgets(STDIN));
    for ($i = 0; $i < $count; $i ++) {
        $numberList[] = rtrim(fgets(STDIN));
    }

    $outputList = new NumList($numberList);
    echo implode("\n", $outputList->judgePerfectNum());

    class NumList
    {
        const PERFECT = "perfect";
        const NEARLY = "nearly";
        const NEITHER = "neither";

        private $numberList;

        public function __construct(array $numberList)
        {
            $this->numberList = $numberList;
        }

        public function judgePerfectNum()
        {
            $result = [];
            foreach($this->numberList as $number) {
                $divisorSum = 0;
                for($i = 1; $i <= $number / 2; $i++) {
                    if($number % $i == 0) {
                        $divisorSum += $i;
                    }
                }

                if ($divisorSum == $number) {
                   $result[] = self::PERFECT;
                } elseif ($divisorSum == ($number - 1)) {
                   $result[] = self::NEARLY;
                } else {
                   $result[] = self::NEITHER;
                }
            }
            return $result;
        }
    }
