############################
# for文の中をスッキリさせてた
############################

<?php

$winning = explode(" ", rtrim(fgets(STDIN)));
$raffleNumber =  rtrim(fgets(STDIN));

for ($i = 0; $i < $raffleNumber; $i++) {
    $raffleList[] = explode(" ", rtrim(fgets(STDIN)));
}

$muchNumberList = new MatchNumber($winning, $raffleList);
echo implode("\n", $muchNumberList->countMatchNumber());

class MatchNumber
{
    private  $winning;
    private  $raffleList;

    public function __construct(array $winning, array $raffleList)
    {
        $this->winning    = $winning;
        $this->raffleList = $raffleList;
    }

    public function countMatchNumber(): array
    {
        $muchNumberList = [];
        foreach ($this->raffleList as $raffle) {
            $muchNumbers = array_intersect($this->winning, $raffle);
            $muchNumberList[]  = count($muchNumbers);
        }
        return $muchNumberList;
    }
}
