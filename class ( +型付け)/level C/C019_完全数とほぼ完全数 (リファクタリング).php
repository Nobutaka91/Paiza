<?php

    $inputNum = rtrim(fgets(STDIN));

    for ($i = 0; $i < $inputNum; $i ++) {
        $number = rtrim(fgets(STDIN));
        $PerfectNumChecker = new PerfectNumChecker($number);
        $TotalDivisor = $PerfectNumChecker->calculatTotalDivisor();
        $outputList[] = $PerfectNumChecker->judgePerfectNum($TotalDivisor);
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

        public function calculatTotalDivisor()
        {
           $totalDivisor = 0;

            for($i = 1; $i <= $this->number / 2; $i++) {
                if($this->number % $i == 0) $totalDivisor += $i; 
            } 
            return $totalDivisor;
        }

        public function judgePerfectNum(int $totalDivisor) : string
        {
            if ($totalDivisor == $this->number) return "perfect";
            if ($totalDivisor == ($this->number - 1)) return "nearly";
            return "neither";
        }
    }
