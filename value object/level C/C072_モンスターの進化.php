<?php
[$atk, $def, $agi] = explode(" ", trim(fgets(STDIN)));
$monster = new Monster($atk, $def, $agi);

$num = trim(fgets(STDIN));
$evolvedMonsterList = [];
for ($i = 0; $i < $num; $i++) {
    [$monsterName, $minAtk, $maxAtk, $minDef, $maxDef, $minAgi, $maxAgi] = explode(" ", trim(fgets(STDIN)));
    $evolvedMonsterList[] = new EvolvedMonster($monsterName, $minAtk, $maxAtk, $minDef, $maxDef, $minAgi, $maxAgi);
}
$evolutionChecker = new EvolutionChecker($monster, $evolvedMonsterList);
$resultList = $evolutionChecker->findMonsterName();

$result = !empty($resultList) ? implode("\n", $resultList) : "no evolution";
echo $result;

class EvolutionChecker
{
    private $monster;
    private $evolvedMonsterList;
    
    public function __construct(Monster $monster, array $evolvedMonsterList)
    {
        $this->monster = $monster;
        $this->evolvedMonsterList = $evolvedMonsterList;
    }
    
    public function findMonsterName(): array
    {
        $resultList = [];
        foreach ($this->evolvedMonsterList as $evolvedMonster) {
            if (!$evolvedMonster->isAbleToEvolutionByAtk($this->monster->atk())) continue;
            if (!$evolvedMonster->isAbleToEvolutionByDef($this->monster->def())) continue;
            if (!$evolvedMonster->isAbleToEvolutionByAgi($this->monster->agi())) continue;
            $resultList[] = $evolvedMonster->name();
        }
        return $resultList;
    }
}
        
class Monster
{
    private $atk;
    private $def;
    private $agi;
   
    public function __construct(int $atk, int $def, int $agi) 
    {
        $this->atk = $atk;
        $this->def = $def;
        $this->agi = $agi;
    }
    
    public function atk()
    {
        return $this->atk;
    }
    
    public function def()
    {
        return $this->def;
    }
    
    public function agi()
    {
        return $this->agi;
    }
}
    
class EvolvedMonster
{
    private $name;
    private $minAtk;
    private $maxAtk;
    private $minDef;
    private $maxDef;
    private $minAgi;
    private $maxAgi;
   
    public function __construct(
        string $name,
        int $minAtk,
        int $maxAtk,
        int $minDef,
        int $maxDef,
        int $minAgi,
        int $maxAgi
    ) {
        $this->name = $name;
        $this->minAtk = $minAtk;
        $this->maxAtk = $maxAtk;
        $this->minDef = $minDef;
        $this->maxDef = $maxDef;
        $this->minAgi = $minAgi;
        $this->maxAgi = $maxAgi;
    }
    
    public function isAbleToEvolutionByAtk(int $param): bool
    {
        if ($this->minAtk <= $param && $param <= $this->maxAtk) return true;
        return false;
    }
    
    public function isAbleToEvolutionByDef(int $param): bool
    {
        if ($this->minDef <= $param && $param <= $this->maxDef) return true;
        return false;
    }
    
    public function isAbleToEvolutionByAgi(int $param): bool
    {
        if ($this->minAgi <= $param && $param <= $this->maxAgi) return true;
        return false;
    }
    
    public function name(): string
    {
        return $this->name;
    }
}
