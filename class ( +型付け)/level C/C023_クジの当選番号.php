<?php

    $winning = explode(" ", rtrim(fgets(STDIN)));
    $raffleNumber =  rtrim(fgets(STDIN));

    for ($i = 0; $i < $raffleNumber; $i++) {
        $raffle = explode(" ", rtrim(fgets(STDIN)));
        $muchNumber = new MatchNumber($winning, $raffle);
        echo $muchNumber->countMatchNumber() ."\n";
    }

    class MatchNumber
    {
        private  $winning;
        private  $raffle;

        public function __construct(array $winning, array $raffle)
        {
          $this->winning = $winning;
          $this->raffle = $raffle;
        }

        public function countMatchNumber() : int
        {
            $matchNumber = array_intersect($this->winning, $this->raffle);
            return count($matchNumber);
        }
    }
