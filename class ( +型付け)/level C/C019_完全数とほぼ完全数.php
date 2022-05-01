<?php

    $inputNum = rtrim(fgets(STDIN));

    for ($i = 0; $i < $inputNum; $i ++) {
        $number = rtrim(fgets(STDIN));
        $PerfectNumChecker = new PerfectNumChecker($number);
        $divisorSum = $PerfectNumChecker->sumDivisor();
        $outputList[] = $PerfectNumChecker->judgePerfectNum($divisorSum);
    }
    echo implode("\n", $outputList);

    class PerfectNumChecker
    {
        const PERFECT = "perfect";
        const NEALY = "nearly";
        const NEITHER = "neither";

        private $number;

        public function __construct(int $number)
        {
            $this->number = $number;
        }

        public function sumDivisor() : int
        {
            $divisorSum = 0;
            for($i = 1; $i <= $this->number / 2; $i++) {
                if($this->number % $i == 0) $divisorSum += $i;
            }
            return $divisorSum;
        }

        public function judgePerfectNum(int $divisorSum) : string
        {
            if ($divisorSum == $this->number) return "perfect";
            if ($divisorSum == ($this->number - 1)) return "nearly";
            return "neither";
        }
    }
