#######################
# Monsterクラスを追加
#######################

<?php

[$atk, $def, $agi] = explode(" ", rtrim(fgets(STDIN)));

$monster = new Monster($atk, $def, $agi);

$monsterNum = rtrim(fgets(STDIN));

for ($i = 0; $i < $monsterNum; $i++) {
    [$name, $minAtk, $maxAtk, $minDef, $maxDef, $minAgi, $maxAgi] = explode(" ", rtrim(fgets(STDIN)));

    $evolutionRequirement = new EvolutionRequirement($name, $minAtk, $maxAtk, $minDef, $maxDef, $minAgi, $maxAgi);

    $evolvableMonsterChecker = new EvolvableMonsterChecker($evolutionRequirement, $monster);
    $evolvableMonsters[] = $evolvableMonsterChecker->velifyEvolvableMonster();
}

$evolvedMonsters = array_filter($evolvableMonsters);

echo empty($evolvedMonsters) ? "no evolution" : implode("\n", $evolvedMonsters);

class Monster
{
    private $atk;
    private $def;
    private $agi;

    public function __construct(int $atk, int $def, int $agi)
    {
        $this->atk   = $atk;
        $this->def = $def;
        $this->agi = $agi;
    }

    public function atk(): int
    {
        return $this->atk;
    }

    public function def(): int
    {
        return $this->def;
    }

    public function agi(): int
    {
        return $this->agi;
    }
}

class EvolutionRequirement
{
    private $name;
    private $minAtk;
    private $maxAtk;
    private $minDef;
    private $maxDef;
    private $minAgi;
    private $maxAgi;

    public function __construct(string $name, int $minAtk, int $maxAtk, int $minDef, int $maxDef, int $minAgi, int $maxAgi)
    {
        $this->name   = $name;
        $this->minAtk = $minAtk;
        $this->maxAtk = $maxAtk;
        $this->minDef = $minDef;
        $this->maxDef = $maxDef;
        $this->minAgi = $minAgi;
        $this->maxAgi = $maxAgi;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function minAtk(): int
    {
        return $this->minAtk;
    }

    public function maxAtk(): int
    {
        return $this->maxAtk;
    }

    public function minDef(): int
    {
        return $this->minDef;
    }

    public function maxDef(): int
    {
        return $this->maxDef;
    }

    public function minAgi(): int
    {
        return $this->minAgi;
    }

    public function maxAgi(): int
    {
        return $this->maxAgi;
    }
}

class EvolvableMonsterChecker
{
    private $evolutionRequirement;
    private $monster;

    public function __construct(EvolutionRequirement $evolutionRequirement, Monster $monster)
    {
        $this->evolutionRequirement = $evolutionRequirement;
        $this->monster = $monster;
    }

    public function velifyEvolvableMonster()
    {
        if (
            $this->condition($this->evolutionRequirement->minAtk(), $this->monster->atk(), $this->evolutionRequirement->maxAtk())
            && $this->condition($this->evolutionRequirement->minDef(), $this->monster->def(), $this->evolutionRequirement->maxDef())
            && $this->condition($this->evolutionRequirement->minAgi(), $this->monster->agi(), $this->evolutionRequirement->maxAgi())
        )  return $this->evolutionRequirement->name();
    }

    public function condition($evolutionMin, $parameter, $evolutionMax): bool
    {
        return $evolutionMin <= $parameter && $parameter <= $evolutionMax;
    }
}
